<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fruta;
use Carbon\Carbon;

class FrutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fruta::create([
            'nombre' => 'Naranja',
            'color' => 'Naranja',
            'fecha_cosecha' => Carbon::now()->subDays(1)->format('Y-m-d'),
            'fecha_caducidad' => Carbon::now()->addDays(6)->format('Y-m-d'), // 7 días desde cosecha
            'categoria_id' => 1
        ]);

        Fruta::create([
            'nombre' => 'Piña',
            'color' => 'Amarillo',
            'fecha_cosecha' => Carbon::now()->format('Y-m-d'),
            'fecha_caducidad' => Carbon::now()->addDays(7)->format('Y-m-d'),
            'categoria_id' => 2
        ]);
    }
}

