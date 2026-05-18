<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::get('/products', [ProdutoController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProdutoController::class, 'create'])->name('products.create');
Route::get('/products/{id}/edit', [ProdutoController::class, 'edit'])->name('products.edit');
Route::post('/products', [ProdutoController::class, 'store'])->name('products.store');

Route::resource('vendas', VendaController::class);