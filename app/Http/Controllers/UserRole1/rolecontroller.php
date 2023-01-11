<?php
namespace App\Http\Controllers\Role;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function __construct(){
        // $this->middleware('permission:role-list|role-create|role-edit|role-delete',['only'=>['index','store']]);
        // $this->middleware('permission:role-create',['only'=>['create','store']]);
        // $this->middleware('permission:role-edit',['only'=>['edit','update']]);
        // $this->middleware('permission:role-delete',['only'=>['destroy']]);

    }
    public function index(Request $request){
        $roles = Role::orderBy('id', 'DESC')->paginate(6);
        return view('admin.role.index', compact('roles'));

    }

    public function create(){
        $permission  = Permission::get();
        return view('admin.role.form', compact('permission'));


    }
    public function store(Request $request){
        $this->validate($request,[
        'name'=>'required|unique:roles, name',
        'permissions'=>'required',
        ]);
        $role = Role::create(['name'=>$$request->input('name')]);
        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success','Role Created Successfully ');
    }



}

