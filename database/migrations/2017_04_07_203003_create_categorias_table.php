<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriasTable extends Migration {

	public function up()
	{
		Schema::create('categorias', function(Blueprint $table) {
			$table->increments('cat_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('cat_nombre', 200);
			$table->integer('cat_parent_id')->unsigned();
			$table->text('cat_otros');
			$table->integer('rubro_id')->unsigned();
			$table->string('cat_url', 200);
		});
	}

	public function down()
	{
		Schema::drop('categorias');
	}
}