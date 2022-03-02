<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Blogservice;
use File;

class BlogserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogservices = Blogservice::all();
        return view('dashboard.blogservice.index', compact('blogservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blogservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $blogservice = new Blogservice();
        $blogservice->save();
        $blogservice::find($blogservice->id);
        $blogservice->title = $request->title;
        $blogservice->description = $request->description;
        // if ($request->hasFile('attachfile')) {
        //     $file     = request()->file('attachfile');
        //     $filename = date('Y-m-d')."-".$blogservice->id."-".$file->getClientOriginalName();
        //     $path     = $request->file('attachfile')->move(public_path('images/blogservice/'), $filename);
        //     $attach_fileURL = url('images/blogservice/'.$filename);
        // }
        // $blogservice->attachfile = $filename;
        $blogservice->save();
        return redirect()->route('dashboard.blogservices.index');
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
        $blogservice = Blogservice::find($id);
        return view('dashboard.blogservice.edit', compact('blogservice'));
        
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
        $blogservice = Blogservice::find($id);
        $blogservice->title = $request->title;
        $blogservice->description = $request->description;
        // if ($request->hasFile('attachfile')) {
        //     $file     = request()->file('attachfile');
        //     $filename = date('Y-m-d')."-".$blogservice->id."-".$file->getClientOriginalName();
        //     $path     = $request->file('attachfile')->move(public_path('images/blogservice/'), $filename);
        //     $attach_fileURL = url('images/blogservice/'.$filename);
        //     $blogservice->attachfile = $filename;

        // }
        $blogservice->save();
        return redirect()->route('dashboard.blogservices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogservice = Blogservice::find($id);
        // $image_path = public_path()."/images/blogservice/".$blogservice->attachfile;  // Value is not URL but directory file path
        // if(File::exists($image_path)) {
        //     File::delete($image_path);
        // }
        
        $blogservice = Blogservice::destroy($id);
        return redirect()->route('dashboard.blogservices.index');
    }
}
