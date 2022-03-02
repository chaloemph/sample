<?php

namespace App\Http\Controllers;

use App\Scheduleservice;
use Illuminate\Http\Request;

class ScheduleserviceController extends Controller
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
     * @param  \App\dashboard\Scheduleservice  $scheduleservice
     * @return \Illuminate\Http\Response
     */
    public function show(Scheduleservice $scheduleservice, $id = null)
    {
        $blog = Scheduleservice::find($id);
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dashboard\Scheduleservice  $scheduleservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Scheduleservice $scheduleservice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dashboard\Scheduleservice  $scheduleservice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scheduleservice $scheduleservice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dashboard\Scheduleservice  $scheduleservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scheduleservice $scheduleservice)
    {
        //
    }
}
