<?php
//
//namespace App\Http\Controllers;
//
//use App\SecondOpinion;
//use http\Env\Response;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Validator;
//use function Symfony\Component\String\s;
//
//class SecondOpinionController extends Controller
//{
//    public function index()
//    {
//        return view('secondopinion.index');
//
//    }
//
//    public function create()
//    {
//        return view('secondopinion.create');
//
//    }
//
//    public function fetchopinion()
//    {
//        $opinions = SecondOpinion::orderBy('id','DESC')->get();
//
//        return response()->json([
//            'opinions'=>$opinions,
//        ]);
//    }
//
//    function insert(Request $request)
//    {
//        if($request->ajax())
//        {
//            $rules = array(
//                'name.*'  => 'required',
//                'title.*'=>'required',
//                'description.*'  => 'required'
//            );
//            $error = Validator::make($request->all(), $rules);
//            if($error->fails())
//            {
//                return response()->json([
//                    'error'  => $error->errors()->all()
//                ]);
//            }
//
//            $name = $request->name;
//            $title = $request->title;
//            $description = $request->description;
//
//
////            $image = $request->file('image');
//
//
//            for($count = 0; $count < count($name); $count++)
//            {
////                $imagename = $image[$count]->getClientOriginalName();
//
//                $data = array(
//                    'name' => $name[$count],
//                    'title' => $title[$count],
////                    'image'=>$imagename,
//                    'description'  => $description[$count]
//                );
//                $insert_data[] = $data;
//            }
//
//            SecondOpinion::insert($insert_data);
//            return response()->json([
//                'success'  => 'Data Added successfully.'
//            ]);
//
//        }
//    }
//
//
//    public function edit($id)
//    {
//        $secondopinion = SecondOpinion::find($id);
//
//        if($secondopinion)
//        {
//            return response()->json([
//                'status'=>200,
//                'secondopinion'=>$secondopinion,
//            ]);
//        }
//        else {
//            return response()->json([
//                'status'=>404,
//                'message'=>'No Data Found',
//            ]);
//        }
//
//    }
//
//
//
//    public function update(Request $request, $id)
//    {
//
//        $validator = Validator::make($request->all(), [
//            'name'=> 'required',
//            'title'=>'required',
//            'description'=>'required',
//        ]);
//
//        if($validator->fails())
//        {
//            return response()->json([
//                'status'=>400,
//                'errors'=>$validator->messages()
//            ]);
//        }
//        else
//        {
//            $secondopinion = SecondOpinion::find($id);
//            if($secondopinion)
//            {
//                $secondopinion->name = $request->input('name');
//                $secondopinion->title = $request->input('title');
////                $customer->email = $request->input('email');
//                $secondopinion->description = $request->input('description');
//                $secondopinion->update();
//                return response()->json([
//                    'status'=>200,
//                    'message'=>'Data Updated Successfully.'
//                ]);
//            }
//            else
//            {
//                return response()->json([
//                    'status'=>404,
//                    'message'=>'No Data Found.'
//                ]);
//            }
//
//        }
//    }
//
//
//    public function destroy($id)
//    {
//
//        $secondopinion = SecondOpinion::find($id);
//
//        if($secondopinion)
//        {
//            $secondopinion->delete();
//            return response()->json([
//                'status'=>200,
//                'message'=>'Deleted Successfully.'
//            ]);
//        }
//        else {
//
//            return response()->json([
//                'status' => 404,
//                'message'=>'No data found'
//            ]);
//        }
//
//    }
//
//}
