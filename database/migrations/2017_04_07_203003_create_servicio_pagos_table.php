<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateServicioPagosTable extends Migration {

	public function up()
	{
		Schema::create('servicio_pagos', function(Blueprint $table) {
			$table->increments('ser_pa_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('ser_pa_entidad', 50);
			$table->float('ser_pa_porcentaje');
			$table->float('ser_pa_costo');
		});
	}

	public function down()
	{
		Schema::drop('servicio_pagos');
	}
}