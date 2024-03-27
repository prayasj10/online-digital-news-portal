<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;

class SocietyController extends Controller
{
    public function index()
    {
        $listingpageadvertisement = getListingPageAd();

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $society = Category::where('id',5)->first();

        $societies = Category::with('posts')
            ->where('id', 5)
            ->get();

        return view('frontend.society.index',compact('listingpageadvertisement',
            'society',
            'societies','categories','latestposts'
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

        $society = Category::where('id',5)->first();

        $relatedpost = Category::with('posts')
            ->where('id', 5)
            ->first();
//        dd($relatedpost);

        return view('frontend.society.show',compact('detailpageadvertisement',
            'categories','latestposts',
            'society','post','relatedpost','id'
        ));
    }
}
