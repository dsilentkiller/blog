<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\Blog\Blog;

use App\Http\Requests\BlogRequest;

use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class BlogController extends Controller
{
    protected $folderName ='admin.blog.';
    protected $imageSupport;
    protected $imageHeight =459;
    protected $imageWidth =500;
    protected $blog;

    function __construct(ImageSupport $imageSupport, Blog $blog)
    {

            $this->middleware('auth');
            $this->blog = $blog;
            $this->imageSupport =$imageSupport;
    }

    public function getBlogs($n){
        return Blog::orderByDesc('created_at')->paginate($n);

    }

    public function index()
    {
        //
        return view($this->folderName.'index',[
            'blogs' => $this->getBlogs(10),
            'activePage' => 'blog_list',
            'page'=>'blog',
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
            'activePage' =>'blog_create',
            'page'=>'blog',
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
        $this->blog ->fill($request->all());
        $image = $this->imageSupport->saveAnyImg($request, 'blogs','image', $this->imageWidth,$this->imageHeight);
        $this->blog ->image =$image;
        $this->blog ->created_by = Auth::user()->id;
        if ($this->blog->save()){
            Toastr::success('Successfully 1 blog has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('blog.index')->with('success','Successfully 1 blog has added.');
        }
        else{
            return back()->withInput()->with('error','Couldnot be blog created ,please try again later');
        }
    }


    /**
 * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //

        return view($this->folderName.'show',[
            'activePage' =>'setting',
            'blog' =>$blog,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
        return view($this->folderName.'form',[
            'activePage' =>'site_setting',
            'blogs' => $this-> getBlogs(10),
            'n' =>1,
            'blog' =>$blog,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $this->blog = $blog; //new blog object created
        $this->blog->fill($request->all()); //data retrived
        $this->blog->created_by = Auth::User()->id; //user created
        if(!$request->file('image')==''){
            $this->imageSupport->deleteImg('blogs',$this->blog->image);
            $image = $this->imageSupport->saveAnyImg($request,'blogs','image',$this->imageHeight,$this->imageWidth);
            $this->blog->image =$image;
        }

        if ($this->blog->save()){
            Toastr::success('Successfully 1 blog has added','Success!!!', ['positionClass'=>'toast-bottom-right']);
            return redirect()->route('blog.index')->with('success','Successfully 1 blog has added.');
        }else{
            return back()->withInput()->with('error', 'Could not be saved ,please try again later');
        }
    }

        public function destroy(Request $request)
        {
            $id= $request->id;

            $blog = Blog::find($id);

            $blog->delete();

            return redirect()->route('blog.index')->with('message', 'Report details has been successfully deleted');

        }
        }
