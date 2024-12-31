<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\AboutPage;
use App\Livewire\AddAdminProduct;
use App\Livewire\AddDeliveryBoys;
use App\Livewire\AdminCategory;
use App\Livewire\AdminProductList;
use App\Livewire\AdminSubCategory;
use App\Livewire\Brands;
use App\Livewire\ContactUsPage;
use App\Livewire\DeliveryBoysList;
use App\Livewire\DownloadAppPage;
use App\Livewire\EditAdminProduct;
use App\Livewire\FeaturesPage;
use App\Livewire\PrivacyPolicy;
use App\Livewire\ReviewsPage;
use App\Livewire\Terms;
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
})->name('index');

Route::get('/about', AboutPage::class)->name('about');
Route::get('/features', FeaturesPage::class)->name('features');
Route::get('/reviews', ReviewsPage::class)->name('reviews');
Route::get('/contact-us', ContactUsPage::class)->name('contact');
Route::get('/privacy-policy', PrivacyPolicy::class)->name('privacy_policy');
Route::get('/terms', Terms::class)->name('terms');
Route::get('/download', DownloadAppPage::class)->name('download');


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
    Route::get('delivery/add', AddDeliveryBoys::class)->name('add_delivery_boys');
});

require __DIR__ . '/auth.php';
