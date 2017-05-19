<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEmpresaTable extends Migration {

	public function up()
	{
		Schema::create('empresa', function(Blueprint $table) {
			$table->increments('emp_id');
			$table->timestamps();
			$table->softDeletes();
			$table->text('emp_tyc');
			$table->text('emp_poli_priv');
		});
	}

	public function down()
	{
		Schema::drop('empresa');
	}
}