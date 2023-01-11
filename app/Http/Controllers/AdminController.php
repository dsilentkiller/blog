<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
// use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
// use Laravel\Jetstream\Rules\Role;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        // Role::create(['name'=>'admin']);
    //    Permission::create(['name'=>'all role']);
    // $role = Role::findById(1);
    // $permission =Permission::findById(1);
    // $role->givePermissionTo($permission);
    // // $permission->assignRole($role);
    // $role->syncPermissions(($permission));
    //     return view('home');
    $role = Auth::user()->role;
    if($role == '1'){
        return view('layouts.admin-app');
    }if($role == '2'){
        return view('layouts.seller-app');

    }else{
        return view('layouts.user-app');
    }





    }


    public function home(){
        return view('admin.home');
    }

    public function addseller(Request $request){
       $data= new User();
       $data->name=$request->name;
       $data->email=$request->email;

    }
}
