<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->insert([
        	//"id"=>1;//puede ser 
        	"nombre"=>"Pedrito",
        	"email"=>"pedro@ejemplo.com",
        	"password"=>bcrypt("12345")
        	]);
    }
}
