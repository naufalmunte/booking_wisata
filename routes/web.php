<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaufalPaketWisataController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/paket-wisata', [NaufalPaketWisataController::class, 'index']);
