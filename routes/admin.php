<?php

Route::group(['prefix'=>'admin'],function (){
    Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {

    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'admin'])->name('admin');

    Route::get('/profile/{id}',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'profile'])->name('admin.profile');
    Route::post('/profile-update/{id}',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'profileUpdate'])->name('profile.update');
    Route::get('/profile-update-password',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'passwordUp'])->name('password.up');
    Route::post('/profile-update-password',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'passwordUpdate'])->name('password.update');
});
Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


