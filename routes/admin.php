<?php

Route::group(['prefix'=>'admin'],function (){
    Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {
    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'admin'])->name('admin');

});
