<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        factory(\App\Category::class)->create();

        \App\Category::create([
            'name'=>'Politics',
            'slug'=>'politics',
            'published'=>1,
        ]);
        \App\Category::create([
            'name'=>'Sports',
            'slug'=>'sports',
            'published'=>1,
        ]);
        \App\Category::create([
            'name'=>'Blog',
            'slug'=>'blog',
            'published'=>1,
        ]);
        \App\Category::create([
            'name'=>'Business',
            'slug'=>'business',
            'published'=>1,
        ]);
        \App\Category::create([
            'name'=>'Society',
            'slug'=>'society',
            'published'=>1,
        ]);
    }
}
