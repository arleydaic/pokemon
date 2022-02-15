<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\sendController;

use App\Http\Controllers\searchController;

use App\Http\Controllers\listController;

Route::get('/', function () {
  
    return view('init');
});

Route::post('/search', [searchController::class,'index'])->name('searchindex');

Route::get('/list', [listController::class,'index']);

Route::get('/search',function(){
    return view('search');
});


