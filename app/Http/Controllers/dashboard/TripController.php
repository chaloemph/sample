<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trip;
use App\Triptype;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        $triptypes = Triptype::all();
        return view('dashboard.trip.index', compact('trips', 'triptypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $triptypes = Triptype::all();
        return view('dashboard.trip.create', compact('triptypes'));
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
        $trip = new Trip();
        $trip->name = $request->name;
        $trip->price = $request->price;
        $trip->triptype_id = $request->triptype_id;
        $trip->save();

        $trips = Trip::all();
        return view('dashboard.trip.index', compact('trips'));

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
        $trip = Trip::find($id);
        $triptypes = Triptype::all();
        return view('dashboard.trip.show', compact('trip', 'triptypes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd(44);
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
        $trip = Trip::find($id);
        $trip->name = $request->name;
        $trip->price = $request->price;
        $trip->triptype_id = $request->triptype_id;
        $trip->save();

        $trips = Trip::all();
        return redirect()->route('dashboard.trips.index');

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
        $trip = Trip::destroy($id);
        return redirect()->route('dashboard.trips.index');
        
    }
}
