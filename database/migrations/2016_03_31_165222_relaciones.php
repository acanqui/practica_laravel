<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('entradas', function($table) {
            $table->integer('fk_usuario')->unsigned()->nullable();
            //$table->integer('fk_usuario')->unsigned()->default(5);//pra asignarle un id de usuario
            $table->foreign('fk_usuario')->references('id')->on('users');
        });

        Schema::create('categorias', function($table) {
            $table->increments('id');
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::create('entrada_categoria', function($table) {
            $table->increments('id');
            $table->integer('fk_entrada')->unsigned();
            $table->integer('fk_categoria')->unsigned();
            $table->timestamps();
            $table->foreign('fk_entrada')->references('id')->on('entradas');
            $table->foreign('fk_categoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('entradas', function($table) {
            $table->dropForeign('entradas_fk_usuario_foreign');
            $table->dropColumn('fk_usuario');
        });
        Schema::dropIfExists('entrada_categoria');
        Schema::dropIfExists('categorias');
    }
}
