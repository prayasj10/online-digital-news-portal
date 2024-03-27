<?php

namespace App\Http\Controllers\Frontend;

use App\Author;
use App\Category;
use App\Http\Controllers\Controller;

class AuthorPageController extends Controller
{
    public function index($id)
    {
        $author = Author::where('id',$id)->with('posts.categories')->first();

        if($author == null)
        {
            return view('errors.404');
        }

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $politic = Category::where('id',1)->first();

        $politics = Category::with('posts')
            ->where('id', 1)
            ->get();


        return view('frontend.author.index',compact('author',
            'politics','politic','categories','latestposts'
        ));
    }
}
