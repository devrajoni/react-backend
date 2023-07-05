<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\RoleCreateController;
use App\Http\Controllers\Admin\AgentCreateController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\ServiceBannerController;
use App\Http\Controllers\Admin\SingleServiceBannerController;
use App\Http\Controllers\Admin\WorkBannerController;
use App\Http\Controllers\Admin\AboutBannerController;
use App\Http\Controllers\Admin\BlogBannerController;
use App\Http\Controllers\Admin\ContactBannnerController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WorkGalleryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\LatestController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WorkController;
use App\Http\Controllers\Admin\AboutGalleryController;
use App\Http\Controllers\Admin\ServieWorkController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\AboutBusinessController;
use App\Http\Controllers\Admin\AboutSkillController;
use App\Http\Controllers\Admin\AboutCardController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\SimilarProjectController;
use App\Http\Controllers\Admin\ContactCardController;
use App\Http\Controllers\Admin\ServiceSkillController;
use App\Http\Controllers\Admin\WorkCategoryController;
use App\Http\Controllers\Admin\SingleBlogBanner;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/home',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');

Route::group(['middleware' =>['admin.auth','auth']], function(){
    Route::group(['prefix'=>'admin'],function(){
        Route::get('/',[AdminDashboardController::class,'dashboard'])->name('admin.dashboard');


        Route::get('role',[RoleCreateController::class,'index'])->name('admin.index.role');
        Route::get('role/create',[RoleCreateController::class,'create'])->name('admin.create.role');
        Route::get('role/edit/{id}',[RoleCreateController::class,'edit']);
        Route::post('role/create',[RoleCreateController::class,'store'])->name('admin.create.store');
        Route::post('role/edit/{id}',[RoleCreateController::class,'update'])->name('admin.create.update');

        Route::get('employee',[AgentCreateController::class,'index'])->name('admin.emp.index');
        Route::get('employee/create',[AgentCreateController::class,'create'])->name('admin.emp.create');
        Route::post('agent',[AgentCreateController::class,'store'])->name('admin.imp.store');
        Route::post('agent/status/{id}',[AgentCreateController::class,'status'])->name('admin.imp.status.update');
        Route::get('agentprofile/{id}',[AgentCreateController::class,'show'])->name('admin.agent.show');
        Route::resource('home-banner', HomeBannerController::class);
        Route::resource('service-banner', ServiceBannerController::class);
        Route::resource('single-service-banner', SingleServiceBannerController::class);
        Route::resource('work-banner', WorkBannerController::class);
        Route::resource('about-banner', AboutBannerController::class);
        Route::resource('blog-banner', BlogBannerController::class);
        Route::resource('single-blog', SingleBlogBanner::class);
        Route::resource('contact-banner', ContactBannnerController::class);
        Route::resource('service', ServiceController::class);
        Route::get('service-status/{id}', [ServiceController::class, 'status'])->name('service-status');
        Route::resource('work-gallery', WorkGalleryController::class);
        Route::resource('testimonial', TestimonialController::class);
        Route::get('testimonial-status/{id}', [TestimonialController::class, 'status'])->name('testimonial-status');
        Route::resource('about', AboutController::class);
        Route::get('about-status/{id}', [AboutController::class, 'status'])->name('about-status');
        Route::resource('latest', LatestController::class);
        Route::get('latest-status/{id}', [LatestController::class, 'status'])->name('latest-status');
        Route::resource('team', TeamController::class);
        Route::get('team-status/{id}', [TeamController::class, 'status'])->name('team-status');
        Route::resource('social', SocialController::class);
        Route::resource('setting', SettingController::class);
        Route::resource('work', WorkController::class);
        Route::resource('about-gallery', AboutGalleryController::class);
        Route::resource('service-work', ServieWorkController::class);
        Route::resource('about-card', AboutCardController::class);
        Route::get('about-card-status/{id}', [AboutCardController::class, 'status'])->name('about-card-status');
        Route::get('about-skill-status/{id}', [AboutSkillController::class, 'status'])->name('about-skill-status');
        Route::resource('about-skill', AboutSkillController::class);
        Route::resource('service-skill', ServiceSkillController::class);
         Route::get('service-skill-status/{id}', [ServiceSkillController::class, 'status'])->name('service-skill-status');
        Route::resource('about-business', AboutBusinessController::class);
        Route::resource('feature', FeatureController::class);
        Route::get('feature-status/{id}', [FeatureController::class, 'status'])->name('feature-status');
        Route::resource('similar-project', SimilarProjectController::class);
        Route::get('work-status/{id}', [WorkController::class, 'status'])->name('work-status');
        Route::resource('contact-card', ContactCardController::class);
        Route::get('contact-card-status/{id}', [ContactCardController::class, 'status'])->name('contact-card-status');
        Route::resource('work-category', WorkCategoryController::class);
        Route::get('work-category-status/{id}', [WorkCategoryController::class, 'status'])->name('work-category-status');
        Route::get('contacts', [ContactController::class, 'index'])->name('contacts');
        Route::get('contact-destroy/{id}', [ContactController::class, 'destroy'])->name('contact-destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});
//Clear Cache facade value:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return '<h1>Cache facade value cleared</h1>';
});

//Reoptimized class loader:
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Reoptimized class loader</h1>';
});

//Route cache:
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return '<h1>Routes cached</h1>';
});

//Clear Route cache:
Route::get('/route-clear', function() {
    $exitCode = Artisan::call('route:clear');
    return '<h1>Route cache cleared</h1>';
});

//Clear View cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return '<h1>View cache cleared</h1>';
});

//Clear Config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return '<h1>Clear Config cleared</h1>';
});

require __DIR__.'/auth.php';
