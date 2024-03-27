<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Author::class,2)->create();

        \App\Author::create([
           'name'=>'SoftNEP',
            'published'=>1,
            'position'=>0,
        ]);

    }
}
