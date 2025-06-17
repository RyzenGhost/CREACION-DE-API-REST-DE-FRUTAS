<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fruta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'color',
        'fecha_cosecha',
        'fecha_caducidad',
        'categoria_id',
    ];

    // Una fruta pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Mutator para calcular automáticamente fecha_caducidad cuando se asigna fecha_cosecha
    public function setFechaCosechaAttribute($value)
    {
        $this->attributes['fecha_cosecha'] = $value;

        // Calcular fecha_caducidad = fecha_cosecha + 7 días
        $this->attributes['fecha_caducidad'] = date('Y-m-d', strtotime($value . ' +7 days'));
    }
}


