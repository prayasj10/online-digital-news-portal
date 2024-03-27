<?php

namespace App\Http\Controllers;

use App\Author;
use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AuthorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if($request->search)
        {
            $search = $request->search;

            $authors = Author::where('name','LIKE',"%$search%")
                ->orWhere('id','=',$search)->orderBy('position','ASC')->simplePaginate(5);
        }else {
            $authors = Author::orderBy('position','ASC')->simplePaginate(5);
        }
        return view('author.index',compact('authors'));


    }

    public function updatePosition(Request $request)
    {
        $authors = Author::all();


        foreach ($authors as $author)
        {
            $id = $author->id;

            foreach ($request->position  as $position)
            {
                if($position['id'] == $id) {
                    $author->update(['position' =>$position['position']]);
                }
            }
        }
        return response()->json(['success'=>'Position changed successfully']);

    }

    public function create()
    {
        $author = new Author();

//        $countries = Country::get()->pluck('name','id');
//
//        $cities = City::get()->pluck('name','id');

        return view('author.create',compact('author'));

    }

//    public function city($id)
//    {
//        $cities = City::where("country_id",$id)->pluck('name','id');
//
//        return json_encode($cities);;
//    }

    public function store(Author $author,Request $request)
    {
        $this->authorize('create',Author::class);


        if(\request('facebook'))
        {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => 'url',
                'twitter' => '',
                'published' => '',
            ]);
        }
        else if (\request('twitter'))
        {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => '',
                'twitter' => 'url',
                'published' => '',
            ]);
        }
        else if (\request('facebook') && \request('twitter'))
        {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => 'url',
                'twitter' => 'url',
                'published' => '',
            ]);
        }
        else {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => '',
                'twitter' => '',
                'published' => '',
            ]);
        }

//        $country_id = $request->country;
//
//        $city_id = $request->city;

        Author::create([
            'name'=>$data['name'],
            'facebook'=>$data['facebook'],
            'twitter'=>$data['twitter'],
            'published'=> $data['published'],
        ]);

        Session::flash('success', 'Author created.');

        return redirect('/author');

    }

    public function edit(Author $author)
    {

        return view('author.edit',compact('author'));
    }

    public function update(Author $author)
    {
        $this->authorize('delete',$author);

        if(\request('facebook'))
        {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => 'url',
                'twitter' => '',
                'published' => '',
            ]);
        }
        else if (\request('twitter'))
        {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => '',
                'twitter' => 'url',
                'published' => '',
            ]);
        }
        else if (\request('facebook') && \request('twitter'))
        {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => 'url',
                'twitter' => 'url',
                'published' => '',
            ]);
        }
        else {
            $data = \request()->validate([
                'name' => 'required|string',
                'facebook' => '',
                'twitter' => '',
                'published' => '',
            ]);
        }

        $author->update($data);

        Session::flash('success', 'Author updated.');

        return redirect('/author');
    }

    public function destroy(Author $author)
    {
        $this->authorize('delete',$author);

        if ($author->posts()->exists())
        {
            Session::flash('warning', 'Cannot delete,Post is using this author');
        }else {

            $author->delete();
            Session::flash('status', 'Author deleted.');
        }

        return redirect('/author');
    }


    public function changeAuthorPublished(Request $request)
    {
        $author = Author::find($request->id);
        $author->published = $request->published;
        $author->save();

        return response()->json(['success'=>'Status changed successfully']);
    }
}
