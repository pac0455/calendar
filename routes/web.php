<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TipoEventoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();
Route::middleware(['auth'])->group(function (){
    Route::resource('user', UserController::class);
    Route::resource('calendar', CalendarController::class);
    Route::resource('tipo_evento', TipoEventoController::class);
});
