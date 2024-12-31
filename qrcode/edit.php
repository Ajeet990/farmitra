<?php
require 'vendor/autoload.php'; // Include Composer's autoloader

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

function getDataFromJson() {
    $json = file_get_contents('data.json');
    return json_decode($json, true);
}

function saveDataToJson($data) {
    $json = json_encode($data, JSON_PRETTY_PRINT);
    file_put_contents('data.json', $json);
}

function updateQRCode($id, $book_name, $publisher_name, $book_id, $old_qrcode_value,$downloads, $status, $book_folder) {
    $data = getDataFromJson();
    foreach ($data['qrcodes'] as &$entry) {
        if ($entry['id'] == $id) {
            $filename = 'qrcode_' . time() . '.png';
            $qrCode = new QrCode(empty($old_qrcode_value)?$book_id:$$old_qrcode_value);
            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            file_put_contents($filename, $result->getString());

            // Update the entry
            $entry['book_name'] = $book_name;
            $entry['publisher_name'] = $publisher_name;
            $entry['book_id'] = $book_id;
            $entry['old_qrcode_value'] = $old_qrcode_value;
            //$entry['new_qrcode_value'] = $new_qrcode_value;
            $entry['downloads'] = $downloads;
            $entry['status'] = $status;
            $entry['filename'] = $filename;
            $entry['book_folder'] = $book_folder; // Update the book folder path
            break;
        }
    }
    saveDataToJson($data);

    // Create or update the book folder
    createBookFolder($book_folder, $book_id);
}

function createBookFolder($bookFolder, $bookId) {
    // Define the path for the book folder and book ID folder
    $baseFolderPath = __DIR__ . '/' . $bookFolder; // Path for the base folder
    $bookIdFolderPath = $baseFolderPath . '/' . $bookId; // Path for the book ID folder

    // Ensure the base folder exists
    if (!is_dir($baseFolderPath)) {
        mkdir($baseFolderPath, 0777, true);
    }

    // Create the book ID folder
    if (!is_dir($bookIdFolderPath)) {
        mkdir($bookIdFolderPath, 0777, true);
    }

    // Create the book.php file within the book ID folder
    $bookFilePath = $bookIdFolderPath . '/book.php';
    $bookFileContent = "<?php";

    // Add the ZIP functionality in book.php
    $bookFileContent .= "\n// Function to recursively add files and folders to a ZIP archive\n";
    $bookFileContent .= "function zipFolder(\$folderPath, \$zipArchive, \$baseFolder) {\n";
    $bookFileContent .= "    \$folderPath = realpath(\$folderPath);\n";
    $bookFileContent .= "    \$files = new RecursiveIteratorIterator(\n";
    $bookFileContent .= "        new RecursiveDirectoryIterator(\$folderPath, RecursiveDirectoryIterator::SKIP_DOTS),\n";
    $bookFileContent .= "        RecursiveIteratorIterator::SELF_FIRST\n";
    $bookFileContent .= "    );\n";
    $bookFileContent .= "    foreach (\$files as \$file) {\n";
    $bookFileContent .= "        \$filePath = realpath(\$file);\n";
    $bookFileContent .= "        if (is_dir(\$filePath)) {\n";
    $bookFileContent .= "            \$zipArchive->addEmptyDir(str_replace(\$baseFolder . '/', '', \$filePath . '/'));\n";
    $bookFileContent .= "        } else if (is_file(\$filePath)) {\n";
    $bookFileContent .= "            \$zipArchive->addFile(\$filePath, str_replace(\$baseFolder . '/', '', \$filePath));\n";
    $bookFileContent .= "        }\n";
    $bookFileContent .= "    }\n";
    $bookFileContent .= "}\n";

    $bookFileContent .= "\n// Get the `book_name` parameter from the query string\n";
    $bookFileContent .= "if (!isset(\$_GET['book_name']) || empty(\$_GET['book_name'])) {\n";
    $bookFileContent .= "    die('Error: No book name specified.');\n";
    $bookFileContent .= "}\n";
    $bookFileContent .= "\$bookName = basename(\$_GET['book_name']);\n";
    $bookFileContent .= "\$rootDirectory = __DIR__ . '/' . \$bookName;\n";

    $bookFileContent .= "\n// Check if the folder exists\n";
    $bookFileContent .= "if (!is_dir(\$rootDirectory)) {\n";
    $bookFileContent .= "    die('Error: The specified book folder does not exist.');\n";
    $bookFileContent .= "}\n";

    $bookFileContent .= "\n// Name of the ZIP file to create\n";
    $bookFileContent .= "\$zipFileName = \$bookName . '.zip';\n";

    $bookFileContent .= "\n// Create a ZIP archive\n";
    $bookFileContent .= "\$zip = new ZipArchive();\n";
    $bookFileContent .= "if (\$zip->open(\$zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {\n";
    $bookFileContent .= "    die('Error: Could not create ZIP file.');\n";
    $bookFileContent .= "}\n";

    $bookFileContent .= "\n// Add files and folders to the ZIP archive\n";
    $bookFileContent .= "zipFolder(\$rootDirectory, \$zip, \$rootDirectory);\n";
    $bookFileContent .= "\$zip->close();\n";

    $bookFileContent .= "\n// Serve the ZIP file as a download\n";
    $bookFileContent .= "if (file_exists(\$zipFileName)) {\n";
    $bookFileContent .= "    header('Content-Type: application/zip');\n";
    $bookFileContent .= "    header('Content-Disposition: attachment; filename=\"' . basename(\$zipFileName) . '\"');\n";
    $bookFileContent .= "    header('Content-Length: ' . filesize(\$zipFileName));\n";
    $bookFileContent .= "    readfile(\$zipFileName);\n";
    $bookFileContent .= "\n    // Optionally delete the ZIP file after download\n";
    $bookFileContent .= "    unlink(\$zipFileName);\n";
    $bookFileContent .= "    exit;\n";
    $bookFileContent .= "} else {\n";
    $bookFileContent .= "    echo 'Error: Failed to create ZIP file.';\n";
    $bookFileContent .= "}\n";
    file_put_contents($bookFilePath, $bookFileContent);
    
    return $bookIdFolderPath;
}


