<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('user_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('user_nombre', 200);
			$table->string('user_apellidos', 200);
			$table->string('user_email', 100)->unique();
			$table->string('user_password', 100);
			$table->boolean('user_confirmado')->default(false);
			$table->string('user_reg_modo', 10)->default('email');
			$table->string('user_rem_token', 200);
			$table->string('user_foto', 200);
			$table->string('user_ip', 100)->nullable();
			$table->integer('user_country_id');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}