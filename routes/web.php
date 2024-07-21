<?php

use App\Models\Prestamo;
use App\Models\Bien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\BienController;
use App\Http\Controllers\MesaVirtualController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AuthController;
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

Route::get('reporte/pdf-fotocheck', [PersonaController::class, 'reporte']);
Route::get('reporte/salida', [BienController::class, 'reporte_salida']);

Route::get('reporte/salida-bienes-estudiantes', [BienController::class, 'PDF_rpt_salida_bienes_estudiantes']);

//Reporte PDF
Route::get('rpt/pdf/bienes', [BienController::class, 'rpt_pdf']);
Route::get('rpt/pdf/barcode', [BienController::class, 'rpt_barcode']);
Route::get('doc/ficha-asignacion/{dni}', function ($dni) {

    $persona = \App\Models\Persona::where('nro_documento', $dni)->first();

    $prestamos = Prestamo::join('bienes', 'prestamos.bien_id', '=', 'bienes.id')
        ->where('prestamos.persona_id', $persona->id)
        ->where('prestamos.activo', true)
        ->select('prestamos.id as prestamo_id', 'bienes.*', 'prestamos.*')
        ->get();


    $pdf = Pdf::loadHTML(view('reportes.pdf_asignacion', compact('persona', 'prestamos')))
        ->setPaper('A4', 'portrait');
    return $pdf->stream();
});


Route::get('rpt/pdf/papeleta-salida', function () {
    $HTML = PDF::loadHTML(view('reportes.pdf_papeleta_salida'))
        ->setPaper('A4', 'portrait');

    return $HTML->stream();
});

/*Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
   // Route::get('auth/google/callback', 'handleGoogleCallback');
});*/



Route::view('/{patch}', 'home')
    ->where('patch', '.*');
