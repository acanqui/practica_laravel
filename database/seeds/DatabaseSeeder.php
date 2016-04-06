<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();//Dehabilita las restriciones del modelo

        // $this->call(UserTableSeeder::class);
        //Agregando
        $this->call(UserSeeder::class);

        Model::reguard(); //Habilita las restriciones del modelo
    }
}
