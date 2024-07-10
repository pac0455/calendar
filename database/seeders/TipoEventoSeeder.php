<?php

namespace Database\Seeders;

use App\Models\TipoEvento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoEvento::create([
                'nombre' => 'DAFAULT',
                'fondo' => '##ffffff',
                'border' => '#ffffff',
                'texto' => '#000000'
            ]);
    }
}
