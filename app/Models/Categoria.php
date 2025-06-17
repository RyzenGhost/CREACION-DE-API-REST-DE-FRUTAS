<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    // Una categoría tiene muchas frutas
    public function frutas()
    {
        return $this->hasMany(Fruta::class);
    }
}
