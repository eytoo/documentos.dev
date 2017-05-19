<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfesorCursoTable extends Migration {

	public function up()
	{
		Schema::create('profesor_curso', function(Blueprint $table) {
			$table->increments('prof_cur_id');
			$table->integer('prof_id')->unsigned();
			$table->integer('cur_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('profesor_curso');
	}
}