<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSGaleriaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_galeria_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('producto')->nullable();
            $table->text('imagen')->nullable();
            $table->foreign('producto')->references('id')->on('s_productos')->onDelete('cascade');
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
        Schema::dropIfExists('s_galeria_productos');
    }
}
