<?php

namespace App\Http\Controllers;

use App\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class OpinionController extends Controller
{

    public function index()
    {
        return view('opinion.index');
    }

    public function fetchopinion()
    {

        $opinions = Opinion::orderBy('id','DESC')->get();

        return response()->json([
            'code'=>1,
            'opinions'=>$opinions,
        ]);
    }

    function insert(Request $request)
    {

            $error = Validator::make($request->all(),[
                'name.*'  => 'required',
                'title.*'=>'required',
                'description.*'  => 'required'
            ]);

            if($error->fails())
            {
                return response()->json([
                    'error'  => $error->errors()->all()
                ]);
            }

            $name = $request->name;
            $title = $request->title;
            $description = $request->description;
            $id = $request->id;

            for($count = 0; $count < count($name); $count++)
            {
                $opinion = Opinion::updateOrCreate([
                    'id' => $id[$count],
                    ],
                    [
                    'name' => $name[$count],
                    'title' => $title[$count],
                    'description'  => $description[$count]
                ]);

            }

            return response()->json([
                'message'  => 'Update successful.'
            ]);

    }

    public function destroy($id)
    {

        $opinion = Opinion::find($id);

        if($opinion)
        {
            $opinion->delete();
            return response()->json([
                'status'=>1,
                'message'=>'Deleted Successfully.'
            ]);
        }
        else {

            return response()->json([
                'status' => 0,
                'message'=>'No data found'
            ]);
        }

    }
}
