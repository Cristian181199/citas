<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Compania;
use App\Models\Especialidad;
use App\Models\Especialista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CitaController extends Controller
{
    //

    public function index()
    {

        return view('citas.index', [
            'citas' => Auth::user()->citas,
        ]);
    }

    public function create()
    {
        return view('citas.create', [
            'companias' => Compania::all(),
            'companias_usuario' => Auth::user()->companias,
        ]);
    }

    public function createEspecialidad(Compania $compania)
    {
        return view('citas.create-especialidad', [
            'compania' => $compania,
            'especialidades' => Especialidad::all(),
        ]);
    }

    public function createEspecialista(Compania $compania, Especialidad $especialidad)
    {
        /*$especialistasmio = DB::table('compania_especialista')
                             ->join('especialistas', 'compania_especialista.especialista_id', '=', 'especialistas.id')
                             ->join('especialidades', 'especialistas.especialidad_id', '=', 'especialidades.id')
                             ->where('compania_especialista.compania_id', '=', $compania->id)
                             ->where('especialidades.id', '=', $especialidad->id)
                             ->select('compania_especialista.especialista_id as id', 'especialistas.nombre as nombre')->get();*/

        $especialistas = Especialista::whereHas('especialidad', function ($query) use($especialidad) {
            $query->where('especialidad_id', $especialidad->id);
        })->whereHas('companias', function ($query) use ($compania) {
            $query->where('compania_id', $compania->id);
        })->get();

        return view('citas.create-especialista', [
            'compania' => $compania,
            'especialidad' => $especialidad,
            'especialistas' => $especialistas
        ]);
    }

    public function createFechaHora(Compania $compania, Especialidad $especialidad, Especialista $especialista)
    {

        abort_unless($especialista->companias->contains($compania), 404);

        return view('citas.create-fecha-hora', [
            'compania' => $compania,
            'especialidad' => $especialidad,
            'especialista' => $especialista,
            'citas' => $especialista->citas()->where('user_id', null)->get(),
        ]);
    }

    public function createConfirmar(Compania $compania, Cita $cita)
    {

        return view('citas.create-confirmar', [
            'compania' => $compania,
            'cita' => $cita,
            'usuario' => Auth::user(),
        ]);
    }

    public function guardarCita(Compania $compania, Cita $cita)
    {

        $cita->user_id = Auth::user()->id;
        $cita->compania_id = $compania->id;
        $cita->save();

        return redirect(route('ver-citas'))->with('success', 'Cita confirmada con exito');

    }

    public function destroy(Cita $cita)
    {
        $cita->user_id = null;
        $cita->save();
        return redirect(route('ver-citas'))->with('success', 'Cita anulada con exito.');
    }

}
