<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfesoresTable extends Migration {

	public function up()
	{
		Schema::create('profesores', function(Blueprint $table) {
			$table->increments('prof_id');
			$table->string('prof_nombre', 200);
			$table->string('prof_apellidos', 80);
			$table->string('prof_correo', 200);
			$table->string('prof_url', 200);
			$table->string('prof_foto', 100);
			$table->text('prof_historia');
			$table->text('prof_otros');
			$table->string('prof_telefono', 20);
			$table->timestamps();
			$table->softDeletes();
			$table->string('prof_web', 100);
			$table->string('prof_ocupacion', 100);
		});
	}

	public function down()
	{
		Schema::drop('profesores');
	}
}