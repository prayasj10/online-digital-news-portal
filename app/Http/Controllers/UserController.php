<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
//        if($request->search)
//        {
//            $search = $request->search;
//
//            $users = User::where('name','LIKE',"%$search%")->orWhere('id','=',$search)->get();
//        }else {
//            $users = User::with('role')->get();
//        }

        if(Auth::user()->role_id == 2)
        {
            $users = User::all();
        }
        elseif(Auth::user()->role_id == 1)
        {
            $users = User::where('role_id',1)->get();
        }
        else
        {
            $users = User::where('role_id',1)->orWhere('role_id',2)->get();
        }
        return view('user.index',compact('users'));
    }


    public function create(User $user)
    {
        $roles = Role::get()->pluck('name','id');

        return view('user.create',compact('user','roles'));
    }

    public function store()
    {
        $this->authorize('create',User::class);


        $data = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'role'=>'required',
            'status'=>'',
        ]);

        $role = \request()->role;


        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'image'=>'',
            'role_id'=>$role,
            'status'=> $data['status'],
        ]);

        Session::flash('success', 'User created.');

        return redirect('/user');

    }

    public function show(User $user)
    {
//        $this->authorize('view',$user);


        return view('user.show',compact('user'));
    }


    public function edit(User $user)
    {
        $roles = Role::get()->pluck('name','id');

        return view('user.edit',compact('user','roles'));
    }

    public function update(User $user,Request $request)
    {
        $this->authorize('update',$user);

        $role = \request()->role;


        if($request->password)
        {
            $data = request()->validate([
                'name'=>['string', 'max:255'],
                'image'=>'image',
                'role'=>'required',
                'password'=>['required','string', 'min:3', 'confirmed'],
                'status'=>'',
            ]);
        }
        else
        {
            $data = request()->validate([
                'name'=>['string', 'max:255'],
                'image'=>'image',
                'role'=>'required',
                'password'=>'',
                'status'=>'',
            ]);
        }


        if(request('image')) {
            $path = public_path('cms/user');
            $image = $request->file('image');
            $imagename = time() . '_' . $image->getClientOriginalName();
            $image->move($path,$imagename);

            $imagePath = '/cms/user/'.$imagename;

            $user->update([
                'name' => $data['name'],
                'role_id'=>$role,
                'image' => $imagePath,
                'password'=>Hash::make($data['password']),
                'status'=> $data['status'],
            ]);
        }
        else {

            $user->update([
                'name' => $data['name'],
                'role_id'=>$role,
                'password'=>Hash::make($data['password']),
                'status'=> $data['status'],
            ]);
        }

        Session::flash('success', 'User updated.');

        return redirect('/user');

    }

    public function destroy (User $user)
    {
        $this->authorize('delete',$user);

        $user->delete();

        Session::flash('status', 'User deleted.');

        return redirect('/user');
    }

    public function changeStatus(Request $request)
    {

        $user = User::find($request->id);
        $user->status = $request->status;
        $user->save();

        return response()->json(['success'=>'Status changed successfully']);
    }


}
