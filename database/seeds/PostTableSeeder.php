<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = \App\Post::create(['title'=>'Title 1 Title 1  Title 1 Title 1','content'=>'This is content This is contentThis is content','published'=>'1','image'=>'/frontend/posts/photograph_img2.jpg','author_id'=>'1','awardcategory_id'=>1,'awardname_id'=>2]);
        $post->tags()->sync([1,3,5]);
        $post->categories()->sync([1,2,4]);

        $post = \App\Post::create(['title'=>'Title 2  Title 2  Title 2  Title 2  ','content'=>'This is another contentThis is contentThis is content','image'=>'/frontend/posts/photograph_img3.jpg','published'=>'1','author_id'=>'3','awardcategory_id'=>4,'awardname_id'=>16]);
        $post->tags()->sync([2,4]);
        $post->categories()->sync([1,4]);

        $post = \App\Post::create(['title'=>'Title 3  Title 3  Title 3  Title 3  ','content'=>'This is anThis is contentother anohter content','published'=>'1','image'=>'/frontend/posts/photograph_img4.jpg','author_id'=>'3','awardcategory_id'=>5,'awardname_id'=>24]);
        $post->tags()->sync([2]);
        $post->categories()->sync([2]);

        $post = \App\Post::create(['title'=>'Title 4  Title 2  Title 4  Title 2  ','content'=>'This is another contentThis is contentThis is content','image'=>'/frontend/posts/1642334352_slider_img1.jpg','published'=>'1','author_id'=>'3','awardcategory_id'=>4,'awardname_id'=>16]);
        $post->tags()->sync([2,4]);
        $post->categories()->sync([1,4]);

        $post = \App\Post::create(['title'=>'Title 5 Title 5  Title 1 Title 1','content'=>'This is content This is contentThis is content','published'=>'1','image'=>'/frontend/posts/1642334321_slider_img2.jpg','author_id'=>'2','awardcategory_id'=>1,'awardname_id'=>2]);
        $post->tags()->sync([1,4,5]);
        $post->categories()->sync([1,2,3,4,5]);

    }
}
