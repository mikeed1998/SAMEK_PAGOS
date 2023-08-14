<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('subcategoria');
            $table->string('nombre')->nullable();
            $table->double('precio', 6, 4)->nullable();
            $table->integer('cantidad')->nullable();
            $table->text('descripcion')->nullable();
            $table->foreign('subcategoria')->references('id')->on('s_subcategorias')->onDelete('cascade');
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
        Schema::dropIfExists('s_productos');
    }
}
