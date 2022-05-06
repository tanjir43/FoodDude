<?php
Route::group(['prefix'=>'restaurant'],function (){
    //Restaurant login
    Route::get('/login',[\App\Http\Controllers\Restaurant\LoginController::class,'loginForm'])->name('login.form');
    Route::post('/login',[\App\Http\Controllers\Restaurant\LoginController::class,'login'])->name('restaurant.login');

    //Restaurant register
    Route::get('/register',[\App\Http\Controllers\Restaurant\LoginController::class,'registerForm'])->name('register.form');
    Route::post('/register',[\App\Http\Controllers\Restaurant\LoginController::class,'register'])->name('restaurant.register');

});

Route::group(['prefix'=>'restaurant','middleware'=>'restaurant'],function () {

    Route::get('/',[\App\Http\Controllers\Restaurant\DashboardController::class,'restaurant'])->name('restaurant');

    Route::get('/profile/{id}',[\App\Http\Controllers\Restaurant\Profile\ProfileController::class,'profile'])->name('restaurant.profile');
    Route::post('/profile-update/{id}',[\App\Http\Controllers\Restaurant\Profile\ProfileController::class,'profileUpdate'])->name('profile.update');

    //Menu section
    Route::resource('/menu',\App\Http\Controllers\Restaurant\MenuController::class);
    Route::post('menu_status',[\App\Http\Controllers\Restaurant\MenuController::class,'menuStatus'])->name('menu.status');

    //Verity section
    Route::resource('/verity',\App\Http\Controllers\Restaurant\VariationController::class);
    Route::post('verity_status',[\App\Http\Controllers\Restaurant\VariationController::class,'verityStatus'])->name('verity.status');

    //Food section
    Route::resource('/food',\App\Http\Controllers\Restaurant\FoodController::class);
//    Route::get('/food.all/',[\App\Http\Controllers\Restaurant\FoodController::class,'foodAll'])->name('food.all');
    Route::post('food_status',[\App\Http\Controllers\Restaurant\FoodController::class,'foodStatus'])->name('food.status');

    //Photo section
    Route::resource('/photo',\App\Http\Controllers\Restaurant\PhotoController::class);
    Route::post('photo_status',[\App\Http\Controllers\Restaurant\PhotoController::class,'photoStatus'])->name('photo.status');

});

