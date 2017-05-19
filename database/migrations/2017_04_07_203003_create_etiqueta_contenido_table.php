<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtiquetaContenidoTable extends Migration {

	public function up()
	{
		Schema::create('etiqueta_contenido', function(Blueprint $table) {
			$table->increments('eti_cont_id');
			$table->integer('eti_id')->unsigned();
			$table->string('eti_con_tipo', 20);
			$table->integer('eti_cont_rel_id')->default('0');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('etiqueta_contenido');
	}
}