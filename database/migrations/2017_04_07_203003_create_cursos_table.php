<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCursosTable extends Migration {

	public function up()
	{
		Schema::create('cursos', function(Blueprint $table) {
			$table->increments('cur_id');
			$table->integer('cat_id')->unsigned();
			$table->string('cur_nombre', 200);
			$table->text('cur_slogan');
			$table->string('cur_icono', 200);
			$table->string('cur_url', 200);
			$table->text('cur_descripcion');
			$table->boolean('cur_estado')->default(false);
			$table->string('cur_etiquetas', 200)->default('cursania');
			$table->string('cur_portada', 200);
			$table->string('cur_duracion', 10)->default('0');
			$table->boolean('cur_certificado')->default(false);
			$table->boolean('cur_gratuito')->default(false);
			$table->string('cur_tipo', 10)->default('s');
			$table->float('cur_precio')->default('0');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('cursos');
	}
}