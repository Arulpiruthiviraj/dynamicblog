<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\App;
use Session;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts=Post::all();
       return view('admin.posts.index')->with('Posts',$Posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        if($categories->count()==0)
        {
          Session::flash('info','You must create a category before creating post :)');
           return redirect()->back(); 
        }
        return view('admin.posts.create')->with('categories',$categories)
                                              ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
                ]);

          //dd($request->all());
        $featured=$request->featured;
        $featured_new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$featured_new_name);

        $post=Post::create([
              'title'=>$request->title,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'content'=>$request->content,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title)

        ]);
       Session::flash('success','Posted successfully');
       $post->tags()->attach($request->tags);
       
        $post->save();
         return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Posts=Post::find($id);
        $categories=Category::all();
        return view('admin.posts.edit')->with('categories',$categories)->with('Posts',$Posts)
                                             ->with('tags',Tag::all());;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Posts=Post::find($id);
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
        ]);
        if($request->hasFile('featured'))
        {
            $featured=$request->featured;
            $featured_new_name=time().$featured->getClientOriginalName();
            $featured->move('uploads/posts',$featured_new_name);
        }
        $Posts->title=$request->title;
        $Posts->content=$request->content;
        $Posts->category_id=$request->category_id;
        $Posts->save();
        $Posts->tags()->sync($request->tags);
        Session::flash('success','Updated Post Successfully');
        return redirect()->route('post.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $Post= Post::find($id);
       $Post->delete();
       Session::flash('success','Your Post has been Trashed');
       return redirect()->back();
    }
    public function trash()
    {
        $Posts= Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('Posts',$Posts);
    }
    public function kill($id)
    {
        $Posts= Post::withTrashed()->where('id',$id)->first();
        $Posts->forceDelete();
        Session::flash('success','Deleted Post Permanently');
        return redirect()->back();
    }
    public function restore($id)
    {
        $Posts= Post::withTrashed()->where('id',$id)->first();
        $Posts->restore();
        Session::flash('success','Post Restored Successfully');
        return redirect()->back();
    }
}
