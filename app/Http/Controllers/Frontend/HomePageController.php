<?php

namespace App\Http\Controllers\Frontend;

use App\Advertisement;
use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function view;

class HomePageController extends Controller
{
    public function index(Request $request)
    {

        $homepageadvertisement = getHomePageAd();
//        $scrollers = Post::orderBy('id', 'DESC')->where('published', 1)->take(10)->get();

        $scrollers = getScrollers();

        $sliders = getSliders();

        $latestposts = getLatestPosts();

//        $politics = Category::with('posts')
//            ->where('id', 1)
//            ->orderBy('id','DESC')
//            ->first();

        $politics = Category::where('id',1)->with(['posts' => function ($query) {
            $query->where('category_id', '=',1)->orderBy('id','DESC');
        }])->first();

        $societies = Category::where('id',5)->with(['posts' => function ($query) {
            $query->where('category_id', '=',5)->orderBy('id','DESC');
        }])->first();

        $sports = Category::where('id',2)->with(['posts' => function ($query) {
            $query->where('category_id', '=',2)->orderBy('id','DESC');
        }])->first();

        $businesses = Category::where('id',4)->with(['posts' => function ($query) {
            $query->where('category_id', '=',4)->orderBy('id','DESC');
        }])->first();

        $blogs = Category::where('id',3)->with(['posts' => function ($query) {
            $query->where('category_id', '=',3)->orderBy('id','DESC');
        }])->first();

        $categories = Category::all();

        return view('index', compact(
            'scrollers', 'sliders', 'latestposts',
            'categories',
            'politics',
            'societies',
            'sports',
            'businesses',
            'blogs',
            'homepageadvertisement'

        ));

    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function timer()
    {
        echo date('h:i:s A');
    }
}
