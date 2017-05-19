<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuscripcionesTable extends Migration {

	public function up()
	{
		Schema::create('suscripciones', function(Blueprint $table) {
			$table->increments('sus_id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();
			$table->datetime('sus_feho_ini');
			$table->datetime('sus_feho_fin');
			$table->string('sus_estado', 50);
			$table->integer('vc_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('suscripciones');
	}
}