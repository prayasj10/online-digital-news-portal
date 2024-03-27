<?php

use App\Advertisement;
use App\Category;
use App\Post;

function getLatestPosts()
{
  return Post::orderBy('id', 'DESC')->where('published', 1)->with('categories')->take(7)->get();
}

function getScrollers()
{
    return Post::orderBy('id', 'DESC')->where('published', 1)->with('categories')->take(10)->get();

}

function getSliders()
{
    return Post::orderBy('id', 'DESC')->where('published', 1)->with('categories')->take(4)->get();
}

function getHomePageAd()
{
   return Advertisement::where('page1',1)->latest()->first();
}

function getListingPageAd()
{
    return Advertisement::where('page2',1)->latest()->first();
}

function getDetailPageAd()
{
    return Advertisement::where('page3',1)->latest()->first();
}

?>
