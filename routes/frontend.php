<?php


Route::get('/', [\App\Http\Controllers\Frontend\Home\HomeController::class,'home'])->name('home');
