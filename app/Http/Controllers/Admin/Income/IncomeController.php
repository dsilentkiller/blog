<?php

namespace App\Http\Controllers\Admin\Income;

use App\Models\c;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Models\Admin\Income\Income;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    protected $folderName ='admin.income.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $income;

    function __construct( Income $income)
    {

            $this->middleware('auth');
            $this->income = $income;
            // $this->imageSupport =$imageSupport;
    }

    public function getIncomes($n){
        return Income::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'incomes' => $this->getIncomes(10),
            'activePage' => 'income_list',
            'page'=>'income',
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
            'activePage' =>'income_create',
            'page'=>'income',
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
        $this->income ->fill($request->all());

        $this->income ->created_by = Auth::user()->id;
        if ($this->income->save()){
            Toastr::success('Successfully 1 income has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('income.index')->with('success','Successfully 1 income has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be income created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'income' =>$income,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_income',
            'incomes' => $this-> getIncomes(10),
            'n' =>1,
            'income' =>$income,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        //
        $this->income = $income; //new income object created
        $this->income->fill($request->all()); //data retrived
        $this->income->created_by = Auth::User()->id; //user created


        if ($this->income->save()){
            Toastr::success('Successfully 1 income has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('income.index')->with('success','Successfully 1 income has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $income = Income::find($id);

            $income->delete();

            return redirect()->route('income.index')->with('message', 'report details has been successfully deleted');

        }
        }
