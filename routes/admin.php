<?php

Route::group(['prefix'=>'admin'],function (){
    Route::get('/login',[\App\Http\Controllers\Admin\LoginController::class,'showLoginForm'])->name('admin.login.form');
    Route::post('/login',[\App\Http\Controllers\Admin\LoginController::class,'login'])->name('admin.login');
});

Route::group(['prefix'=>'admin','middleware'=>'admin'],function () {

    Route::get('/',[\App\Http\Controllers\Admin\DashboardController::class,'admin'])->name('admin');

    Route::get('/profile/{id}',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'profile'])->name('admin.profile');
    Route::post('/profile-update/{id}',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'profileUpdate'])->name('profile.update');

    Route::get('new-user-role',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'adminRole'])->name('admin.add_role');
    Route::post('new-user-role',[\App\Http\Controllers\Admin\Profile\ProfileController::class,'adminCreateRole'])->name('admin.add_user_role');

    //banner - section
    Route::resource('banner',\App\Http\Controllers\Admin\BannerController::class);

});
Route::group(['prefix' => 'filemanager', 'middleware' => ['web']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


