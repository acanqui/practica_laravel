<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TablasPrincipales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create("entradas", function($table)
       {
            $table->increments("id");
            $table->string("titulo",500);
            $table->text("contenido");
            $table->timestamps();

        });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists("entradas");
        //
    }
}
