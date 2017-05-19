<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestimoniosTable extends Migration {

	public function up()
	{
		Schema::create('testimonios', function(Blueprint $table) {
			$table->increments('test_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('test_nombres', 100);
			$table->string('test_ocupacion', 100);
			$table->string('test_foto', 200);
			$table->text('test_detalle');
		});
	}

	public function down()
	{
		Schema::drop('testimonios');
	}
}