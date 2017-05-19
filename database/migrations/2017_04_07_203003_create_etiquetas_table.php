<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEtiquetasTable extends Migration {

	public function up()
	{
		Schema::create('etiquetas', function(Blueprint $table) {
			$table->increments('eti_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('eti_nombre', 50);
			$table->integer('cat_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('etiquetas');
	}
}