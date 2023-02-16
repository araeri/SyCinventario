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
            $table->id('idmovimiento');
            $table->string('codmovimiento');

            $table->string('entregamovimiento');
            $table->string('recepcionmovimiento');
            $table->text('razonmovimiento');
            $table->string('tipomovimiento');
            
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
