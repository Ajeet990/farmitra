<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Route::get('/linkstorage', function () {
    \Artisan::call('storage:link');
});

Route::get('/migrate', function () {
    \Artisan::call('migrate');
    dd('migrate');
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

    Route::get('user-management',\App\Livewire\UserManagement::class)->name('user-management');
    Route::get('crop-management',\App\Livewire\CropManagement::class)->name('crop-management');
    Route::get('add-sub-crop',\App\Livewire\SubCrop::class)->name('sub-crop');
    Route::get('blog-management',\App\Livewire\BlogManagement::class)->name('blog-management');
    Route::get('blog/{blogId}/edit',\App\Livewire\BlogEdit::class)->name('edit-blog');
    Route::get('expert-management',\App\Livewire\ExpertManagement::class)->name('expert-management');
    Route::get('/crop-category/edit/{cropId}', \App\Livewire\EditCrop::class)->name('edit-crop');
    Route::get('/crop/edit/{cropId}', \App\Livewire\EditSubCrop::class)->name('edit-sub-crop');
    Route::get('/feed-management', \App\Livewire\FeedManagement::class)->name('feed-management');
    Route::get('/post-feed-management', \App\Livewire\PostFeedManagement::class)->name('post-feed-management');
    Route::get('/video-feed-management', \App\Livewire\VideoFeedManagement::class)->name('video-feed-management');
    Route::get('/news-feed-management', \App\Livewire\NewsFeedManagement::class)->name('news-feed-management');

    Route::get('/crop-timeline', \App\Livewire\CropTimeline::class)->name('crop-timeline');
    Route::get('/crop-advisory-stages', \App\Livewire\MakeCropAdvisoryStages::class)->name('crop-advisory-stages');
    Route::get('/edit-crop-advisory-stages/{stage_id}', \App\Livewire\EditCropAdvisoryStages::class)->name('edit-crop-advisory-stages');
    Route::get('/crop-advisory-stages-details/{stage_id}', \App\Livewire\MakeCropAdvisoryStagesDetails::class)->name('crop-advisory-stages-details');
    Route::get('/edit-crop-advisory-stages-details/{advisory_detail_id}', \App\Livewire\EditCropAdvisoryStagesDetails::class)->name('edit-crop-advisory-stages-details');
    Route::get('/crop-protection', \App\Livewire\CropProtection::class)->name('crop-protection');
    Route::get('/edit-crop-protection/{crop_protection_id}', \App\Livewire\EditCropProtection::class)->name('edit-crop-protection');
});

require __DIR__.'/auth.php';


