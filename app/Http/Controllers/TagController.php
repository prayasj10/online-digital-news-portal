<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct(Tag $tag)
    {
        $this->middleware('auth');
        $this->tag= $tag;
    }

    public function index()
    {
        $tags = Tag::all();

        return view('tag.index',compact('tags'));
    }

    public function create()
    {
        $tag = new Tag();

        return view('tag.create',compact('tag'));
    }

    public function store()
    {
        $data = \request()->validate([
            'name' => 'required|string|unique:tags',
        ]);

        Tag::create($data);

        return redirect('/tag');


    }


    public function show()
    {

    }

    public function edit(Tag $tag)
    {
        return view('tag.edit',compact('tag'));
    }

    public function update(Tag $tag)
    {
        $data = \request()->validate([
            'name' => 'required|string|unique:tags',
        ]);

        $tag->update($data);

        return redirect('/tag');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/tag');
    }
}
