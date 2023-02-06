<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Equipo;
use App\Models\Inventario;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inv_id = Inventario::where('tipoinventario','=','Equipo')->pluck('idinventario');
        foreach($inv_id as $idfk){
            Equipo::insert([
                'idinventariofk' => $idfk,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

    }
}
