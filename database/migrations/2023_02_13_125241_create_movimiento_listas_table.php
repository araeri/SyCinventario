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
        Schema::create('movimientolistas', function (Blueprint $table) {
            $table->id('idlista');
            $table->string('codinventario');
            $table->string('nombreinventario');
            $table->string('fotoinventario');
            $table->string('tipoinventario');
            $table->unsignedBigInteger('idmovimientofk');
            $table->foreign('idmovimientofk')->references('idmovimiento')->on('movimientos')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('movimientolistas');
    }
};
