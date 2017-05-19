<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLogErrorPagosTable extends Migration {

	public function up()
	{
		Schema::create('log_error_pagos', function(Blueprint $table) {
			$table->increments('log_error_id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();
			$table->integer('vc_id')->unsigned();
			$table->datetime('log_error_feho');
		});
	}

	public function down()
	{
		Schema::drop('log_error_pagos');
	}
}