<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;

// ========== MENU ==========
Route::get('/menu/{restaurant}', [MenuController::class, 'show'])->name('menu.show');

// ========== RESERVATION ==========
Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store');
Route::get('/schedule', [ReservationController::class, 'index'])->middleware('auth')->name('schedule');

// ========== AUTH ==========
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ========== STATIC PAGES ==========
Route::view('/landing', 'landing');
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/reservation', 'reservation')->name('reservation');

// ========== RESTAURANT DETAIL ==========
Route::get('/restaurant_detail/{id}', function ($id) {
    $restaurants = [
        ['id' => 1, 'name' => 'La Pergola', 'location' => 'Rome', 'images' => ['R1.png', 'R1a.jpg', 'R1b.jpg']],
        ['id' => 2, 'name' => 'Commonwealth', 'location' => 'Virginia', 'images' => ['R2.png', 'R2a.jpg', 'R2b.jpg']],
        ['id' => 3, 'name' => 'Osteria Francescana', 'location' => 'Italy', 'images' => ['R3.png', 'R3a.jpg', 'R3b.jpg']],
        ['id' => 4, 'name' => 'Le Bernardin', 'location' => 'France', 'images' => ['R4.png', 'res4a.jpg', 'res4b.jpg', 'res4c.jpg']],
        ['id' => 5, 'name' => 'Eleven Madison Park', 'location' => 'New York City', 'images' => ['res5.jpg']],
        ['id' => 6, 'name' => 'Pappas Steakhouse', 'location' => 'America', 'images' => ['res6.jpg']],
        ['id' => 7, 'name' => 'Geronimo', 'location' => 'America', 'images' => ['res7.jpg']],
        ['id' => 8, 'name' => 'Din Tai Fung', 'location' => 'Taiwan', 'images' => ['res8.jpg']],
        ['id' => 9, 'name' => 'Hard Rock Cafe', 'location' => 'Global', 'images' => ['res9.jpg']],
    ];

    $restaurant = collect($restaurants)->firstWhere('id', (int)$id);

    if (! $restaurant) {
        abort(404, 'Restaurant not found');
    }

    $restaurant['images'] = array_map(fn($f) => asset("images/{$f}"), $restaurant['images']);

    return view('restaurant_detail', compact('restaurant'));
})->name('restaurant_detail');
