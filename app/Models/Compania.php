<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compania extends Model
{
    use HasFactory;

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function especialistas()
    {
        return $this->belongsToMany(Especialista::class);
    }
}
