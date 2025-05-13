<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeriaController;
use App\Http\Controllers\EmprendedorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/ferias/gestionar', [FeriaController::class, 'gestionar'])->name('ferias.gestionar');
    Route::get('/ferias/{feria}/asignar', [FeriaController::class, 'asignar'])->name('ferias.asignar');
    Route::post('/ferias/{feria}/vincular', [FeriaController::class, 'vincularEmprendedor'])->name('ferias.vincular');
    Route::delete('/ferias/{feria}/desvincular/{emprendedor_id}', [FeriaController::class, 'desvincularEmprendedor'])->name('ferias.desvincular');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('ferias', FeriaController::class);
Route::resource('emprendedores', EmprendedorController::class)->parameters([
    'emprendedores' => 'emprendedor',
]);

require __DIR__.'/auth.php';