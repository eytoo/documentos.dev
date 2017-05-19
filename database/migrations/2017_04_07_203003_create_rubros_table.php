<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRubrosTable extends Migration {

	public function up()
	{
		Schema::create('rubros', function(Blueprint $table) {
			$table->increments('rubro_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('rubro_nombre');
			$table->text('rubro_otros');
			$table->string('rubro_url', 200);
		});
	}

	public function down()
	{
		Schema::drop('rubros');
	}
}