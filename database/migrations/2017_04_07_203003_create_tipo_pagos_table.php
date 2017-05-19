<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTipoPagosTable extends Migration {

	public function up()
	{
		Schema::create('tipo_pagos', function(Blueprint $table) {
			$table->increments('tipo_pag_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('tipo_pag_nombre', 50);
			$table->text('tipo_pag_descripcion');
			$table->text('tipo_pag_info');
		});
	}

	public function down()
	{
		Schema::drop('tipo_pagos');
	}
}