<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventarisController;

Route::get('/', [InventarisController::class, 'index'])->name('inventaris.index');
Route::get('/create', [InventarisController::class, 'create'])->name('inventaris.create');
Route::post('/store', [InventarisController::class, 'store'])->name('inventaris.store');
Route::get('/edit/{id}', [InventarisController::class, 'edit'])->name('inventaris.edit');
Route::put('/update/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/{inventaris}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

