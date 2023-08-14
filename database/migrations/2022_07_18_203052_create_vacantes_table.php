<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('portada')->nullable();
            $table->string('titulo');
            $table->string('subtitulo')->nullable() ;
            $table->text('oferta');
            $table->text('requisitos');
            $table->string('vacantesdisp');
            $table->string('salario');
            $table->boolean('inicio')->default(0);
            $table->boolean('activo')->default(1);
            $table->integer('orden')->default(666);
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
        Schema::dropIfExists('vacantes');
    }
}
