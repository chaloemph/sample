<?php

namespace App\Http\Controllers;

use App\Blogservice;
use Illuminate\Http\Request;

class BlogserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blogservice  $blogservice
     * @return \Illuminate\Http\Response
     */
    public function show(Blogservice $blog, $id = null)
    {
        $blog = Blogservice::find($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blogservice  $blogservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Blogservice $blogservice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blogservice  $blogservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blogservice $blogservice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blogservice  $blogservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blogservice $blogservice)
    {
        //
    }
}
