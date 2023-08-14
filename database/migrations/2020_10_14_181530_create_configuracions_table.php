<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracions', function (Blueprint $table) {
          $table->bigIncrements('id');
    			$table->string('title')->nullable();
    			$table->string('description')->nullable();
    			$table->string('prodspag')->nullable();
    			$table->string('paypalemail')->nullable();
    			$table->string('destinatario')->nullable();
    			$table->string('destinatario2')->nullable();
    			$table->string('remitente')->nullable();
    			$table->string('remitentepass')->nullable();
    			$table->string('remitentehost')->nullable();
    			$table->string('remitenteport',6)->nullable();
    			$table->string('remitenteseguridad')->nullable();
    			$table->string('telefono')->nullable();
    			$table->string('whatsapp')->nullable();
    			$table->string('whatsapp2')->nullable();
    			$table->string('facebook')->nullable();
    			$table->string('instagram')->nullable();
    			$table->string('youtube')->nullable();
    			$table->string('linkedin')->nullable();
    			$table->string('envio')->nullable();
    			$table->string('envioglobal')->nullable();
    			$table->string('iva')->nullable();
    			$table->string('incremento')->nullable();
    			$table->text('direccion')->nullable();
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
        Schema::dropIfExists('configuracions');
    }
}
