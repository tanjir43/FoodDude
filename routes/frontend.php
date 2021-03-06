<?php


Route::get('/', [\App\Http\Controllers\Frontend\Home\HomeController::class,'home'])->name('home');
Route::get('/restaurantOwn/{id}',[\App\Http\Controllers\Frontend\Home\HomeController::class,'restaurantOwn'])->name('restaurant.own');

Route::get('/restaurant_search',[\App\Http\Controllers\Frontend\SearchRestaurant\SearchRestaurantController::class,'search'])->name('restaurant.search');

//restaurant all with filter
Route::get('/restaurant-all',[\App\Http\Controllers\Frontend\Restaurant\AllRestaurantController::class,'restaurantAll'])->name('restaurant.all');
Route::post('/restaurant-filter',[\App\Http\Controllers\Frontend\Restaurant\AllRestaurantController::class,'restaurantFilter'])->name('restaurant.filter');

//all-restaurant-search
Route::get('autosearch' ,[\App\Http\Controllers\Frontend\Restaurant\AllRestaurantController::class,'autoSearch'])->name('autosearch');
Route::get('/restaurant-all-search',[\App\Http\Controllers\Frontend\Restaurant\AllRestaurantController::class,'restaurantAllSearch'])->name('restaurant.all.search');

//search in own restaurant

Route::get('/restaurant-own-find/{id}',[\App\Http\Controllers\Frontend\Home\HomeController::class,'reservation_find'])->name('restaurant.reservation find');
Route::get('/reservation-own-find/{id}',[\App\Http\Controllers\Frontend\Home\HomeController::class,'reservation_complete'])->name('restaurant.reservation complete');
