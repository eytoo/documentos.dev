<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagosPendientesTable extends Migration {

	public function up()
	{
		Schema::create('pagos_pendientes', function(Blueprint $table) {
			$table->increments('pag_pen_id');
			$table->timestamps();
			$table->string('pag_pen_estado', 10)->default('espera');
			$table->integer('vc_id')->unsigned();
			$table->datetime('pag_pen_feho');
			$table->string('pag_pen_imagen', 200);
			$table->string('pag_pen_cod_cobro', 50);
			$table->datetime('pag_pen_feho_fin');
		});
	}

	public function down()
	{
		Schema::drop('pagos_pendientes');
	}
}