<?php

namespace App\Http\Controllers;

use App\Author;
use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $users = User::all();
        $activeusers = User::where('role_id',1)->where('status',1)->get();
        $inactiveusers = User::where('role_id',1)->where('status',0)->get();
        $activeadmins = User::where('role_id',2)->where('status',1)->get();


        $categories = Category::all();
        $publishedcategories = Category::where('published',1)->get();
        $unpublishedcategories = Category::where('published',0)->get();

        $authors = Author::all();
        $publishedauthors = Author::where('published',1)->get();
        $unpublishedauthors = Author::where('published',0)->get();

        $posts = Post::all();
        $publishedposts = Post::where('published',1)->get();
        $unpublishedposts = Post::where('published',0)->get();


        return view('dashboard',compact(
            'users','activeusers','inactiveusers','activeadmins',
            'categories','publishedcategories','unpublishedcategories',
            'authors','publishedauthors','unpublishedauthors',
            'posts','publishedposts','unpublishedposts'
        ));
    }
}
