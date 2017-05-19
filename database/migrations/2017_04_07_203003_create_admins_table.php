<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		Schema::create('admins', function(Blueprint $table) {
			$table->increments('admin_id');
			$table->timestamps();
			$table->softDeletes();
			$table->string('admin_nombre', 200);
			$table->string('admin_apellidos', 200);
			$table->string('admin_email', 100)->unique();
			$table->string('admin_password', 100);
			$table->boolean('admin_estado')->default(true);
			$table->string('admin_rem_token', 200);
			$table->string('admin_foto', 200);
		});
	}

	public function down()
	{
		Schema::drop('admins');
	}
}