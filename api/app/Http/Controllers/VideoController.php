<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use FFMpeg;

class VideoController extends Controller
{
    public function generateThumbnail(Request $request)
    {
        $request->validate([
            'video_url' => 'required|url',
        ]);

        $videoUrl = $request->input('video_url');
        $outputPath = public_path('thumbnails');
        $thumbnailPath = $outputPath . '/thumbnail_' . time() . '.jpg';

        // Ensure the output directory exists
        if (!file_exists($outputPath)) {
            mkdir($outputPath, 0755, true);
        }

        try {
            // Download the video locally (if it's an external link)
            $localVideoPath = $this->downloadVideo($videoUrl);

            // Generate the thumbnail
            $ffmpeg = FFMpeg\FFMpeg::create();
            $video = $ffmpeg->open($localVideoPath);
            $video->frame(FFMpeg\Coordinate\TimeCode::fromSeconds(5)) // Capture frame at 5 seconds
                ->save($thumbnailPath);

            // Clean up local video if downloaded
            if (file_exists($localVideoPath)) {
                unlink($localVideoPath);
            }

            return response()->json([
                'success' => true,
                'thumbnail' => url('thumbnails/' . basename($thumbnailPath)),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error generating thumbnail: ' . $e->getMessage(),
            ], 500);
        }
    }

    private function downloadVideo($url)
    {
        $localPath = public_path('temp/' . uniqid() . '.mp4');
        if (!file_exists(dirname($localPath))) {
            mkdir(dirname($localPath), 0755, true);
        }

        // Use file_get_contents or Guzzle to download the video
        $videoContent = file_get_contents($url);
        file_put_contents($localPath, $videoContent);

        return $localPath;
    }
}