<?php

Route::group(['prefix'=>'admin'],function (){
    Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {
    Route::get('/profile',[\App\Http\Controllers\Admin\DashboardController::class,'profile'])->name('admin.profile');
    Route::post('profile-update/{id}',[\App\Http\Controllers\Admin\DashboardController::class,'profileUpdate'])->name('profile.update');
    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'admin'])->name('admin');


});
Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


