<?php

namespace App\Http\Controllers\Admin\Blog;

use Illuminate\Http\Request;
use App\Support\ImageSupport;
use App\Models\Admin\Blog\Blog;

use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;
use Kamaln7\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;




class BlogController extends Controller
{

        protected $folderName = 'admin.blog.';
        protected $imageWidth = 450;
        protected $imageHeight= 450;
        protected $imageSupprot;
        protected $blog;
        function __construct(ImageSupport $imageSupprot, Blog $blog)
        {
            $this->middleware('auth');
            $this->blog = $blog;
            $this->imageSupprot=$imageSupprot;
        }
        public function getBlogs($n)
        {
            return Blog::orderByDesc('created_at')->paginate($n);
        }

        public function index()
        {
            //
            return view($this->folderName.'index', [
                'blogs'=>$this->getBlogs(10),
                'activePage'=>'blog_list',
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
            return view($this->folderName.'form', [
                'activePage'=>'blog_create',
                'page'=>'blog',
            ]);
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(BlogRequest $request)
        {
            //
            // $a=
             $this->blog->fill($request->all());
            // dd($a);
            if(!$request->file('image')==''){
                $this->blog->image = $this->imageSupprot->saveAnyImg($request, 'blog', 'image', $this->imageWidth, $this->imageHeight);
            }
            // if(!$request->has('status')){
            //     $this->blog->status=false;
            // }
            if($this->blog->save()){
                Toastr::success('Successfully 1 blog has added', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
                return redirect()->route('blog.index')->with('success', 'Successfully 1 blog has added');
            }
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Admin\blog\blog  $blog
         * @return \Illuminate\Http\Response
         */
        public function show(Blog $blog)
        {
            //
            return view($this->folderName.'show',[
                'activePage' =>'blog',
                'blog'=>$blog,
            ]);
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Admin\blog\blog  $blog
         * @return \Illuminate\Http\Response
         */
        public function edit(Blog $blog)
        {
            //
            return view($this->folderName.'form', [
                'activePage'=>'blog_create',
                'page'=>'blog',
                'blog'=>$blog,
            ]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Admin\blog\blog  $blog
         * @return \Illuminate\Http\Response
         */
        public function update(BlogRequest $request, Blog $blog)
        {
            //
            $this->blog=$blog;
            $this->blog->fill($request->all());
            if(!$request->file('image')==''){
                $this->imageSupprot->deleteImg('blog', $this->blog->image);
                $this->blog->image = $this->imageSupprot->saveAnyImg($request, 'blog', 'image', $this->imageWidth, $this->imageHeight);
            }
            if(!$request->has('status')){
                $this->blog->status=false;
            }
            if($blog->save()){
                Toastr::success('Successfully 1 blog has updated', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
                return redirect()->route('blog.index')->with('success', 'Successfully 1 blog has updated');
            }
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Admin\blog\blog  $blog
         * @return \Illuminate\Http\Response
         */
        public function destroy(BlogRequest $request)
        {
            //
            // if($blog->delete()){
            //     Toastr::success('Successfully 1 blog has deleted', 'Success !!!!', ['positionClass'=>'toast-bottom-right']);
            //     return redirect()->route('blog.index')->with('success', 'Successfully 1 blog has deleted');
            // }
            $user = DB::table('blogs')->where('id',$request->id)->delete();
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Data Deleted'
                ]
            );
        }
        }
