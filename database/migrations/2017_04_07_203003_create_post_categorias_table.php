<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostCategoriasTable extends Migration {

	public function up()
	{
		Schema::create('post_categorias', function(Blueprint $table) {
			$table->increments('pos_cat_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('pos_cat_nombre', 100);
			$table->integer('post_cat_parent_id')->default('0');
			$table->string('post_cat_url', 200);
		});
	}

	public function down()
	{
		Schema::drop('post_categorias');
	}
}