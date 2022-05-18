<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;

// Desde el RouteServiceProv se le asigna el prefijo admin al nombre de la ruta
Route::get('', [HomeController::class, 'index']);