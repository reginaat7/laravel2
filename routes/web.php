<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DapurSPPGController;
use App\Http\Controllers\SekolahController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rpl', function () {
    return view('tampil');
});

Route::resource('dapur', DapurSPPGController::class);
Route::resource('sekolah', SekolahController::class);