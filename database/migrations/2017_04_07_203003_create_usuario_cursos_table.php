<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioCursosTable extends Migration {

	public function up()
	{
		Schema::create('usuario_cursos', function(Blueprint $table) {
			$table->increments('user_cur_id');
			$table->text('cur_id_array');
			$table->integer('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('usuario_cursos');
	}
}