<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDescuentosTable extends Migration {

	public function up()
	{
		Schema::create('descuentos', function(Blueprint $table) {
			$table->increments('desc_id');
			$table->timestamps();
			$table->string('desc_nombre', 200);
			$table->decimal('desc_porcentaje');
			$table->integer('desc_rel_id');
			$table->string('desc_rel_contenido', 30)->default('planes');
			$table->datetime('desc_feho_inicio');
			$table->datetime('desc_feho_fin');
		});
	}

	public function down()
	{
		Schema::drop('descuentos');
	}
}