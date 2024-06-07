<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AddAdminProduct;
use App\Livewire\AdminCategory;
use App\Livewire\AdminProductList;
use App\Livewire\AdminSubCategory;
use App\Livewire\Brands;
use App\Livewire\DeliveryBoysList;
use App\Livewire\EditAdminProduct;
use Illuminate\Support\Facades\Route;
use Webklex\IMAP\Facades\Client;

ini_set('memory_limit', '2048M');
Route::get('get_mail', function () {
    $client = Client::account("default");
    $client->connect();

    /** @var \Webklex\PHPIMAP\Support\FolderCollection $folders */
    $folders = $client->getFolders(false);

    /** @var \Webklex\PHPIMAP\Folder $folder */
    foreach ($folders as $folder) {
        //$this->info("Accessing folder: ".$folder->path);  
        echo 'Path = ' . $folder->path . '';
        $messages = $folder->messages()->all()->get();

        //$this->info("Number of messages: ".$messages->count());  

        /** @var \Webklex\PHPIMAP\Message $message */
        foreach ($messages as $message) {
            //$this->info("\tMessage: ".$message->getSender());  
            echo '\t Message: ' . $message->getSender();
        }
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('brand', Brands::class)->name('admin_brand');
    Route::get('category', AdminCategory::class)->name('admin_category');
    Route::get('sub_category', AdminSubCategory::class)->name('admin_sub_category');
    Route::get('product', AdminProductList::class)->name('admin_product');
    Route::get('product/add', AddAdminProduct::class)->name('add_admin_product');
    Route::get('product/edit/{id}', EditAdminProduct::class)->name('edit_admin_product');
    // Delivery Boys
    Route::get('delivery', DeliveryBoysList::class)->name('delivery_boys_list');
});

require __DIR__ . '/auth.php';
