<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $tags=Tag::all();
        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tag'=>'required'
        ]);
        //dd($request->all());
        $tags=new Tag;
        $tags->tag=$request->tag;
        $tags->save();
        Session::flash('success','You successfully created tag');
        return redirect()->route('tag.index');

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
        $tags=Tag::find($id);
        return view('admin.tags.edit')->with('tags',$tags);

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
        $tags=Tag::find($id);
        $tags->tag=$request->tag;
        $tags->save();
        session::flash('success','You successfully Updated Tag');
        return redirect()->route('tag.index');

        //return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags=Tag::find($id);
        $tags->delete();
        Session::flash('success','You successfully deleted tag');
        return redirect()->back();

    }
}
