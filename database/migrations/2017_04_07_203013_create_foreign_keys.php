<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('comentarios', function(Blueprint $table) {
			$table->foreign('com_parent_id')->references('com_id')->on('comentarios')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('etiquetas', function(Blueprint $table) {
			$table->foreign('cat_id')->references('cat_id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('categorias', function(Blueprint $table) {
			$table->foreign('rubro_id')->references('rubro_id')->on('rubros')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('etiqueta_contenido', function(Blueprint $table) {
			$table->foreign('eti_id')->references('eti_id')->on('etiquetas')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('prof_id')->references('prof_id')->on('profesores')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('post_cat_id')->references('pos_cat_id')->on('post_categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cursos', function(Blueprint $table) {
			$table->foreign('cat_id')->references('cat_id')->on('categorias')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('profesor_curso', function(Blueprint $table) {
			$table->foreign('prof_id')->references('prof_id')->on('profesores')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('profesor_curso', function(Blueprint $table) {
			$table->foreign('cur_id')->references('cur_id')->on('cursos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('usuario_cursos', function(Blueprint $table) {
			$table->foreign('user_id')->references('user_id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('temas', function(Blueprint $table) {
			$table->foreign('cur_id')->references('cur_id')->on('cursos')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('lecciones', function(Blueprint $table) {
			$table->foreign('tema_id')->references('tema_id')->on('temas')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('ventas_cab', function(Blueprint $table) {
			$table->foreign('user_id')->references('user_id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('log_error_pagos', function(Blueprint $table) {
			$table->foreign('user_id')->references('user_id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('log_error_pagos', function(Blueprint $table) {
			$table->foreign('vc_id')->references('vc_id')->on('ventas_cab')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('pagos_pendientes', function(Blueprint $table) {
			$table->foreign('vc_id')->references('vc_id')->on('ventas_cab')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('venta_det', function(Blueprint $table) {
			$table->foreign('vc_id')->references('vc_id')->on('ventas_cab')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('suscripciones', function(Blueprint $table) {
			$table->foreign('user_id')->references('user_id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('suscripciones', function(Blueprint $table) {
			$table->foreign('vc_id')->references('vc_id')->on('ventas_cab')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->foreign('user_id')->references('user_id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('comentarios', function(Blueprint $table) {
			$table->dropForeign('comentarios_com_parent_id_foreign');
		});
		Schema::table('etiquetas', function(Blueprint $table) {
			$table->dropForeign('etiquetas_cat_id_foreign');
		});
		Schema::table('categorias', function(Blueprint $table) {
			$table->dropForeign('categorias_rubro_id_foreign');
		});
		Schema::table('etiqueta_contenido', function(Blueprint $table) {
			$table->dropForeign('etiqueta_contenido_eti_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_prof_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_post_cat_id_foreign');
		});
		Schema::table('cursos', function(Blueprint $table) {
			$table->dropForeign('cursos_cat_id_foreign');
		});
		Schema::table('profesor_curso', function(Blueprint $table) {
			$table->dropForeign('profesor_curso_prof_id_foreign');
		});
		Schema::table('profesor_curso', function(Blueprint $table) {
			$table->dropForeign('profesor_curso_cur_id_foreign');
		});
		Schema::table('usuario_cursos', function(Blueprint $table) {
			$table->dropForeign('usuario_cursos_user_id_foreign');
		});
		Schema::table('temas', function(Blueprint $table) {
			$table->dropForeign('temas_cur_id_foreign');
		});
		Schema::table('lecciones', function(Blueprint $table) {
			$table->dropForeign('lecciones_tema_id_foreign');
		});
		Schema::table('ventas_cab', function(Blueprint $table) {
			$table->dropForeign('ventas_cab_user_id_foreign');
		});
		Schema::table('log_error_pagos', function(Blueprint $table) {
			$table->dropForeign('log_error_pagos_user_id_foreign');
		});
		Schema::table('log_error_pagos', function(Blueprint $table) {
			$table->dropForeign('log_error_pagos_vc_id_foreign');
		});
		Schema::table('pagos_pendientes', function(Blueprint $table) {
			$table->dropForeign('pagos_pendientes_vc_id_foreign');
		});
		Schema::table('venta_det', function(Blueprint $table) {
			$table->dropForeign('venta_det_vc_id_foreign');
		});
		Schema::table('suscripciones', function(Blueprint $table) {
			$table->dropForeign('suscripciones_user_id_foreign');
		});
		Schema::table('suscripciones', function(Blueprint $table) {
			$table->dropForeign('suscripciones_vc_id_foreign');
		});
		Schema::table('tickets', function(Blueprint $table) {
			$table->dropForeign('tickets_user_id_foreign');
		});
	}
}