// Get the entry to edit
$editId = isset($_GET['id']) ? (int)$_GET['id'] : null;
if ($editId === null) {
    die("Invalid request: No ID provided.");
}

$data = getDataFromJson();
$editData = null;
foreach ($data['qrcodes'] as $entry) {
    if ($entry['id'] == $editId) {
        $editData = $entry;
        break;
    }
}

if ($editData === null) {
    die("Error: QR Code entry not found.");
}

function deleteBookFolder($bookFolder, $bookId) {
    $bookIdFolderPath = __DIR__ . '/' . $bookFolder . '/' . $bookId;

    // Check if the folder exists
    if (is_dir($bookIdFolderPath)) {
        // Delete all files and subfolders inside the book folder
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($bookIdFolderPath, RecursiveDirectoryIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($files as $fileinfo) {
            $todo = ($fileinfo->isDir() ? 'rmdir' : 'unlink');
            $todo($fileinfo->getRealPath());
        }

        // Remove the main folder
        rmdir($bookIdFolderPath);
    }
}

function deleteQRCode($id) {
    $data = getDataFromJson();
    foreach ($data['qrcodes'] as $key => $entry) {
        if ($entry['id'] == $id) {
            // Delete the QR code file
            if (file_exists($entry['filename'])) {
                unlink($entry['filename']);
            }

            // Delete the associated book folder and files
            deleteBookFolder($entry['book_folder'], $entry['book_id']);

            // Remove the entry from the data array
            unset($data['qrcodes'][$key]);

            break;
        }
    }

    // Reindex the array and save updated data
    $data['qrcodes'] = array_values($data['qrcodes']);
    saveDataToJson($data);
}
if (isset($_POST['delete_id'])) {
    $deleteId = (int)$_POST['delete_id'];
    deleteQRCode($deleteId);
    header("Location: generate_qrcode.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    updateQRCode(
        $editId,
        $_POST['book_name'],
        $_POST['publisher_name'],
        $_POST['book_id'],
        $_POST['old_qrcode_value'],
        $_POST['downloads'],
        $_POST['status'],
        $_POST['book_folder'],
    );
    header("Location: generate_qrcode.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit QR Code</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-md mt-10">
    <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Edit QR Code Entry</h2>
    <form method="post" class="space-y-4">
        <div>
            <label for="book_name" class="block text-sm font-medium text-gray-700">Book Name</label>
            <input type="text" name="book_name" id="book_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['book_name'] ?>" required>
        </div>
        <div>
            <label for="publisher_name" class="block text-sm font-medium text-gray-700">Publisher Name</label>
            <input type="text" name="publisher_name" id="publisher_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['publisher_name'] ?>" required>
        </div>
        <div>
            <label for="book_id" class="block text-sm font-medium text-gray-700">Book ID</label>
            <input type="text" name="book_id" id="book_id" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['book_id'] ?>" required>
        </div>
        <div>
            <label for="old_qrcode_value" class="block text-sm font-medium text-gray-700">Old QR Code Value</label>
            <input type="text" name="old_qrcode_value" id="old_qrcode_value" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['old_qrcode_value'] ?>" required>
        </div>
        <!-- <div>
            <label for="url" class="block text-sm font-medium text-gray-700">New QR Code Value</label>
            <input type="text" name="url" id="url" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['new_qrcode_value'] ?>" required>
        </div> -->
        <div>
            <label for="downloads" class="block text-sm font-medium text-gray-700">Downloads</label>
            <input type="number" name="downloads" id="downloads" min="0" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['downloads'] ?>" required>
        </div>
        <div>
            <label for="book_folder" class="block text-sm font-medium text-gray-700">Book Folder</label>
            <input type="text" name="book_folder" id="book_folder" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="<?= $editData['book_folder'] ?>" required>
        </div>
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select name="status" id="status" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                <option value="active" <?= $editData['status'] === 'active' ? 'selected' : '' ?>>Active</option>
                <option value="inactive" <?= $editData['status'] === 'inactive' ? 'selected' : '' ?>>Inactive</option>
                <option value="archived" <?= $editData['status'] === 'archived' ? 'selected' : '' ?>>Archived</option>
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md">Update</button>
        </div>
    </form>
</div>

</body>
</html>
