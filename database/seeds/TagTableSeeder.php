<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create(['name'=>'Tag1']);
        \App\Tag::create(['name'=>'Tag2']);
        \App\Tag::create(['name'=>'Tag4']);
        \App\Tag::create(['name'=>'Tag5']);
        \App\Tag::create(['name'=>'Tag3']);


    }
}
