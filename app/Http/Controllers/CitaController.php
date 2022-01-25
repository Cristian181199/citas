<?php

namespace App\Http\Controllers;

use App\Models\Cita;
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

        ]);
    }

    public function destroy(Cita $id)
    {
        $id->delete();
        return redirect(route('ver-citas'))->with('success', 'Cita anulada con exito.');
    }
}
