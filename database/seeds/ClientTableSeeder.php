<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \CodeProject\Clients::truncate();
       factory(\CodeProject\Clients::class,10)->create();

     
    }
}
