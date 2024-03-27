<?php

use Illuminate\Database\Seeder;

class OpinionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Opinion::create([
            'name'=>'Name 1','title'=>'Titl2','description'=>'DESCription'
        ]);
    }
}
