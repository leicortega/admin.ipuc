<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Models\Hermano;
use App\Models\Culto;
use Carbon\Carbon;

class CultoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function programados() {
        $cultos = Culto::whereNull('ofrenda')->orderBy('fecha', 'desc')->get();

        return view('cultos.index', ['cultos' => $cultos]);
    }

    public function realizados() {
        $cultos = Culto::whereNotNull('ofrenda')->orderBy('fecha', 'desc')->get();

        return view('cultos.index', ['cultos' => $cultos]);
    }

    public function create(Request $request) {
        $fecha = Carbon::parse($request['fecha'])->format('Y-m-d');

        $culto = Culto::create([
            'fecha' => $fecha, 
            'hora' => $request['hora'], 
            'titulo' => $request['titulo'], 
            'dirigido' => $request['dirigido'], 
            'url' => $request['url'], 
            'pico_cedula' => $request['pico_cedula']
        ]);

        if ($culto->save()) {
            return redirect()->route('cultos-programados')->with(['creado' => 1]);
        }

        return redirect()->route('cultos-programados')->with(['creado' => 0]);
    }

    public function cargar_asistencia(Request $request) {

        dd(
            DB::select('SELECT * FROM hermanos, asistencia WHERE MOD(hermanos.identificacion, 2) = 1 AND (hermanos.id <> asistencia.hermano_id AND asistencia.culto_id = '.$request["id"].')')
        );

        if ($request['pico_cedula'] == 'Par') {
            return DB::select('SELECT * FROM `hermanos` WHERE MOD(`identificacion`, 2) = 0');
        } else {
            return DB::select('SELECT * FROM `hermanos` WHERE MOD(`identificacion`, 2) = 1');
        }
    }

    public function cargar_asistentes(Request $request) {
        return Asistencia::where('culto_id', $request['culto_id'])->whereNull('temperatura')->with('hermano')->get();
    }

    public function agregar_asistencia(Request $request) {
        if (Asistencia::create($request->all())->save()) {
            return $request['culto_id'];
        }

        return 0;
    }

    public function eliminar_asistencia(Request $request) {
        return Asistencia::find($request['id'])->delete() ? $request['culto_id'] : 'Error al eliminar asistencia';
    }

    public function confirmar_asistencia(Request $request) {
        Asistencia::find($request['asistencia_id'])
            ->update([
                'temperatura' => $request['temperatura'],
                'sintomas' => $request['sintomas'],
                'contacto_personas_infectadas' => $request['contacto_personas_infectadas'],
            ]);
        
        return $request['culto_id_asistencia'];
    }

    public function confirmar_realizado(Request $request) {
        $culto = Culto::find($request['culto_id_realizado']);

        $culto->update([
            'ofrenda' => $request['ofrenda']
        ]);

        return redirect()->route('cultos-realizados')->with(['realizado' => 1]);
    }
}
