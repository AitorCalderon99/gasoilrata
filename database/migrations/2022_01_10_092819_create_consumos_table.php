<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsumosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consumos', function (Blueprint $table) {
            $table->increments('id_consumo');
            $table->double('kilometros');
            $table->double('litros');
            $table->double('coste_litro');
            $table->string('origen');
            $table->double('destino');
            $table->date('fecha');
            $table->string('carburante');
            $table->unsignedInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id_vehiculo')
                ->on('vehiculos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consumos');
    }
}
