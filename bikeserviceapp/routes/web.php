<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingServiceController;
use Illuminate\Support\Facades\Auth;


Route::middleware("auth")->group(function(){
    Route::view("/","welcome")->name('home');
    //booking service page
Route::get("/booking",[ BookingServiceController::class , "index"])->name('booking');
Route::post("/booking",[ BookingServiceController::class , "store"])->name('bookingservice');
Route::put('/booking/update/{id}', [BookingServiceController::class, 'updateStatus'])->name('booking.update');
});

//login routes
Route::get("/",[ AuthController::class , "login"])->name('login');
Route::post("/",[ AuthController::class , "loginpost"])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//register route
Route::get("/register",[ AuthController::class , "register"])->name('register');
Route::post("/register",[ AuthController::class , "registerpost"])->name('register.post');


