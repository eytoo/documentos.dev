<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComentariosTable extends Migration {

	public function up()
	{
		Schema::create('comentarios', function(Blueprint $table) {
			$table->increments('com_id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('com_descripcion');
			$table->integer('com_parent_id')->unsigned()->default('0');
			$table->string('com_tipo', 10);
			$table->integer('com_cont_id');
			$table->integer('com_estado')->default('0');
			$table->float('com_calificacion')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('comentarios');
	}
}