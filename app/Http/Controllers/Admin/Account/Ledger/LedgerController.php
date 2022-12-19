<?php

namespace App\Http\Controllers\Admin\Account\Ledger;

use App\Models\c;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Account\Ledger\Ledger;

class LedgerController extends Controller
{
    protected $folderName ='admin.ledger.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $Ledger;

    function __construct( Ledger $ledger)
    {

            $this->middleware('auth');
            $this->ledger = $ledger;
            // $this->imageSupport =$imageSupport;
    }

    public function getLedgers($n){
        return Ledger::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'ledgers' => $this->getLedgers(10),
            'activePage' => 'ledger_list',
            'page'=>'ledger',
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
            'activePage' =>'ledger_create',
            'page'=>'ledger',
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
        $this->Ledger ->fill($request->all());

        $this->Ledger ->created_by = Auth::user()->id;
        if ($this->Ledger->save()){
            Toastr::success('Successfully 1 Ledger has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('Ledger.index')->with('success','Successfully 1 Ledger has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be Ledger created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\Ledger  $Ledger
     * @return \Illuminate\Http\Response
     */
    public function show(Ledger $ledger)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'ledger' =>$ledger,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ledger  $Ledger
     * @return \Illuminate\Http\Response
     */
    public function edit(Ledger $ledger)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'ledgers' => $this-> getLedgers(10),
            'n' =>1,
            'ledger' =>$ledger,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ledger  $Ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ledger $ledger)
    {
        //
        $this->ledger = $ledger; //new Ledger object created
        $this->ledger->fill($request->all()); //data retrived
        $this->ledger->created_by = Auth::User()->id; //user created


        if ($this->ledger->save()){
            Toastr::success('Successfully 1 Ledger has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('Ledger.index')->with('success','Successfully 1 Ledger has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $ledger = Ledger::find($id);

            $ledger->delete();

            return redirect()->route('ledger.index')->with('message', 'report details has been successfully deleted');

        }
        }
