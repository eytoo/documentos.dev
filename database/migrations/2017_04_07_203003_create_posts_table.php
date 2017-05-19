<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{

    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('post_nombre', 200);
            $table->string('post_url', 200);
            $table->string('post_imagen', 100);
            $table->text('post_resumen');
            $table->text('post_cuerpo');
            $table->text('post_etiquetas');
            $table->integer('prof_id')->unsigned();
            $table->integer('post_cat_id')->unsigned();
        });
    }

    public function down()
    {
        Schema::drop('posts');
    }
}
