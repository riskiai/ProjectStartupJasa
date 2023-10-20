<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\TempImageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

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


/* Bagian Halaman Landing Page */
Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'about']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/services-detail', [ServicesController::class, 'servicesdetail']);
Route::get('/faq', [FaqController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);



// Milddleware Khsusus AdminPages
Route::group(['prefix' => 'admin'], function(){
    
    Route::group(['middleware' => 'admin.guest'], function(){
        // here we will define guest route
    
        Route::get('/login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('/login', [AdminLoginController::class, 'authenticate'])->name('admin.auth');
    });

    Route::group(['middleware' => 'admin.auth'], function(){
        // here we will define password protected routes

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard'); 
        Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');   

        Route::get('/services/create', [ServiceController::class, 'create']);
        Route::post('/services/create', [ServiceController::class, 'save'])->name('service.create');
        
        Route::post('/temp/upload', [TempImageController::class, 'upload'])->name('tempUpload');

        Route::get('/services', [ServiceController::class, 'index'])->name('serviceList');
    });
    
});