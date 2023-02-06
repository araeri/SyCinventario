<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material;
use App\Models\Inventario;
use Faker\Factory as Faker;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $inv_id = Inventario::where('tipoinventario','=','Material')->pluck('idinventario');
        foreach($inv_id as $idfk){
            Material::insert([
                'idinventariofk' => $idfk,
                'cantidadmaterial' => $faker->numberBetween($min = 0, $max = 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}