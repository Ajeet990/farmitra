<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Thumbnail Generator</title>
</head>
<body>
    <h1>Generate Video Thumbnail</h1>
    <form action="/generate-thumbnail" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="video_url">Video URL:</label>
        <input type="text" name="video_url" id="video_url" required>
        <button type="submit">Generate</button>
    </form>
</body>
</html>
