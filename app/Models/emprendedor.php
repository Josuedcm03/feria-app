<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Emprendedor extends Model
{
    Use HasFactory;

    protected $fillable = ['nombre', 'telefono', 'rubro'];

    public function ferias()
    {
        return $this->belongsToMany(Feria::class);
    }
}
