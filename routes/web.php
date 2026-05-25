<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('home');

Route::resource('produtos', ProdutoController::class);


Route::resource('vendas', VendaController::class);