<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }

    public function companias()
    {
        return $this->belongsToMany(Compania::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
