<?php

namespace Database\Seeders;

use App\Models\MovimientoLista;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovimientoListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovimientoLista::factory()->count(20)->create();
    }
}
