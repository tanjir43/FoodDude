<?php


Route::get('/', [\App\Http\Controllers\Frontend\Home\HomeController::class,'home'])->name('home');
Route::get('/restaurantOwn/{id}',[\App\Http\Controllers\Frontend\Home\HomeController::class,'restaurantOwn'])->name('restaurant.own');

Route::get('/restaurant_search',[\App\Http\Controllers\Frontend\SearchRestaurant\SearchRestaurantController::class,'search'])->name('restaurant.search');

//restaurant all with filter
Route::get('/restaurant-all',[\App\Http\Controllers\Frontend\Restaurant\AllRestaurantController::class,'restaurantAll'])->name('restaurant.all');
Route::post('/restaurant-filter',[\App\Http\Controllers\Frontend\Restaurant\AllRestaurantController::class,'restaurantFilter'])->name('restaurant.filter');

