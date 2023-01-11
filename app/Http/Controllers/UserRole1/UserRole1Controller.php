<?php

namespace App\Http\Controllers\UserRole\UserRole;

use App\Models\c;
use Illuminate\Http\Request;

use App\Http\Models\Role\UserRole;
use Kamaln7\Toastr\Facades\Toastr;
// use Spatie\Permission\Models\Role\UserRole;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserRoleController extends Controller
{



    protected $folderName ='admin.role.';
    // protected $imageSupport;

    protected $role;

    function __construct( Role $role)
    {

            $this->middleware('auth');
            $this->role = $role;
            // $this->imageSupport =$imageSupport;
    }

    public function getRoles($n){
        return Role::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'roles' => $this->getRoles(10),
            'activePage' => 'role_list',
            'page'=>'role',
            'n'=>1,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'role_create',
            'page'=>'role',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->role ->fill($request->all());

        $this->role ->created_by = Auth::user()->id;
        if ($this->role->save()){
            Toastr::success('Successfully 1 role has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('role.index')->with('success','Successfully 1 role has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be role created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'role',
            'role' =>$role,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'role',
            'roles' => $this-> getRoles(10),
            'n' =>1,
            'role' =>$role,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $this->role = $role; //new role object created
        $this->role->fill($request->all()); //data retrived
        $this->role->created_by = Auth::User()->id; //user created


        if ($this->role->save()){
            Toastr::success('Successfully 1 role has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('role.index')->with('success','Successfully 1 role has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $role = Role::find($id);

            $role->delete();

            return redirect()->route('role.index')->with('message', 'report details has been successfully deleted');

        }
        }
