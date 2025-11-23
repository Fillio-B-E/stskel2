<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\RestaurantAdminDetailController;
use App\Http\Controllers\AdminRestaurantController;
use App\Http\Controllers\ReservationViewController;
use App\Http\Controllers\AdminReservationTabController;
use App\Http\Controllers\AdminMenuController;

//Menu
Route::get('/menu/{restaurant}', [MenuController::class, 'show'])->name('menu.show');



//Reservation
Route::middleware(['auth'])->group(function () {
    Route::post('/reserve', [ReservationController::class, 'store'])->name('reserve.store'); //
    Route::get('/schedule', [ReservationController::class, 'index'])->name('schedule');
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/reservation', [ReservationViewController::class, 'index'])->name('reservation');
    Route::get('/restaurant_detail/{id}', [ReservationViewController::class, 'show'])->name('restaurant_detail');
});

Route::middleware(['auth', 'checkByRole:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])
        ->name('dashboard');

    // Reservation actions
    Route::post('/reservation/accept/{id}', [AdminReservationController::class, 'accept'])->name('reservation.accept');
    Route::post('/reservation/deny/{id}', [AdminReservationController::class, 'deny'])->name('reservation.deny');
    Route::get('/reservation/{id}', [AdminReservationController::class, 'show'])->name('reservation.show');
    Route::get('/reservation', [AdminReservationTabController::class, 'index'])->name('reservation.index');

    // Route::resource('restaurants', AdminRestaurantController::class);
    Route::resource('restaurants', RestaurantAdminDetailController::class);

    Route::get('/menu', [AdminMenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [AdminMenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [AdminMenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [AdminMenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [AdminMenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [AdminMenuController::class, 'destroy'])->name('menu.destroy');
    
    Route::get('/schedule', [ReservationController::class, 'index'])->name('schedule.index');

});


//Auth
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
//Static
Route::view('/landing', 'landing');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
