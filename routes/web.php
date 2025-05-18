<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Route::middleware('auth', 'verified')->group(function () {
    //Clientes
    Route::get('/clientes', \App\Livewire\Clientes\ClientesIndex::class)->name('clientes.index');

    //Productos
    Route::get('/productos', \App\Livewire\Productos\ProductosIndex::class)->name('productos.index');
    Route::get('/productos/crear', \App\Livewire\Productos\CrearProductos::class)->name('productos.crear');
    Route::get('/productos/editar/{producto}', \App\Livewire\Productos\EditarProductos::class)->name('productos.editar');

    //Facturas
    Route::get('/facturas', \App\Livewire\Facturas\FacturasIndex::class)->name('facturas.index');
    Route::get('/facturas/crear', \App\Livewire\Facturas\CrearFacturas::class)->name('facturas.crear');
    Route::get('/facturas/editar/{factura}', \App\Livewire\Facturas\EditarFacturas::class)->name('facturas.editar');

    //Detalles Factura
    Route::get('/detalles-factura', \App\Livewire\DetalleFacturas\DetalleFacturasIndex::class)->name('detalles-factura.index');
    Route::get('/detalles-factura/crear', \App\Livewire\DetalleFacturas\CrearDetalleFacturas::class)->name('detalles-factura.crear');
    Route::get('/detalles-factura/editar/{id}', \App\Livewire\DetalleFacturas\EditarDetalleFacturas::class)->name('detalles-factura.editar');
});

require __DIR__.'/auth.php';
