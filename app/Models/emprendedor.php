<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class Emprendedor extends Model
{
    Use HasFactory;

    // Indica explícitamente la tabla
    protected $table = 'emprendedores';

    // Asegúrate también de declarar los campos asignables
    protected $fillable = [
        'nombre',
        'telefono',
        'rubro',
    ];
    // Relación con la tabla ferias
    public function ferias()
    {
        return $this->belongsToMany(Feria::class, 'feria_emprendedor');
    }
}
