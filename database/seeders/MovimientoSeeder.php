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
        $faker = Faker::create();
        $inv_rand = rand(1,6);
        $res_id = Responsable::pluck('idresponsable');
        
        foreach($res_id as $idresfk){
            $inv_id = Inventario::pluck('idinventario')->toArray();
            for($i = 0; $i< $inv_rand; $i++)
                $pick_rand = array_rand($inv_id);
                $rand_id = $inv_id[$pick_rand];
                Movimiento::insert([
                    'idresponsablefk' => $idresfk,
                    'idinventariofk' => $rand_id,
                    'tipomovimiento' => $faker->randomElement($array = array ('Entrada', 'Salida')), 
                    'seleccioninventario' => $faker->name,
                    'fechamovimiento'=> now(),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                unset($inv_id[$rand_id]);
            $inv_rand = rand(1,6);
        }
    }
}
