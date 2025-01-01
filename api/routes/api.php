<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\MandiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\FarmitraServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//-
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {//-
    return $request->user();//-
});//-
Route::get('/commodities', [MandiController::class, 'fetchCommoditiesData']);
Route::get('/commodities/state', [MandiController::class, 'stateData']);
Route::get('/current-weather', [WeatherController::class, 'getCurrentWeather']);
Route::get('/forecast-weather', [WeatherController::class, 'getForecastWeather']);
Route::post('/userlogin-with-otp', [UserController::class, 'userLoginWithMobile']);
Route::post('/login/verify-otp', [UserController::class, 'verifyOtp']);

Route::get('get-crops',[ApiController::class,'getCrop']);
Route::get('get-sub-crops/{crop_id}',[ApiController::class,'getSubCrop']);

Route::get('get-post-tags', [ApiController::class,'getPostTags']);
Route::get('get-blogs-category', [ApiController::class,'getBlogsCategory']);
Route::get('get-blogs/{blog_category_id?}', [ApiController::class,'getBlogs']);
Route::get('view-blogs-by-id/{blog_id}', [ApiController::class,'viewBlogById']);
Route::get('get-post', [ApiController::class,'getPost']);
Route::get('get-video-post', [ApiController::class,'getVideoPost']);


Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('add-farm', [ApiController::class,'addFarm']);
    Route::get('get-my-farm', [ApiController::class,'getMyFarm']);
    Route::post('add-farm-crop', [ApiController::class,'addFarmCrop']);
    Route::post('delete-my-farm', [ApiController::class,'deleteFarm']);
    Route::post('delete-my-farm-crop', [ApiController::class,'deleteFarmCrop']);
    Route::get('get-my-farm-crops/{farm_id}', [ApiController::class,'getMyFarmcrops']);
    //Route::post('update-farm-crop-timeline', [ApiController::class,'addCropTimeline']);
    Route::post('get-farm-crop-timeline', [ApiController::class,'getFarmTimeline']);
    Route::post('update-farm-crop-timeline/{crop_id}/{farm_crop_id}', [ApiController::class,'makeCropTimeline']);
    Route::get('crop-advisory-list/{crop_id}', [ApiController::class,'getCropAdvisory']);
    Route::get('crop-advisory-details-list/{crop_advisory_id}', [ApiController::class,'getCropAdvisoryDetails']);
    Route::get('next-crop-advisory-list/{crop_advisory_id}', [ApiController::class,'getNextCropAdvisoryList']);
    Route::get('crop-protection-list/{crop_id}', [ApiController::class,'getCropProtection']);
    Route::get('crop-protection-details/{crop_id}', [ApiController::class,'getCropProtectionDetails']);
    Route::get('next-crop-protection-list/{crop_protection_id}', [ApiController::class,'getNextCropProtectionList']);

    //Crop diagnosis
    Route::post('add-new-diagnosis', [FarmitraServicesController::class, 'addNewCropDiagnosis']);
    
        //post section
    Route::post('add-post-by-user', [ApiController::class,'addPostByUser']);
    Route::post('add-post-by-expert', [ApiController::class,'addPostByExpert']);
});