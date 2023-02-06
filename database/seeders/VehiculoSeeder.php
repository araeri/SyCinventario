<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;
use App\Models\Inventario;
use Faker\Factory as Faker;

class VehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $inv_id = Inventario::where('tipoinventario','=','Vehículo')->pluck('idinventario');
        foreach($inv_id as $idfk){
            Vehiculo::insert([
                'idinventariofk' => $idfk,
                'tipovehiculo' => $faker->randomElement($array = array ('Ligero', 'Pesado')),
                'patentevehiculo' => $faker->regexify('[A-Z]{2}[0-9]{4}'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
