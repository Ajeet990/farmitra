<?php

namespace App\Http\Controllers;
use App\Models\ErrorLog;

abstract class Controller
{
    public function uploadImage($request, $folderName)
    {
        if ($request->hasFile('image')) {
            // $image = $request->file('image');
            // $destinationPath = public_path('storage/' . $folderName);
            // $imageName = time() . '_' . $image->getClientOriginalName();
            // $image->move($destinationPath, $imageName);
            // $imageUrl = asset('storage/'. $folderName . '/' . $imageName);
            // $specificImageUrl = $folderName . '/' . $imageName;


            $specificImageUrl = $request->file('image')->store($folderName, 'public');

        }
        return $specificImageUrl;
    }

    public function storeError($error)
    {
        ErrorLog::create([
            'message' => $error->getMessage(),
            'file' => $error->getFile(),
            'line' => $error->getLine()
        ]);
    }
}
