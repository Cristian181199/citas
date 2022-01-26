<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Compania;
use App\Models\Especialidad;
use App\Models\Especialista;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    //

    public function index()
    {
        $citas = Auth::user()->citas;

        return view('citas.index', [
            'citas' => $citas,
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
        return view('citas.create-especialista', [
            'compania' => $compania,
            'especialidad' => $especialidad,
            'especialistas' => $especialidad->especialistas,
        ]);
    }

    public function createFechaHora(Compania $compania, Especialidad $especialidad, Especialista $especialista)
    {
        return view('citas.create-fecha-hora', [
            'compania' => $compania,
            'especialidad' => $especialidad,
            'especialista' => $especialista,
            'citas' => $especialista->citas()->where('user_id', null)->get(),
        ]);
    }

    public function destroy(Cita $cita)
    {
        $cita->user_id = null;
        $cita->save();
        return redirect(route('ver-citas'))->with('success', 'Cita anulada con exito.');
    }
}
