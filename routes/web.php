<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/data-diri', [PortfolioController::class, 'about'])->name('about');
Route::get('/gallery', [PortfolioController::class, 'gallery'])->name('gallery');
