<?php

namespace App\Http\Controllers\Admin\Expense;

use App\Models\c;
use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Expense\Expense;

class ExpenseController extends Controller
{
    protected $folderName ='admin.expense.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $expense;

    function __construct( Expense $expense)
    {

            $this->middleware('auth');
            $this->expense = $expense;
            // $this->imageSupport =$imageSupport;
    }

    public function getExpenses($n){
        return Expense::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'expenses' => $this->getexpenses(10),
            'activePage' => 'expense_list',
            'page'=>'expense',
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
            'activePage' =>'expense_create',
            'page'=>'expense',
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
        $this->expense ->fill($request->all());

        $this->expense ->created_by = Auth::user()->id;
        if ($this->expense->save()){
            Toastr::success('Successfully 1 expense has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('expense.index')->with('success','Successfully 1 expense has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be expense created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'expense' =>$expense,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'expenses' => $this-> getexpenses(10),
            'n' =>1,
            'expense' =>$expense,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
        $this->expense = $expense; //new expense object created
        $this->expense->fill($request->all()); //data retrived
        $this->expense->created_by = Auth::User()->id; //user created


        if ($this->expense->save()){
            Toastr::success('Successfully 1 expense has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('expense.index')->with('success','Successfully 1 expense has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $expense = Expense::find($id);

            $expense->delete();

            return redirect()->route('expense.index')->with('message', 'report details has been successfully deleted');

        }
        }
