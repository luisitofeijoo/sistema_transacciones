<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\DataTables;

class ExpedienteController extends Controller
{


    public function index() {
        $expedientes = Expediente::with('tipoDocumento')->latest()->get();
        return $expedientes;
    }

    /*
     * Guardamos el expediente ingresado por mesa de partes
     * */
    public function create(Request $request) {
        try {

            $expediente = new Expediente([
                'tipo_persona' => $request->input('tipoPersona'),
                'nro_documento' => $request->input('nroDocumento'),
                'nombre_razonsocial' => $request->input('nombre_razon_social'),
                'direccion' => $request->input('direccion'),
                'celular' => $request->input('celular'),
                'email' => $request->input('email'),
                'asunto' => $request->input('asunto'),
                'descripcion' => $request->input('descripcion'),
                'folio' => $request->input('folio'),
                'url_drive' => $request->input('url_drive'),

                'tipo_documento_id' => $request->input('tipoDocumento')
            ]);

            if ($request->hasFile('archivo')) {
                $archivo = $request->file('archivo');
                $nombreArchivo = Str::uuid() . '.' . $archivo->getClientOriginalExtension();
                $archivo->move(public_path('expedientes/file'), $nombreArchivo);
                $expediente->archivo = $nombreArchivo;

            }
            $expediente->save();

            $expediente->codigo = $expediente->getKey() + 600000;

            $expediente->save();

            $mensaje = 'El registro se realizó exitosamente.';
            return response()->json(['success' => true, 'message' => $mensaje, 'codigo' => $expediente->codigo]);
        } catch (\Exception $e) {
            $mensaje = 'Ocurrió un error al guardar el registro.';
            return response()->json(['success' => false, 'message' => $mensaje]);
        }
    }
}
