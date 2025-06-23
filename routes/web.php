<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaufalPaketWisataController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/wisata', [NaufalPaketWisataController::class, 'index']);


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');