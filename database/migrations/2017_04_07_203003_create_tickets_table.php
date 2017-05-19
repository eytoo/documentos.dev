<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketsTable extends Migration {

	public function up()
	{
		Schema::create('tickets', function(Blueprint $table) {
			$table->increments('ticket_id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned()->default('0');
			$table->string('ticket_nombre', 100);
			$table->string('ticket_email', 100);
			$table->string('ticket_asunto', 200);
			$table->text('ticket_mensaje');
		});
	}

	public function down()
	{
		Schema::drop('tickets');
	}
}