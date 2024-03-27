<?php

namespace App\Http\Controllers;


use App\Author;
use App\AwardCategory;
use App\AwardName;
use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct(Post $post,Request $request)
    {
        $this->middleware('auth');
        $this->post = $post;
        $this->request = $request;
    }

    public function index()
    {
        if($this->request->search)
        {
            $search = $this->request->search;

            $posts = Post::where('title','LIKE',"%$search%")
                ->orWhere('id','=',$search)
                ->orderBy('id','DESC')
                ->paginate(5);
        }else {
            $posts = Post::orderBy('id','DESC')->paginate(5);
        }
        return view('post.index',compact('posts'));
    }


    public function create()
    {
        $post = new Post();

        $awardcategories = AwardCategory::get()->pluck('name','id');

        $authors = Author::where('published',1)->pluck('name', 'id');

        $categories = Category::where('published',1)->pluck('name','id');

        $tags = Tag::all()->pluck('name','id');

        return view('post.create',compact('post','authors','categories','tags','awardcategories'));
    }

    public function awardcategory($id)
    {
        $awardnames = AwardName::where('awardcategory_id',$id)->pluck('name','id');

        return json_encode($awardnames);
    }


    public function store()
    {

        $this->authorize('create',Post::class);


        if($this->request->awardcategory)
        {
        $data = $this->request->validate([
            'title' => 'required|string',
            'content' => 'required',
            'category'=>'required',
            'author'=>'required',
            'awardcategory'=>'required',
            'awardname'=>'required',
            'published' => 'required',
            'tag'=>'',
            'image'=>'image|mimes:jpeg,jpg,png,gif',
        ]);
        } else{
            $data = $this->request->validate([
                'title' => 'required|string',
                'content' => 'required',
                'category'=>'required',
                'author'=>'required',
                'awardcategory'=>'',
                'awardname'=>'',
                'published' => 'required',
                'tag'=>'',
                'image'=>'image|mimes:jpeg,jpg,png,gif',
            ]);
        }

        $author_id = $this->request->input('author');


        $awardcategory_id = $this->request->awardcategory;

        $awardname_id = $this->request->awardname;

        if($this->request->image && $this->request->awardcategory)
        {
            $path = public_path('frontend/posts');
            $image = $this->request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move($path,$imagename);

            $imagePath = '/frontend/posts/'.$imagename;

            $input = $this->post->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'awardcategory_id'=>$awardcategory_id,
                'awardname_id'=>$awardname_id,
                'image'=> $imagePath,
            ]);
        }
        elseif($this->request->awardcategory)
        {
            $input = $this->post->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'awardcategory_id'=>$awardcategory_id,
                'awardname_id'=>$awardname_id,
            ]);
        }
        elseif ($this->request->image)
        {
            $path = public_path('frontend/posts');
            $image = $this->request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move($path,$imagename);

            $imagePath = '/frontend/posts/'.$imagename;

            $input = $this->post->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'image'=> $imagePath,
            ]);

        }
        else{
            $input = $this->post->create([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
            ]);
        }

        $input->categories()->sync($this->request->input('category'));


        if($this->request->input('tag'))
        {
            $tags=$this->request->input('tag');

            foreach ($tags as $tag)
            {

                if(is_numeric($tag))
                {
                    $tagArray[]= $tag;
                }
                else
                {
                    $newTag = Tag::create(['name'=>$tag]);

                    $tagArray[]= $newTag->id;
                }
            }
            $input->tags()->sync($tagArray);
        }

        Session::flash('success', 'Post created.');

        return redirect('/post');
    }

    public function edit(Post $post)
    {

        $authors = Author::where('published',1)->pluck('name', 'id');

        $categories = Category::where('published',1)->pluck('name','id');

        $tags = Tag::all()->pluck('name','id');

        $awardcategories = AwardCategory::get()->pluck('name','id');


        $selectedCategory=[];
        $selectedTag=[];

        foreach ($post->categories as $category)
        {
            array_push($selectedCategory,$category->id);
        }

        foreach ($post->tags as $tag)
        {
            array_push($selectedTag,$tag->id);
        }

        return view('post.edit',compact('post','authors','categories','tags','selectedCategory','selectedTag','awardcategories'));
    }

    public function update(Post $post)
    {

        $this->authorize('update',$post);


//        $data = request()->validate([
//            'title' => 'required|string',
//            'content' => 'required',
//            'category'=>'required',
//            'author'=>'required',
//            'published' => 'required',
//            'image'=>'image|mimes:jpeg,jpg,png,gif',
//        ]);
        if($this->request->awardcategory)
        {
            $data = $this->request->validate([
                'title' => 'required|string',
                'content' => 'required',
                'category'=>'required',
                'author'=>'required',
                'awardcategory'=>'required',
                'awardname'=>'',
                'published' => 'required',
                'tag'=>'',
                'image'=>'image|mimes:jpeg,jpg,png,gif',
            ]);
        } else{
            $data = $this->request->validate([
                'title' => 'required|string',
                'content' => 'required',
                'category'=>'required',
                'author'=>'required',
                'awardcategory'=>'',
                'awardname'=>'',
                'published' => 'required',
                'tag'=>'',
                'image'=>'image|mimes:jpeg,jpg,png,gif',
            ]);
        }


        $author_id = request()->input('author');

//        if(request('image')) {
//
//            $path = public_path('frontend/posts');
//            $image = $this->request->file('image');
//            $imagename = time() . '_' . $image->getClientOriginalName();
//            $image->move($path,$imagename);
//
//            $imagePath = '/frontend/posts/'.$imagename;
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

        $awardcategory_id = $this->request->awardcategory;

        $awardname_id = $this->request->awardname;

        if($this->request->image && $this->request->awardcategory && $this->request->awardname)
        {
            $path = public_path('frontend/posts');
            $image = $this->request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move($path,$imagename);

            $imagePath = '/frontend/posts/'.$imagename;

            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'awardcategory_id'=>$awardcategory_id,
                'awardname_id'=>$awardname_id,
                'image'=> $imagePath,
            ]);
        } elseif($this->request->image && $this->request->awardcategory)
        {
            $path = public_path('frontend/posts');
            $image = $this->request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move($path,$imagename);

            $imagePath = '/frontend/posts/'.$imagename;

            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'awardcategory_id'=>$awardcategory_id,
//                'awardname_id'=>$awardname_id,
                'image'=> $imagePath,
            ]);
        }
        elseif($this->request->awardcategory && $this->request->awardname)
        {
            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'awardcategory_id'=>$awardcategory_id,
                'awardname_id'=>$awardname_id,
            ]);
        }
        elseif($this->request->awardcategory)
        {
            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'awardcategory_id'=>$awardcategory_id,
            ]);
        }
        elseif ($this->request->image)
        {
            $path = public_path('frontend/posts');
            $image = $this->request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move($path,$imagename);

            $imagePath = '/frontend/posts/'.$imagename;

            $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
                'image'=> $imagePath,
            ]);

        }
        else{
                $post->update([
                'title' => $data['title'],
                'content' => $data['content'],
                'published' => $data['published'],
                'author_id' => $author_id,
            ]);
        }

        $post->categories()->sync(request()->input('category'));


        if($this->request->input('tag'))
        {
            $tags=$this->request->input('tag');

            foreach ($tags as $tag)
            {

                if(is_numeric($tag))
                {
                    $tagArray[]= $tag;
                }
                else
                {
                    $newTag = Tag::create(['name'=>$tag]);

                    $tagArray[]= $newTag->id;
                }
            }
            $post->tags()->sync($tagArray);
        }

        else{
            $post->tags()->sync($this->request->tags);
        }


        Session::flash('success', 'Post updated.');

        return redirect('/post')->withInput();

    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);

        $post->delete();

        Session::flash('status', 'Post deleted.');


        return redirect('/post');
    }

    public function deleteImage()
    {
        $post = Post::find($this->request->id);

        $post->image = null;
        $post->update();
//        $post->update(['image'=>null]);

        return response()->json(['message'=>'Image removed']);

    }

    public function changePostPublished()
    {
        $post = Post::find($this->request->id);

        $post->published = $this->request->published;

        $post->save();

        return response()->json(['success'=>'Status changed successfully']);

    }

    public function select2()
    {
        return view('select2');
    }
//
//    public function select()
//    {
//        return view('select');
//    }
}
