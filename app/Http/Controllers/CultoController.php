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

        if ($request['pico_cedula'] == 'Par') {
            return DB::select(
                'SELECT * FROM hermanos WHERE MOD(`identificacion`, 2) = 0 AND ((SELECT COUNT(*) from asistencia) = 0 OR id <> (SELECT hermano_id FROM `asistencia` WHERE culto_id = '.$request["id"].'))'
            );
        } else {
            return DB::select(
                'SELECT * FROM hermanos WHERE MOD(`identificacion`, 2) = 1 AND ((SELECT COUNT(*) from asistencia) = 0 OR id <> (SELECT hermano_id FROM `asistencia` WHERE culto_id = '.$request["id"].'))'
            );
        }
    }

    public function cargar_asistentes(Request $request) {
        return Asistencia::where('culto_id', $request['culto_id'])->whereNull('temperatura')->with('hermano')->get();
    }

    public function agregar_asistencia(Request $request) {
        $pico_cedula = $request['pico_cedula'];
        unset($request['pico_cedula']);
        if (Asistencia::create($request->all())->save()) {
            return ['id' => $request['culto_id'], 'pico_cedula' => $pico_cedula];
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
