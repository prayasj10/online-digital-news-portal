<?php

namespace App\Http\Controllers;

use App\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $slugs=Slug::all();

        return view('slug.index',compact('slugs'));
    }

    public function create()
    {
        $slug=new Slug();

        return view('slug.create',compact('slug'));
    }

    public function store(Slug $slug)
    {
        $data = \request()->validate([
            'title' => '',
            'slug'=>'',
            'summary'=>'',
        ]);

        Slug::create([
            'title'=>$data['title'],
            'slug'=> Str::slug($data['title'], '-'),
            'summary'=>$data['summary'],
        ]);

        return redirect('/slug');
    }

    public function edit(Slug $slug)
    {
        return view('slug.edit',compact('slug'));
    }

    public function update(Slug $slug)
    {

        $data = request()->validate([
            'title' => '',
            'slug'=>'',
            'summary'=>'',
        ]);

        $slug->update([
            'title' => $data['title'],
            'slug'=> Str::slug($data['title'], '-'),
            'summary'=> $data['summary'],
        ]);

        return redirect('/slug');
    }



    public function destroy(Slug $slug)
    {
        $slug->delete();

        return redirect('/slug');

    }
}
