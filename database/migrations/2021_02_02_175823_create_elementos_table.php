<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementos', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('elemento');
						$table->text('texto')->nullable();
						$table->string('imagen')->nullable();
						$table->string('url')->nullable();
						$table->boolean('contenido')->default(0);
						$table->boolean('activo')->default(1);
						$table->integer('orden')->default('666');
						$table->unsignedBigInteger('seccion');
						$table->foreign('seccion')->references('id')->on('seccions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elementos');
    }
}
