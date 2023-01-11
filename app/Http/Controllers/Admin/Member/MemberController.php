<?php

namespace App\Http\Controllers\Admin\Member;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use Kamaln7\Toastr\Facades\Toastr;
use App\Models\Admin\Member\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    protected $folderName ='admin.member.';
    protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $member;

    function __construct(ImageSupport $imageSupport, Member $member)
    {

            $this->middleware('auth');
            $this->member = $member;
            $this->imageSupport =$imageSupport;
    }

    public function getMembers($n){
        return Member::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'members' => $this->getMembers(10),
            'activePage' => 'member_list',
            'page'=>'member',
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
            'activePage' =>'member_create',
            'page'=>'member',
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
        $this->member ->fill($request->all());
        $image = $this->imageSupport->saveAnyImg($request, 'members','image', $this->imageWidth,$this->imageHeight);
        $this->member ->image =$image;
        $this->member ->created_by = Auth::user()->id;
        if ($this->member->save()){
            Toastr::success('Successfully 1 member has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('member.index')->with('success','Successfully 1 member has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be member created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'member' =>$member,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'members' => $this-> getmembers(10),
            'n' =>1,
            'member' =>$member,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        //
        $this->member = $member; //new member object created
        $this->member->fill($request->all()); //data retrived
        $this->member->created_by = Auth::User()->id; //user created
        if(!$request->file('image')==''){
            $this->imageSupport->deleteImg('members',$this->member->image);
            $image = $this->imageSupport->saveAnyImg($request,'members','image',$this->imageHeight,$this->imageWidth);
            $this->member->image =$image;
        }

        if ($this->member->save()){
            Toastr::success('Successfully 1 member has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('member.index')->with('success','Successfully 1 member has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $member = Member::find($id);

            $member->delete();

            return redirect()->route('member.index')->with('message', 'Report details has been successfully deleted');

        }
        }

//     public function getMembers(){
//         $members = Member::all();
//         return view('show')->with('members',$members);
//        }

//    public function index(){
//     return view('admin.member.index');
//    }
//    public function create(){
//     return view('admin.member.form');
//    }


//    public function store (Request $request){
//     $member = new Member;
//     $member->name= $request->input('name');
//     $member->address= $request->input('address');
//     $member->phone= $request->input('phone');
//     $member->age= $request->input('age');
//     $member->gender= $request->input('gender');
//     $member->marital_status= $request->input('marital_status');
//     $member->status= $request->input('status');
//     $member->image= $request->input('image');
//     $member->email= $request->input('email');
//     $member->password= $request->input('password');
//     $member->save();
//     return redirect('/');

//    }

//    public function update(Request $request, $id){
//     $member = Member::find($id);
//     $input= $request->all();
//     $member->fill($input)->save();
//     return redirect('/');
//    }

//    public function delete ($id){
//     $members = Member::find($id);
//     $members->delete();
//     return redirect('/');

//    }
// }
