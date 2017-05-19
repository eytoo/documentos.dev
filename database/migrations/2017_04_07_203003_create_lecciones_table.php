<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeccionesTable extends Migration {

	public function up()
	{
		Schema::create('lecciones', function(Blueprint $table) {
			$table->increments('lec_id');
			$table->string('lec_nombre', 200);
			$table->text('lec_descripcion');
			$table->string('lec_url', 200);
			$table->boolean('lec_estado');
			$table->string('lec_tipo', 10);
			$table->integer('tema_id')->unsigned();
			$table->text('lec_ruta_video');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('lecciones');
	}
}