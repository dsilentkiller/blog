<?php

namespace App\Http\Controllers\Admin\loan;


use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\Loan\Loan;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class loanController extends Controller
{
    protected $folderName ='admin.loan.';
    // protected $imageSupport;
    // protected $imageHeight =459;
    // protected $imageWidth =500;
    protected $loan;

    function __construct( Loan $loan)
    {

            $this->middleware('auth');
            $this->loan = $loan;
            // $this->imageSupport =$imageSupport;
    }

    public function getLoans($n){
        return loan::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'loans' => $this->getLoans(10),
            'activePage' => 'loan_list',
            'page'=>'loan',
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
            'activePage' =>'loan_create',
            'page'=>'loan',
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
        $this->loan ->fill($request->all());
        // $image = $this->imageSupport->saveAnyImg($request, 'loans','image', $this->imageWidth,$this->imageHeight);
        // $this->loan ->image =$image;
        $this->loan ->created_by = Auth::user()->id;
        if ($this->loan->save()){
            Toastr::success('Successfully 1 loan has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('loan.index')->with('success','Successfully 1 loan has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be loan created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(loan $loan)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'loan' =>$loan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'loans' => $this-> getLoans(10),
            'n' =>1,
            'loan' =>$loan,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
        $this->loan = $loan; //new loan object created
        $this->loan->fill($request->all()); //data retrived
        $this->loan->created_by = Auth::User()->id; //user created
        // if(!$request->file('image')==''){
        //     $this->imageSupport->deleteImg('loans',$this->loan->image);
        //     $image = $this->imageSupport->saveAnyImg($request,'loans','image',$this->imageHeight,$this->imageWidth);
        //     $this->loan->image =$image;
        // }

        if ($this->loan->save()){
            Toastr::success('Successfully 1 loan has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('loan.index')->with('success','Successfully 1 loan has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $loan = Loan::find($id);

            $loan->delete();

            return redirect()->route('loan.index')->with('message', 'Report details has been successfully deleted');

        }
        }
