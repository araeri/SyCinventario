<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Herramienta;
use App\Models\Inventario;

class HerramientaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inv_id = Inventario::where('tipoinventario','=','Herramienta')->pluck('idinventario');
        foreach($inv_id as $idfk){
            Herramienta::insert([
                'idinventariofk' => $idfk,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
