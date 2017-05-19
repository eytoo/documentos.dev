<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlanesTable extends Migration {

	public function up()
	{
		Schema::create('planes', function(Blueprint $table) {
			$table->increments('plan_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('plan_nombre', 200);
			$table->integer('plan_duracion')->default('30');
			$table->string('plan_codigo', 200);
			$table->float('plan_precio');
			$table->text('plan_descripcion');
		});
	}

	public function down()
	{
		Schema::drop('planes');
	}
}