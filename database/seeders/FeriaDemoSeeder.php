<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feria;
use App\Models\Emprendedor;

class FeriaDemoSeeder extends Seeder
{
    public function run(): void
    {
        $emprendedores = Emprendedor::factory(10)->create();

        Feria::factory(5)->create()->each(function ($feria) use ($emprendedores) {
            $feria->emprendedores()->attach(
                $emprendedores->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
