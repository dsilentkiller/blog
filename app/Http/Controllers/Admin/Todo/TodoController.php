<?php

namespace App\Http\Controllers\Admin\Todo;


use Illuminate\Http\Request;
use App\Models\Admin\Todo\Todo;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    protected $folderName ='admin.todo.';
    // protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $todo;

    function __construct( Todo $todo)
    {

            $this->middleware('auth');
            $this->todo = $todo;
            // $this->imageSupport =$imageSupport;
    }

    public function getTodos($n){
        return Todo::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'todos' => $this->getTodos(10),
            'activePage' => 'todo_list',
            'page'=>'todo',
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
            'activePage' =>'todo_create',
            'page'=>'todo',
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
        $this->todo ->fill($request->all());

        $this->todo ->created_by = Auth::user()->id;
        if ($this->todo->save()){
            Toastr::success('Successfully 1 todo has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('todo.index')->with('success','Successfully 1 todo has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be todo created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'todo' =>$todo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'todos' => $this-> getTodos(10),
            'n' =>1,
            'todo' =>$todo,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        $this->todo = $todo; //new todo object created
        $this->todo->fill($request->all()); //data retrived
        $this->todo->created_by = Auth::User()->id; //user created


        if ($this->todo->save()){
            Toastr::success('Successfully 1 todo has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('todo.index')->with('success','Successfully 1 todo has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $todo = Todo::find($id);

            $todo->delete();

            return redirect()->route('todo.index')->with('message', 'report details has been successfully deleted');

        }
        }
