<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;


class PoliticsController extends Controller
{
    public function index()
    {
        $listingpageadvertisement = getListingPageAd();

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $politic = Category::where('id',1)->first();

        $politics = Category::with('posts')
            ->where('id', 1)
            ->get();


        return view('frontend.politics.index',compact(
            'politics','politic','categories','latestposts','listingpageadvertisement'
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

        $politic = Category::where('id',1)->first();

        $relatedpost = Category::with('posts')
            ->where('id', 1)
            ->first();


        return view('frontend.politics.show',compact(
            'categories','latestposts',
            'politic','post','relatedpost','id','detailpageadvertisement'
        ));
    }
}
