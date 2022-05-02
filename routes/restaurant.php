<?php
Route::group(['prefix'=>'restaurant'],function (){

    Route::get('/login',[\App\Http\Controllers\Restaurant\LoginController::class,'loginForm'])->name('login.form');
    Route::post('/login',[\App\Http\Controllers\Restaurant\LoginController::class,'login'])->name('restaurant.login');
});

Route::group(['prefix'=>'restaurant','middleware'=>'restaurant'],function () {

    Route::get('/',[\App\Http\Controllers\Restaurant\DashboardController::class,'restaurant'])->name('restaurant');

    Route::get('/profile/{id}',[\App\Http\Controllers\Restaurant\Profile\ProfileController::class,'profile'])->name('restaurant.profile');
    Route::post('/profile-update/{id}',[\App\Http\Controllers\Restaurant\Profile\ProfileController::class,'profileUpdate'])->name('profile.update');

});
