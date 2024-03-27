<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdvertisementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $advertisements = Advertisement::all();

        return view('advertisement.index',compact('advertisements'));
    }


    public function create()
    {
        return view('advertisement.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'required',
            'page1'=>'',
            'page2'=>'',
            'page3'=>'',
        ]);

        $path = public_path('/frontend/advertisement');
        $image = $request->file('image');
        $imagename = time() . '_' . $image->getClientOriginalName();
        $image->move($path,$imagename);

        $imagePath = '/frontend/advertisement/'.$imagename;

        if($request->page1 && $request->page2 && $request->page3) {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page1' => $data['page1'],
                'page2' => $data['page2'],
                'page3' => $data['page3'],
            ]);
        }
        elseif ($request->page1 && $request->page2)
        {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page1' => $data['page1'],
                'page2' => $data['page2'],
            ]);
        }
        elseif ($request->page1 && $request->page3)
        {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page1' => $data['page1'],
                'page3' => $data['page3'],
            ]);
        }
        elseif ($request->page2 && $request->page3)
        {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page2' => $data['page2'],
                'page3' => $data['page3'],
            ]);
        }
        elseif($request->page1)
        {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page1' => $data['page1'],
            ]);
        }
        elseif ($request->page2)
        {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page2' => $data['page2'],
            ]);
        }
        elseif ($request->page3)
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
                'page3' => $data['page3'],
            ]);
        else
        {
            Advertisement::create([
                'name' => $data['name'],
                'image' => $imagePath,
            ]);
        }

        return redirect('/advertisement');

    }

    public function edit(Advertisement $advertisement)
    {

        return view('advertisement.edit',compact('advertisement'));
    }

//    public function update(Advertisement $advertisement)
//    {
//
//        $data = request()->validate([
//            'title' => 'required|string',
//            'content' => 'required',
//            'category'=>'required',
//            'author'=>'required',
//            'published' => 'required',
//            'image'=>'',
//        ]);
//
//
//        if(request('image')) {
//
//            $imagePath = request('image')->store('uploads', 'public');
//
//            $image = Image::make(public_path("storage/{$imagePath}"));
//            $image->save();
//
//            $post->update([
//                'title' => $data['title'],
//                'content' => $data['content'],
//                'published' => $data['published'],
//                'author_id' => $author_id,
//                'image'=>$imagePath,
//            ]);
//        }
//        else
//        {
//            $post->update([
//                'title'=>$data['title'],
//                'content'=>$data['content'],
//                'published'=>$data['published'],
//                'author_id'=>$author_id,
//            ]);
//
//        }
//
//
//        Session::flash('success', 'Advertisement updated.');
//
//        return redirect('/advertisement');
//
//    }

    public function destroy(Advertisement $advertisement)
    {
//        $this->authorize('delete',$advertisement);

        $advertisement->delete();

        Session::flash('status', 'Advertisement deleted.');

        return redirect('/advertisement');
    }

}
