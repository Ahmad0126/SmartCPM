<?php

use App\Http\Controllers\Auth;
use App\Livewire\Dashboard;
use App\Livewire\KategoriKeluhanView;
use App\Livewire\KeluhanView;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function(){
    Route::get('/login', function(){
        return view('login');
    })->name('login');
    Route::post('/login', [Auth::class, 'login']);
    Route::post('/logout', [Auth::class, 'logout'])->name('logout');
});

Route::middleware('auth')->group(function(){
    Route::get('/', Dashboard::class);
    Route::get('/kategorikeluhan', KategoriKeluhanView::class)->name('kategorikeluhan');
    Route::get('/keluhan', KeluhanView::class)->name('keluhan');
});
