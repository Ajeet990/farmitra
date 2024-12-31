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

function generateQRCode($content, $filename) {
    $qrCode = new QrCode($content);

    $writer = new PngWriter();
    $result = $writer->write($qrCode);

    file_put_contents($filename, $result->getString());
}

function addQRCode($book_name, $publisher_name, $old_qrcode_value, $new_qrcode_value, $downloads, $status, $book_folder) {
    $data = getDataFromJson();
    $filename = 'qrcode_' . time() . '.png';
    $book_id=count($data['qrcodes']) + 1;
    generateQRCode($new_qrcode_value, $filename);
    createBookFolder($book_folder, $book_id);
    $newQRCode = [
        'id' => $book_id,
        'book_name' => $book_name,
        'publisher_name' => $publisher_name,
        'book_id' => $book_id,
        'old_qrcode_value' => $old_qrcode_value,
        'new_qrcode_value' => $new_qrcode_value,
        'downloads' => $downloads,
        'status' => $status,
        'filename' => $filename,
        'book_folder' => $book_folder // New field for book folder
    ];

    $data['qrcodes'][] = $newQRCode;
    saveDataToJson($data);
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
    $fileContent = "<?php\n// Dynamic book file for Book ID: {$bookId}\necho 'This is book ID: {$bookId}';\n";
    file_put_contents($bookFilePath, $fileContent);

    return $bookIdFolderPath;
}

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    addQRCode($_POST['book_name'], $_POST['publisher_name'],  $_POST['old_qrcode_value'], $_POST['url'], $_POST['downloads'], $_POST['status'], $_POST['book_folder']);
    
    // Redirect to avoid resubmission on page refresh
    header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
    exit();
}

// Read the data from the JSON file
$data = getDataFromJson();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book QR Code Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="mx-auto">
<h2 class="text-2xl font-semibold text-center text-gray-800  bg-green-800 text-gray-100 p-2" style="color:white">Book QR Code Management</h2>

    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 p-2">

        <!-- Left: Form -->
        <div class="bg-white p-6 col-span-3 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Create Book QR Code</h2>

            <!-- Form -->
            <form method="post" class="space-y-4">
                <div>
                    <label for="book_name" class="block text-sm font-medium text-gray-700">Book Name</label>
                    <input type="text" name="book_name" id="book_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="publisher_name" class="block text-sm font-medium text-gray-700">Publisher Name</label>
                    <input type="text" name="publisher_name" id="publisher_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                </div>
                <div>
                    <label for="old_qrcode_value" class="block text-sm font-medium text-gray-700">Old QR Code Value</label>
                    <input type="text" name="old_qrcode_value" id="old_qrcode_value" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700">New QR Code Value</label>
                    <input type="text" name="url" id="url" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                </div>
                <!-- Book Folder Field -->
                <div>
                    <label for="book_folder" class="block text-sm font-medium text-gray-700">Book Folder Name</label>
                    <input type="text" name="book_folder" id="book_folder" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                </div>
               

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>

                

                <div class="text-center">
                    <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-md">Submit</button>
                </div>
            </form>
        </div>

        <!-- Right: View Table -->
        <div class="bg-white p-6 col-span-9 overflow-auto rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">QR Code Entries</h2>

            <!-- Table to display QR Code data -->
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border-b text-left">ID</th>
                        <th class="px-4 py-2 border-b text-left">Book</th>
                        <th class="px-4 py-2 border-b text-left">Publisher</th>
                        <th class="px-4 py-2 border-b text-left">BookID</th>
                        <th class="px-4 py-2 border-b text-left">Old QRCode</th>
                        <th class="px-4 py-2 border-b text-left">New QRCode</th>
                        <th class="px-4 py-2 border-b text-left">Downloads</th>
                        <th class="px-4 py-2 border-b text-left">Status</th>
                        <th class="px-4 py-2 border-b text-left">QR Code</th>
                        <th class="px-4 py-2 border-b text-left">Book Folder</th> <!-- New Column -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['qrcodes'] as $qrcode): ?>
                    <tr>
                        <td class="px-4 py-2 border-b"><?= $qrcode['id'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['book_name'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['publisher_name'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['book_id'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['old_qrcode_value'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['new_qrcode_value'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['downloads'] ?></td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['status'] ?></td>
                        <td class="px-4 py-2 border-b">
                            <img src="<?= $qrcode['filename'] ?>" alt="QR Code" class="w-16 h-16">
                        </td>
                        <td class="px-4 py-2 border-b"><?= $qrcode['book_folder'] ?></td> <!-- Display Book Folder -->
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<script>
    // Check if the URL contains the success parameter
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        alert('QRCode successfully Generated!');
        // Remove the query parameter from the URL
        window.history.replaceState({}, document.title, window.location.pathname);
    }
</script>
</body>
</html>
