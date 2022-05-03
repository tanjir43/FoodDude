<?php


Route::get('/', [\App\Http\Controllers\Frontend\Home\HomeController::class,'home'])->name('home');
Route::get('/restaurantOwn/{id}',[\App\Http\Controllers\Frontend\Home\HomeController::class,'restaurantOwn'])->name('restaurant.own');
