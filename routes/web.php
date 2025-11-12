<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestPersilController;
use Illuminate\Support\Facades\Route;

// Guest Routes - Default homepage and CRUD operations
Route::get('/', [GuestPersilController::class, 'index'])->name('guest.persil.index');
Route::prefix('guest/persil')->name('guest.persil.')->group(function () {
    Route::get('/create', [GuestPersilController::class, 'create'])->name('create');
    Route::post('/', [GuestPersilController::class, 'store'])->name('store');
    Route::get('/{id}', [GuestPersilController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [GuestPersilController::class, 'edit'])->name('edit');
    Route::put('/{id}', [GuestPersilController::class, 'update'])->name('update');
    Route::delete('/{id}', [GuestPersilController::class, 'destroy'])->name('destroy');
});

// Convenience redirect so /persil maps to admin resource
Route::redirect('/persil', '/admin/persil');

// Admin resource routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('persil', \App\Http\Controllers\PersilController::class);
    Route::resource('dokumen-persil', \App\Http\Controllers\DokumenPersilController::class);
    Route::resource('peta-persil', \App\Http\Controllers\PetaPersilController::class);
    Route::resource('sengketa-persil', \App\Http\Controllers\SengketaPersilController::class);
    Route::resource('jenis-penggunaan', \App\Http\Controllers\JenisPenggunaanController::class);
});

Route::get('/ketua', function () {
    return view('ketua');
});
Route::get('/anggota', function () {
    return view('anggota');
});

Route::get('/anggota2', function () {
    return view('anggota2');
});

Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
Route::resource('products', \App\Http\Controllers\ProductController::class);
