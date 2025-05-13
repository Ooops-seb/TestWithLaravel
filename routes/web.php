<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('clientes', 'clientes')
    ->middleware(['auth', 'verified'])
    ->name('clientes');

Route::view('productos', 'productos')
    ->middleware(['auth', 'verified'])
    ->name('productos');

Route::view('facturas', 'facturas')
    ->middleware(['auth', 'verified'])
    ->name('facturas');

Route::view('factura_detalles', 'factura_detalles')
    ->middleware(['auth', 'verified'])
    ->name('factura_detalles');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
