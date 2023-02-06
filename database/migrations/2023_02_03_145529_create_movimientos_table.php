<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            
            $table->unsignedBigInteger('idinventariofk');
            $table->unsignedBigInteger('idresponsablefk');
            $table->primary(['idresponsablefk','idinventariofk']);
            $table->foreign('idinventariofk')->references('idinventario')->on('inventarios');
            $table->foreign('idresponsablefk')->references('idresponsable')->on('responsables');
            
            $table->string('tipomovimiento');
            $table->string('seleccioninventario');
            $table->date('fechamovimiento');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
};
