<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Inventario;
use App\Models\Movimiento;
use App\Models\Responsable;
use Faker\Factory as Faker;

class MovimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movimiento::factory()->count(20)->create();
    }
}
