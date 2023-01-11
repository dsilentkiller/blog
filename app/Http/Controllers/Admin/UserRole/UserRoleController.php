<?php

namespace App\Http\Controllers\Admin\UserRole;

use App\Models\c;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\UserRole\UserRole;

class UserRoleController extends Controller
{
    protected $folderName ='admin.userrole.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $userrole;

    function __construct( UserRole $userrole)
    {

            $this->middleware('auth');
            $this->userrole = $userrole;
            // $this->imageSupport =$imageSupport;
    }

    public function getUserRoles($n){
        return UserRole::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'userroles' => $this->getUserRoles(10),
            'activePage' => 'userrole_list',
            'page'=>'userrole',
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
            'activePage' =>'userrole_create',
            'page'=>'userrole',
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
        $this->userrole ->fill($request->all());

        $this->userrole ->created_by = Auth::user()->id;
        if ($this->userrole->save()){
            Toastr::success('Successfully 1 userrole has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('userrole.index')->with('success','Successfully 1 userrole has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be userrole created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userrole)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'userrole' =>$userrole,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRole $userrole)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'userroles' => $this-> getUserRoles(10),
            'n' =>1,
            'userrole' =>$userrole,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userrole  $userrole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userrole)
    {
        //
        $this->userrole = $userrole; //new userrole object created
        $this->userrole->fill($request->all()); //data retrived
        $this->userrole->created_by = Auth::User()->id; //user created


        if ($this->userrole->save()){
            Toastr::success('Successfully 1 userrole has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('userrole.index')->with('success','Successfully 1 userrole has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $userrole = UserRole::find($id);

            $userrole->delete();

            return redirect()->route('userrole.index')->with('message', 'report details has been successfully deleted');

        }
        }
