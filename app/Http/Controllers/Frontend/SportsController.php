<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;

class SportsController extends Controller
{
    public function index()
    {
        $listingpageadvertisement = getListingPageAd();

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $sport = Category::where('id',2)->first();

        $sports = Category::with('posts')
            ->where('id', 2)
            ->get();

        return view('frontend.sports.index',compact('sport','listingpageadvertisement',
            'sports','categories','latestposts'
        ));
    }

    public function show($id)
    {
        $detailpageadvertisement = getDetailPageAd();

        $post = Post::where('id',$id)->first();

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $sport = Category::where('id',2)->first();

        $relatedpost = Category::with('posts')
            ->where('id', 2)
            ->first();
//        dd($relatedpost);

        return view('frontend.sports.show',compact('detailpageadvertisement',
            'categories','latestposts',
            'sport','post','relatedpost','id'
        ));
    }
}
