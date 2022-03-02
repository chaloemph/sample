<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blog;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('dashboard.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->save();
        $blog::find($blog->id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('attachfile')) {
            $file     = request()->file('attachfile');
            $filename = date('Y-m-d')."-".$blog->id."-".$file->getClientOriginalName();
            $path     = $request->file('attachfile')->move(public_path('images/blog/'), $filename);
            $attach_fileURL = url('images/blog/'.$filename);
        }
        $blog->attachfile = $filename;
        $blog->save();
        return redirect()->route('dashboard.blogs.index');
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
        $blog = Blog::find($id);
        return view('dashboard.blog.edit', compact('blog'));
        
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
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->description = $request->description;
        if ($request->hasFile('attachfile')) {
            $file     = request()->file('attachfile');
            $filename = date('Y-m-d')."-".$blog->id."-".$file->getClientOriginalName();
            $path     = $request->file('attachfile')->move(public_path('images/blog/'), $filename);
            $attach_fileURL = url('images/blog/'.$filename);
            $blog->attachfile = $filename;

        }
        $blog->save();
        return redirect()->route('dashboard.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $image_path = public_path()."/images/blog/".$blog->attachfile;  // Value is not URL but directory file path
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        
        $blog = Blog::destroy($id);
        return redirect()->route('dashboard.blogs.index');
    }
}
