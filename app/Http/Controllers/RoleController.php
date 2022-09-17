<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct(){
        $this->middleware('permission:role-list|role-create|role-edit|role-delete',['only'=>['index','store']]);
        $this->middleware('permission:role-create',['only'=>['create','store']]);
        $this->middleware('permission:role-edit',['only'=>['edit','update']]);
        $this->middleware('permission:role-delete',['only'=>['destroy']]);

    }
    public function index(Request $request){
        $roles = Role::oederBy('id', 'DESC')->paginate(6);
        return view('roles.index', compact('roles'));

    }

    public function create(){
        $permission  = Permission::get();
        return view('roles.create', compact('permission'));


    }
    public function store(Request $request){
        $this->validate($request,[
        'name'=>'required|unique:roles, name',
        'permissions'=>'required',
        ]);
        $role = Role::create(['name'=>$$request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->eoute('roles.index')->with('success','Role Created Successfully ');
    }

}

