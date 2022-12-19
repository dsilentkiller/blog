<?php

namespace App\Http\Controllers\Admin\Investment;

use App\Models\c;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Investment\Investment;

class InvestmentController extends Controller
{
    protected $folderName ='admin.investment.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $investment;

    function __construct( Investment $investment)
    {

            $this->middleware('auth');
            $this->investment = $investment;
            // $this->imageSupport =$imageSupport;
    }

    public function getInvestments($n){
        return Investment::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'investments' => $this->getInvestments(10),
            'activePage' => 'investment_list',
            'page'=>'investment',
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
            'activePage' =>'investment_create',
            'page'=>'investment',
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
        $this->investment ->fill($request->all());

        $this->investment ->created_by = Auth::user()->id;
        if ($this->investment->save()){
            Toastr::success('Successfully 1 investment has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('investment.index')->with('success','Successfully 1 investment has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be investment created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function show(Investment $investment)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'investment' =>$investment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function edit(Investment $investment)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'investments' => $this-> getInvestments(10),
            'n' =>1,
            'investment' =>$investment,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\investment  $investment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Investment $investment)
    {
        //
        $this->investment = $investment; //new investment object created
        $this->investment->fill($request->all()); //data retrived
        $this->investment->created_by = Auth::User()->id; //user created


        if ($this->investment->save()){
            Toastr::success('Successfully 1 investment has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('investment.index')->with('success','Successfully 1 investment has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $investment = Investment::find($id);

            $investment->delete();

            return redirect()->route('investment.index')->with('message', 'report details has been successfully deleted');

        }
        }
