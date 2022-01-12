<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepostajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repostajes', function (Blueprint $table) {
            $table->increments('id_repostaje');
            $table->string('combustible', 30);
            $table->date('fecha');
            $table->string('gasolinera');
            $table->double('litros');
            $table->double('precio_litro');
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
        Schema::dropIfExists('repostajes');
    }
}
