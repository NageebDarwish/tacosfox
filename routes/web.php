<?php

use App\Http\Controllers\ArabicDashboardController;
use App\Http\Controllers\ArabicMealController;
use App\Http\Controllers\ArabicMenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteArabicController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes

// En
Route::get('/', [WebsiteController::class, 'homePage'])->name('home');

Route::get('/menu', [WebsiteController::class, 'menuPage'])->name('menu');
Route::get('/contact', [WebsiteController::class, 'contactPage'])->name('contact');
Route::get('/gallery', [WebsiteController::class, 'galleryPage'])->name('gallery');
Route::get('/instagram', [InstagramController::class, 'getPosts']);

// Ar
Route::get('/ar', [WebsiteArabicController::class, 'homePage'])->name('home-ar');
Route::get('/ar/menu', [WebsiteArabicController::class, 'menuPage'])->name('menu-ar');
Route::get('/ar/contact', [WebsiteArabicController::class, 'contactPage'])->name('contact-ar');
Route::get('/ar/gallery', [WebsiteArabicController::class, 'galleryPage'])->name('gallery-ar');


// Protected Routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard-ar', [ArabicDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard-ar');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // En
    Route::controller(MenuController::class)->group(function () {
        Route::get('/menus',  'index')->name('menus');
        Route::get('/menus/add-menu', 'create');
        Route::get('/menus/edit-menu/{id}', 'edit');

        Route::post('/menus/add-menu', 'store');
        Route::post('/menus/edit-menu/{id}', 'update');
        Route::delete('/menus/delete/{id}', 'destroy');
    });

    Route::controller(MealsController::class)->group(function () {
        Route::get('/meals', 'index')->name('meals');
        Route::get('/meals/add-meal', 'create');
        Route::get('/meals/edit-meal/{id}', 'edit');
        Route::post('/meals/add-meal', 'store');
        Route::post('/meals/edit-meal/{id}', 'update');
        Route::delete('/meals/delete/{id}', 'destroy');
    });

    // Ar

    Route::controller(ArabicMenuController::class)->prefix('/dashboard-ar')->group(function () {
        Route::get('/menu',  'index')->name('menus-ar');
        Route::get('/menu/add-menu', 'create');
        Route::get('/menu/edit-menu/{id}', 'edit');
        Route::post('/menu/add-menu', 'store');
        Route::post('/menu/edit-menu/{id}', 'update');
        Route::delete('/menu/delete/{id}', 'destroy');
    });

    Route::controller(ArabicMealController::class)->prefix('/dashboard-ar')->group(function () {
        Route::get('/meal', 'index')->name('meals-ar');
        Route::get('/meal/add-meal', 'create');
        Route::get('/meal/edit-meal/{id}', 'edit');
        Route::post('/meal/add-meal', 'store');
        Route::post('/meal/edit-meal/{id}', 'update');
        Route::delete('/meal/delete/{id}', 'destroy');
    });
});

require __DIR__ . '/auth.php';
