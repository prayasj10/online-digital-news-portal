<?php

namespace App\Http\Controllers;

use App\Category;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
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

            $categories = Category::where('name','LIKE',"%$search%")
                ->orWhere('id','=',$search)
                ->orWhere('slug','=',$search)
                ->get();
        }else {
            $categories = Category::all();
        }
        return view('category.index',compact('categories'));

    }

    public function create()
    {
        $category = new Category();

        return view('category.create',compact('category'));

    }
    public function store(Category $category)
    {
        $this->authorize('create',Category::class);

        $data= \request()->validate([
            'name' => 'required|string',
            'slug'=> '',
            'published'=>'',
        ]);

        Category::create([
            'name'=>$data['name'],
            'slug'=> Str::slug($data['name'], '-'),
            'published'=>$data['published'],
        ]);

        Session::flash('success', 'Category created.');

        return redirect('/category');

    }

    public function edit(Category $category)
    {

        return view('category.edit',compact('category'));
    }

    public function update(Category $category)
    {
        $this->authorize('update',$category);

        $data = request()->validate([
            'name' => 'required|string',
            'slug'=> '',
            'published'=>'',
        ]);

        $category->update([
            'name'=>$data['name'],
            'slug'=> Str::slug($data['name'], '-'),
            'published'=>$data['published'],
        ]);

        Session::flash('success', 'Category updated.');


        return redirect('/category');
    }

    public function destroy(Category $category)
    {
        $this->authorize('delete',$category);

        if ($category->posts()->exists())
        {
            Session::flash('warning', 'Cannot delete,Post is using this category');
        }else {
            $category->delete();
            Session::flash('status', 'Category deleted.');
        }

        return redirect('/category');
    }

    public function changeCategoryPublished(Request $request)
    {
        $category = Category::find($request->id);
        $category->published = $request->published;
        $category->save();

        return response()->json(['success'=>'Status changed successfully']);
    }
}
