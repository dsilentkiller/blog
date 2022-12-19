<?php

namespace App\Http\Controllers\Admin\Account;

use App\Models\c;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Account\LedgerGroup;

class LedgerGroupController extends Controller
{
    protected $folderName ='admin.account.ledger.ledgergroup.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $ledgergroup;

    function __construct( LedgerGroup $ledgergroup)
    {

            $this->middleware('auth');
            $this->ledgergroup = $ledgergroup;
            // $this->imageSupport =$imageSupport;
    }

    public function getledgergroups($n){
        return LedgerGroup::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'ledgergroups' => $this->getLedgerGroups(10),
            'activePage' => 'ledgergroup_list',
            'page'=>'ledgergroup',
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
            'activePage' =>'ledgergroup_create',
            'page'=>'ledgergroup',
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
        $this->ledgergroup ->fill($request->all());

        $this->ledgergroup ->created_by = Auth::user()->id;
        if ($this->ledgergroup->save()){
            Toastr::success('Successfully 1 ledgergroup has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('ledgergroup.index')->with('success','Successfully 1 ledgergroup has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be ledgergroup created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\ledgergroup  $ledgergroup
     * @return \Illuminate\Http\Response
     */
    public function show(LedgerGroup $ledgergroup)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'ledgergroup' =>$ledgergroup,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ledgergroup  $ledgergroup
     * @return \Illuminate\Http\Response
     */
    public function edit(LedgerGroup $ledgergroup)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'ledgergroups' => $this-> getLedgerGroups(10),
            'n' =>1,
            'ledgergroup' =>$ledgergroup,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ledgergroup  $ledgergroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ledgergroup $ledgergroup)
    {
        //
        $this->ledgergroup = $ledgergroup; //new ledgergroup object created
        $this->ledgergroup->fill($request->all()); //data retrived
        $this->ledgergroup->created_by = Auth::User()->id; //user created


        if ($this->ledgergroup->save()){
            Toastr::success('Successfully 1 ledgergroup has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('ledgergroup.index')->with('success','Successfully 1 ledgergroup has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $ledgergroup = LedgerGroup::find($id);

            $ledgergroup->delete();

            return redirect()->route('ledgergroup.index')->with('message', 'report details has been successfully deleted');

        }
        }
