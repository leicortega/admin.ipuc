<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hermano;
use Carbon\Carbon;

class HermanoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $hermanos = Hermano::all();

        return view('hermanos.index', ['hermanos' => $hermanos]);
    }

    public function create(Request $request) {
        $fecha = Carbon::parse($request['fecha_nacimiento'])->format('Y-m-d');

        $hermano = Hermano::create([
            'identificacion' => $request['identificacion'], 
            'nombre' => $request['nombre'], 
            'telefono' => $request['telefono'], 
            'direccion' => $request['direccion'], 
            'fecha_nacimiento' => $fecha, 
            'tipo' => $request['tipo'], 
            'bautizado' => $request['bautizado'],
        ]);

        if ($hermano->save()) {
            return redirect()->route('hermanos')->with(['creado' => 1]);
        }

        return redirect()->route('hermanos')->with(['creado' => 0]);
    }
}
