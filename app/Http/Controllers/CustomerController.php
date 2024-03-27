<?php
//
//namespace App\Http\Controllers;
//
//use App\Customer;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
//use Intervention\Image\Facades\Image;
//
//class CustomerController extends Controller
//{
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//
//    }
//    public function index()
//    {
//
//
//        return view('customer.index');
//    }
//
//    public function fetchCustomer()
//    {
//
//        $customers = Customer::orderBy('position','ASC')->get();
//
//        return response()->json([
//            'customers'=>$customers,
//        ]);
//    }
//
//    public function updatePosition(Request $request)
//    {
//        $customers = Customer::all();
//
//        foreach ($customers as $customer)
//        {
//            $id = $customer->id;
//
//            foreach ($request->position  as $position)
//            {
//                if($position['id'] == $id) {
//                    $customer->update(['position' =>$position['position']]);
//                }
//            }
//        }
//        return response()->json(["status"=>true,"message"=>"Position updated successfully"]);
//    }
//
//    public function store(Request $request)
//    {
//        $this->authorize('create',Customer::class);
//
//        $validator = Validator::make($request->all(),[
//            'name'=>'required',
//            'address'=>'required',
//            'phone'=>'required|min:10:max10|unique:customers',
//        ]);
//
//        if($validator->fails()) {
//            return response()->json([
//                'status' => 400,
//                'errors' => $validator->messages()
//            ]);
//        }
//        else
//        {
////            $path = 'uploads/';
////            $file = $request->input('image');
////            $file_name = time().'_'.$file->getClientOriginalName();
////
////            $upload = $file->storeAs($path, $file_name, 'public');
//
//                $customer = new Customer;
//                $customer->name = $request->input('name');
//                $customer->address = $request->input('address');
//                $customer->phone = $request->input('phone');
//                $customer->save();
//
//            return response()->json([
//                'status'=>200,
//                'message'=>'Customer Added successfully.'
//            ]);
//        }
//
//    }
//
//
//    public function edit($id)
//    {
//        $customer = Customer::find($id);
//
//        if($customer)
//        {
//            return response()->json([
//                'status'=>200,
//                'customer'=>$customer,
//            ]);
//        }
//        else {
//            return response()->json([
//                'status'=>404,
//                'message'=>'No Customer Found',
//            ]);
//        }
//
//    }
//
//
//
//    public function update(Request $request, $id,Customer $customer)
//    {
//        $this->authorize('update',$customer);
//
//        $validator = Validator::make($request->all(), [
//            'name'=> 'required',
//            'address'=>'required',
//            'phone'=>'required|min:10:max10',
////            'phone'=>'required|min:10:max10|unique:customers,phone'.$customer->id,
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
//            $customer = Customer::find($id);
//            if($customer)
//            {
//                $customer->name = $request->input('name');
//                $customer->address = $request->input('address');
////                $customer->email = $request->input('email');
//                $customer->phone = $request->input('phone');
//                $customer->update();
//                return response()->json([
//                    'status'=>200,
//                    'message'=>'Customer Data Updated Successfully.'
//                ]);
//            }
//            else
//            {
//                return response()->json([
//                    'status'=>404,
//                    'message'=>'No customer Found.'
//                ]);
//            }
//
//        }
//    }
//
//    public function destroy($id,Customer $customer)
//    {
//        $this->authorize('delete',$customer);
//
//        $customerr = Customer::find($id);
//
//        if($customerr)
//        {
//            $customerr->delete();
//            return response()->json([
//                'status'=>200,
//                'message'=>'Customer Deleted Successfully.'
//            ]);
//        }
//        else {
//
//            return response()->json([
//                'status' => 404,
//                'message'=>'No customer found'
//            ]);
//        }
//
//    }
//}
