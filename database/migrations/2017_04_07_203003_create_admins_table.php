<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration {

	public function up()
	{
		$file = realpath(__DIR__.'/../bd/guiobd.sql');
		DB::unprepared( file_get_contents($file) );
	}

	public function down()
	{
		//Schema::drop('admins');
	}
}