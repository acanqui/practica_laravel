<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CamposUnicosUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("users",function($table){
            //$table->string ("email")->unique();
            //$table->string ("username")->unique();
            $table->string ("email")->change();
            $table->string ("username")->change();
            $table->unique("email");
            $table->unique("username");

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
        //Schema::table({
        //    $table->string ("email")->unique();
        //    $table->string ("username")->unique();
        //});
    }
}
