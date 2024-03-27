<?php

namespace App\Http\Controllers;

use App\Image;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index()
    {
        return view('image.index');
    }

    public function fetchImage()
    {
//        $Images = Image::all();
//        $data = \View::make('all_Images')->with('Images', $Images)->render();
//        return response()->json(['code'=>1,'result'=>$data]);

        $images = Image::orderBy('position','ASC')->get();

        return response()->json([
            'code'=>1,
            'images'=>$images,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address'=>'required',
            'phone'=>'required|min:10:max10',
            'image' => ''
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        }
        else {
            if ($request->file('image')) {
//                $path = 'uploads/';
//                $file = $request->file('image');
//                $file_name = time() . '_' . $file->getClientOriginalName();
//
//                $upload = $file->storeAs($path, $file_name, 'public');

                $path = public_path('cms/images');
                $image = $request->file('image');
                $imagename = time() . '_' . $image->getClientOriginalName();
                $upload = $image->move($path,$imagename);

                $imagePath = '/cms/user/'.$imagename;
                if ($upload) {
                    Image::insert([
                        'name' => $request->name,
                        'address' => $request->address,
                        'phone' => $request->phone,
                        'image' => $imagename,
                    ]);
                    return response()->json(['code' => 1, 'message' => 'Data has been saved successfully']);
                }
            } else{
                Image::insert([
                    'name' => $request->name,
                    'address' => $request->address,
                    'phone' => $request->phone,
                ]);
                return response()->json(['code' => 1, 'message' => 'Data has been saved successfully']);
            }
        }
    }

    public function details(Request $request)
    {
        $image = Image::find($request->id);
        return response()->json(['code'=>1,'result'=>$image]);
    }


    public function update(Request $request)
    {
        $id = $request->id;

        $image = Image::find($id);

        $path = public_path('cms/images');

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address'=>'required',
            'phone'=>'required|min:10:max10',
//            'name' => 'required|string:unique:images',
            'image_update' => 'image',
        ], [
            'image_update.image' => 'Image file must be an image',
        ]);

        if (!$validator->passes()) {
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            if($request->hasFile('image_update')){
                $image = $request->file('image_update');
                $imagename = time() . '_' . $image->getClientOriginalName();
                $upload = $image->move($path,$imagename);

                $imagePath = '/cms/user/'.$imagename;
//                $file_path = $path.$image->image;
//                if($image->image != null && Storage::disk('public')->exists($file_path)){
//                    Storage::disk('public')->delete($file_path);
//                }

//                $file = $request->file('image_update');
//                $file_name = time().'_'.$file->getClientOriginalName();

//                $upload = $file->storeAs($path, $file_name, 'public');

                if ($upload) {

                    $image->name = $request->name;
                    $image->address = $request->address;
                    $image->phone = $request->phone;
                    $image->image = $imagePath;
                    $image->update();
//                    $image->update([
//                        'name' => $request->name,
//                        'image' => $file_name,
//                    ]);
                    return response()->json(['code' => 1, 'message' => 'Data has been updated successfully']);
                }
            }else{
                $image->name = $request->name;
                $image->address = $request->address;
                $image->phone = $request->phone;
                $image->update();
//                $image -> update([
//                    'name'=>$request->name,
//                    'address' => $request->address,
//                    'phone' => $request->phone,
//                ]);
                return response()->json(['code' => 1, 'message' => 'Data has been updated successfully']);
            }
        }
    }

    public function delete(Request $request)
    {
        $image=Image::find($request->id);
        $path = 'uploads/';
        $image_path = $path.$image->image;
        if($image->image != null && Storage::disk('public')->exists($image_path)){
            Storage::disk('public')->delete($image_path);
        }
        $query = $image->delete();
        if($query){
            return response()->json(['code'=>1,'message'=>'Data has been deleted']);
        }else{
            return response()->json(['code'=>0,'message'=>'Something went wrong']);
        }

    }

    public function deleteImg(Request $request)
    {
        $image = Image::find($request->id);

        $image->image = null;
        $image->update();

        return response()->json(['code'=>1,'message'=>'Image removed']);

    }

    public function updatePosition(Request $request)
    {
        $images = Image::all();

        foreach ($images as $image)
        {
            $id = $image->id;

            foreach ($request->position  as $position)
            {
                if($position['id'] == $id) {
                    $image->update(['position' =>$position['position']]);
                }
            }
        }
        return response()->json(["status"=>true,"message"=>"Position updated successfully"]);
    }
}
