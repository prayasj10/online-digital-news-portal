<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(Role $role,Request $request)
    {
        $this->middleware('auth');
        $this->role = $role;
        $this->request = $request;
    }

    public function index()
    {
        if($this->request->search)
        {
            $search = $this->request->search;

            $roles = Role::where('name','LIKE',"%$search%")
                ->orWhere('id','=',$search)
                ->get()->except(2);
        }else {
            $roles = Role::get()->except(2);
        }

        return view('role.index',compact('roles'));
    }

    public function show(Role $role)
    {
        $this->authorize('view',$role);

        return view('role.show',compact('role'));
    }

    public function create()
    {
        $role = new Role();

        $permissions = Permission::all();

        return view('role.create',compact('role','permissions'));
    }


    public function store()
    {
        $this->authorize('create',Role::class);

        $data = $this->request->validate([
            'name' => 'required|string',
            'permission'=>'',
        ]);

        $input = $this->role->create([
            'name' => $data['name'],
        ]);

        $input->permissions()->sync($this->request->input('permission'));


        return redirect('/role');
    }

    public function edit(Role $role)
    {
        $permissions = permission::all();

        $selectedpermission=[];


        foreach ($role->permissions as $permission)
        {
            array_push($selectedpermission,$permission->id);
        }

        return view('role.edit',compact('role','permissions','selectedpermission'));
    }

    public function update(Role $role)
    {
        $this->authorize('update',$role);

//        dd($this->request->permission);

        $data = $this->request->validate([
            'name' => 'required|string',
            'permission'=>'',
        ]);

        $role->update([
            'name' => $data['name'],
        ]);

        $role->permissions()->sync($this->request->input('permission'));


        return redirect('/role')->withInput();

    }

    public function destroy(role $role)
    {
        $this->authorize('delete',$role);

        $role->delete();

        return redirect('/role');
    }
}
