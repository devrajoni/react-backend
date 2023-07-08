<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ContactController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/home-banner',[HomeController::class,'home'])->name('home-banner');
    Route::get('/service-banner',[HomeController::class,'service'])->name('service-banner');
    Route::get('/single-service-banner',[HomeController::class,'single'])->name('single-service-banner');
    Route::get('/about-banner',[HomeController::class,'about'])->name('about-banner');
    Route::get('/work-banner',[HomeController::class,'work'])->name('work-banner');
    Route::get('/blog-banner',[HomeController::class,'blog'])->name('blog-banner');
    Route::get('/single-blog',[HomeController::class,'singleBlog'])->name('single-blog');
    Route::get('/blog-details/{id}',[HomeController::class,'blogDetails'])->name('blog-details');
    Route::get('/contact-banner',[HomeController::class,'contact'])->name('contact-banner');
    Route::get('/service',[HomeController::class,'services'])->name('service');
    Route::get('/single-service/{id}',[HomeController::class,'serviceOne']);
    Route::get('/single-work/{id}',[HomeController::class,'singleWork']);
    Route::get('/about',[HomeController::class,'abouts'])->name('about');
    Route::get('/testimonial',[HomeController::class,'testimonial'])->name('testimonial');
    Route::get('/latest',[HomeController::class,'latest'])->name('latest');
    Route::get('/team',[HomeController::class,'team'])->name('team');
    Route::get('/work',[HomeController::class,'works'])->name('work');
    Route::get('/social',[HomeController::class,'social'])->name('social');
    Route::get('/setting',[HomeController::class,'setting'])->name('setting');
    Route::get('/work-gallery',[HomeController::class,'workGallery'])->name('work-gallery');
    Route::get('/work-category',[HomeController::class,'workCategory'])->name('work-category');
    Route::get('/about-gallery',[HomeController::class,'aboutGallery'])->name('about-gallery');
    Route::get('/service-work',[HomeController::class,'serviceWork'])->name('service-work');
    Route::get('/about-card',[HomeController::class,'aboutCard'])->name('about-card');
    Route::get('/about-skill',[HomeController::class,'aboutSkill'])->name('about-skill');
    Route::get('/about-business',[HomeController::class,'aboutBusiness'])->name('about-business');
    Route::get('/similar-project',[HomeController::class,'similarProject'])->name('similar-project');
    Route::get('/feature',[HomeController::class,'feature'])->name('feature');
    Route::get('/contact-card',[HomeController::class,'contacts'])->name('contact-card');
    Route::post('/testimonial',[HomeController::class,'store'])->name('testimonial');
    Route::post('/contact',[ContactController::class,'store'])->name('contact');