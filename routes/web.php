<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaufalPaketWisataController;
use App\Http\Controllers\NaufalPenggunaController;
use App\Http\Controllers\NaufalBookingController;
use App\Http\Controllers\NaufalGuideController;
use App\Http\Controllers\NaufalReviewPelangganController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\RoleAdmin;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/wisata', [NaufalPaketWisataController::class, 'index'])->name('wisata.index');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/wisata/create', [NaufalPaketWisataController::class, 'create'])->name('wisata.create')->middleware('auth', RoleAdmin::class);
Route::post('/wisata', [NaufalPaketWisataController::class, 'store'])->name('wisata.store')->middleware('auth', RoleAdmin::class);
Route::get('/wisata/detail/{id}', [NaufalPaketWisataController::class, 'detail'])->name('wisata.detail');
Route::get('/admin/wisata/{id}/edit', [NaufalPaketWisataController::class, 'edit'])->name('admin.wisata.edit')->middleware('auth', RoleAdmin::class);
Route::put('/admin/wisata/{id}', [NaufalPaketWisataController::class, 'update'])->name('admin.wisata.update')->middleware('auth', RoleAdmin::class);
Route::delete('/admin/wisata/{id}', [NaufalPaketWisataController::class, 'destroy'])->name('admin.wisata.destroy')->middleware('auth', RoleAdmin::class);
Route::get('/admin/bookings', [NaufalBookingController::class, 'adminIndex'])->middleware(['auth', RoleAdmin::class])->name('admin.bookings.index');
Route::post('/admin/bookings/{id}/status/{status}', [NaufalBookingController::class, 'updateStatus'])->name('booking.updateStatus');

Route::get('/admin/guides', [NaufalGuideController::class, 'index'])->name('admin.guides.index')->middleware(['auth', RoleAdmin::class]);
Route::get('/admin/guides/create', [NaufalGuideController::class, 'create'])->name('admin.guides.create')->middleware(['auth', RoleAdmin::class]);
Route::post('/admin/guides', [NaufalGuideController::class, 'store'])->name('admin.guides.store')->middleware(['auth', RoleAdmin::class]);
Route::get('/admin/guides/{id}/edit', [NaufalGuideController::class, 'edit'])->name('admin.guides.edit')->middleware(['auth', RoleAdmin::class]);
Route::put('/admin/guides/{id}', [NaufalGuideController::class, 'update'])->name('admin.guides.update')->middleware(['auth', RoleAdmin::class]);
Route::delete('/admin/guides/{id}', [NaufalGuideController::class, 'destroy'])->name('admin.guides.destroy')->middleware(['auth', RoleAdmin::class  ]);



Route::get('/admin/listwisata', [NaufalPaketWisataController::class, 'showList'])->name('admin.list.wisata');

Route::get('/daftar', [NaufalPenggunaController::class, 'showFormDaftar'])->name('pengguna.daftar.form');
Route::post('/daftar', [NaufalPenggunaController::class, 'prosesDaftar'])->name('pengguna.daftar');

Route::middleware('auth')->group(function () {
    Route::get('/booking/{paket_id}', [NaufalBookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [NaufalBookingController::class, 'store'])->name('booking.store');
    Route::get('/booking-saya', [NaufalBookingController::class, 'index'])->name('booking.user');
});

Route::get('/guide', [NaufalGuideController::class, 'daftarGuide'])->name('guide.list')->middleware('auth');

Route::get('/review/{booking_id}', [NaufalReviewPelangganController::class, 'create'])->name('review.create')->middleware('auth');
Route::post('/review', [NaufalReviewPelangganController::class, 'store'])->name('review.store')->middleware('auth');
Route::get('/review', [NaufalReviewPelangganController::class, 'index'])->name('review.index');

