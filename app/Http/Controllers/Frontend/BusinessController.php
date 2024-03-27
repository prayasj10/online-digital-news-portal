<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;

class BusinessController extends Controller
{
    public function index()
    {
        $listingpageadvertisement = getListingPageAd();

        $latestposts = getLatestPosts();

        $categories = Category::all();

        $business = Category::where('id',4)->first();

        $businesses = Category::with('posts')
            ->where('id', 4)
            ->get();

        return view('frontend.business.index',compact('listingpageadvertisement',
            'businesses','business','categories','latestposts'
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

        $business = Category::where('id',4)->first();

        $relatedpost = Category::with('posts')
            ->where('id', 4)
            ->first();
//        dd($relatedpost);

        return view('frontend.business.show',compact('detailpageadvertisement',
            'categories','latestposts',
            'business','post','relatedpost','id'
        ));
    }
}
