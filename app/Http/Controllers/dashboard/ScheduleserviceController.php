<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Scheduleservice;

class ScheduleserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scheduleservices = Scheduleservice::all();
        return view('dashboard.scheduleservice.index', compact('scheduleservices'));
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
        $scheduleservice = Scheduleservice::find($id);
        return view('dashboard.scheduleservice.edit', compact('scheduleservice'));
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
        $scheduleservice = Scheduleservice::find($id);
        $scheduleservice->title = $request->title;
        $scheduleservice->description = $request->description;
        // if ($request->hasFile('attachfile')) {
        //     $file     = request()->file('attachfile');
        //     $filename = date('Y-m-d')."-".$scheduleservice->id."-".$file->getClientOriginalName();
        //     $path     = $request->file('attachfile')->move(public_path('images/scheduleservice/'), $filename);
        //     $attach_fileURL = url('images/scheduleservice/'.$filename);
        //     $scheduleservice->attachfile = $filename;

        // }
        $scheduleservice->save();
        return redirect()->route('dashboard.scheduleservices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
