<?php
// Function to recursively add files and folders to a ZIP archive
function zipFolder($folderPath, $zipArchive, $baseFolder) {
    $folderPath = realpath($folderPath);
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folderPath, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );
    foreach ($files as $file) {
        $filePath = realpath($file);
        if (is_dir($filePath)) {
            $zipArchive->addEmptyDir(str_replace($baseFolder . '/', '', $filePath . '/'));
        } else if (is_file($filePath)) {
            $zipArchive->addFile($filePath, str_replace($baseFolder . '/', '', $filePath));
        }
    }
}

// Get the `book_name` parameter from the query string
if (!isset($_GET['book_name']) || empty($_GET['book_name'])) {
    die('Error: No book name specified.');
}
$bookName = basename($_GET['book_name']);
$rootDirectory = __DIR__ . '/' . $bookName;

// Check if the folder exists
if (!is_dir($rootDirectory)) {
    die('Error: The specified book folder does not exist.');
}

// Name of the ZIP file to create
$zipFileName = $bookName . '.zip';

// Create a ZIP archive
$zip = new ZipArchive();
if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
    die('Error: Could not create ZIP file.');
}

// Add files and folders to the ZIP archive
zipFolder($rootDirectory, $zip, $rootDirectory);
$zip->close();

// Serve the ZIP file as a download
if (file_exists($zipFileName)) {
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zipFileName) . '"');
    header('Content-Length: ' . filesize($zipFileName));
    readfile($zipFileName);

    // Optionally delete the ZIP file after download
    unlink($zipFileName);
    exit;
} else {
    echo 'Error: Failed to create ZIP file.';
}
