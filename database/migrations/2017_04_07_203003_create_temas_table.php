<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTemasTable extends Migration {

	public function up()
	{
		Schema::create('temas', function(Blueprint $table) {
			$table->increments('tema_id');
			$table->string('tema_nombre', 200);
			$table->text('tema_descripcion');
			$table->integer('cur_id')->unsigned();
			$table->string('tema_url', 200);
			$table->timestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('temas');
	}
}