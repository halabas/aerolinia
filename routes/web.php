<?php

use App\Http\Controllers\BilleteController;
use App\Http\Controllers\VueloController;
use App\Models\Vuelo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('vuelos',VueloController::class);
Route::resource('billetes',BilleteController::class);

Route::get('billetes/reservar/{id}',[BilleteController::class,'reservar'])->name('billetes.reservar');

Route::get('ordenar/{campo?}', function($campo) {
    if($campo == 'aeropuerto_salida'){
        $vuelos = Vuelo::with('aeropuerto_salida')->join('aeropuertos', 'vuelos.aeropuerto_salida_id', '=', 'aeropuertos.id')->orderBy('aeropuertos.codigo')->paginate(6);
    }
    elseif($campo == 'aeropuerto_llegada'){
        $vuelos = Vuelo::with('aeropuerto_llegada')->join('aeropuertos', 'vuelos.aeropuerto_llegada_id', '=', 'aeropuertos.id')->orderBy('aeropuertos.codigo')->paginate(6);
    }

    else{
        $vuelos = Vuelo::orderBy($campo)->paginate(6);
    }

   return view('vuelos.index', ['vuelos' => $vuelos]);
});

require __DIR__.'/auth.php';
