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
            $table->string('tipomovimiento');
            $table->primary(['idresponsablefk','idinventariofk', 'tipomovmimiento']);
            $table->foreign('idinventariofk')->references('idinventario')->on('inventarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('idresponsablefk')->references('idresponsable')->on('responsables')->onUpdate('cascade')->onDelete('cascade');
            
            
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
