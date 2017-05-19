<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentaDetTable extends Migration {

	public function up()
	{
		Schema::create('venta_det', function(Blueprint $table) {
			$table->increments('vd_id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('vc_id')->unsigned();
			$table->integer('vd_cod_rel_id')->default('0');
			$table->string('vd_tipo', 20)->default('curso');
			$table->float('vd_precio');
			$table->float('vd_desc_por')->default('0');
			$table->float('vd_desc_monto')->default('0');
			$table->string('vd_cupon_cod');
			$table->float('vd_cupon_por')->default('0');
			$table->float('vd_cupon_monto')->default('0');
			$table->float('vd_total')->default('0');
		});
	}

	public function down()
	{
		Schema::drop('venta_det');
	}
}