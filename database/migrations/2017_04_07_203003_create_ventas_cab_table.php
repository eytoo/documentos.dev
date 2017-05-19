<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentasCabTable extends Migration {

	public function up()
	{
		Schema::create('ventas_cab', function(Blueprint $table) {
			$table->increments('vc_id');
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('vc_feho');
			$table->integer('tipo_pag_id');
			$table->integer('pag_pen_id');
			$table->integer('user_id')->unsigned();
			$table->float('vc_subtotal');
			$table->float('vc_igv');
			$table->float('vc_comision');
			$table->float('vc_total');
			$table->float('vc_desc_valor');
			$table->float('vc_cupon_valor')->default('0');
			$table->string('vc_estado_pago', 10);
			$table->datetime('vc_feho_pago');
			$table->boolean('vc_anulado')->default(false);
		});
	}

	public function down()
	{
		Schema::drop('ventas_cab');
	}
}