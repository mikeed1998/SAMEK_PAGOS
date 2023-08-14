<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSSubcategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_subcategorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('categoria');
            $table->string('subcategoria')->nullable();
            $table->foreign('categoria')->references('id')->on('s_categorias')->onDelete('cascade');
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
        Schema::dropIfExists('s_subcategorias');
    }
}
