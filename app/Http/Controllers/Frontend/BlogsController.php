<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;

class BlogsController extends Controller
{
    public function index()
    {
        $listingpageadvertisement = getListingPageAd();

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $blog = Category::where('id',3)->first();

        $blogs = Category::with('posts')
            ->where('id', 3)
            ->get();

        return view('frontend.blog.index',compact('listingpageadvertisement',
            'blogs','blog','categories','latestposts'
        ));
    }

    public function show($id)
    {
        $detailpageadvertisement = getDetailPageAd();

        $post = Post::where('id',$id)->first();

        if($post == null)
        {
            return view('errors.404');
        }

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $blog = Category::where('id',3)->first();

        $relatedpost = Category::with('posts')
            ->where('id', 3)
            ->first();
//        dd($relatedpost);

        return view('frontend.blog.show',compact('detailpageadvertisement',
            'categories','latestposts',
            'blog','post','relatedpost','id'
        ));
    }

}
