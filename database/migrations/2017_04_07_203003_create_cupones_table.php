<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuponesTable extends Migration {

	public function up()
	{
		Schema::create('cupones', function(Blueprint $table) {
			$table->increments('cupon_id');
			$table->timestamps();
			$table->string('cupon_codigo');
			$table->string('cupon_nombre', 200);
			$table->decimal('cupon_porcentaje');
			$table->integer('cupon_rel_id');
			$table->string('cupon_rel_contenido', 30)->default('planes');
			$table->datetime('cupon_feho_inicio');
			$table->datetime('cupon_feho_fin');
		});
	}

	public function down()
	{
		Schema::drop('cupones');
	}
}