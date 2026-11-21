<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\HistorialController;

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

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/historial', [HistorialController::class, 'historial'])->name('historial');

Route::get('medicos', [MedicoController::class, 'index'])->name('medico.index');
Route::get('medico/create',[MedicoController::class,'create'])->name('medico.create');
Route::post('medico', [MedicoController::class, 'store'])->name('medico.store');
Route::get('medico/{medico}', [MedicoController::class, 'show'])->name('medico.show');
Route::get('medico/{medico}/editar',[MedicoController::class,'edit'])->name('medico.edit');
Route::put('medico/{medico}', [MedicoController::class, 'update'])->name('medico.update');
Route::delete('medico/{medico}', [MedicoController::class, 'destroy'])->name('medico.destroy');

Route::get('pacientes', [PacienteController::class, 'index'])->name('paciente.index');
Route::get('paciente/create',[PacienteController::class,'create'])->name('paciente.create');
Route::post('paciente', [PacienteController::class, 'store'])->name('paciente.store');
Route::get('paciente/{paciente}', [PacienteController::class, 'show'])->name('paciente.show');
Route::get('paciente/{paciente}/editar',[PacienteController::class,'edit'])->name('paciente.edit');
Route::put('paciente/{paciente}', [PacienteController::class, 'update'])->name('paciente.update');
Route::delete('paciente/{paciente}', [PacienteController::class, 'destroy'])->name('paciente.destroy');

Route::get('ingresos', [IngresoController::class, 'index'])->name('ingreso.index');
Route::get('ingreso/create',[IngresoController::class,'create'])->name('ingreso.create');
Route::post('ingreso', [IngresoController::class, 'store'])->name('ingreso.store');
Route::get('ingreso/{ingreso}', [IngresoController::class, 'show'])->name('ingreso.show');
Route::get('ingreso/{ingreso}/editar',[IngresoController::class,'edit'])->name('ingreso.edit');
Route::put('ingreso/{ingreso}', [IngresoController::class, 'update'])->name('ingreso.update');
Route::delete('ingreso/{ingreso}', [IngresoController::class, 'destroy'])->name('ingreso.destroy');