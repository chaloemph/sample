<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicleschedule;
use App\Shipschedule;
use App\Vehicleschedules;
use App\Trip;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $vehicles = array(
            'go_vehicleschedules' => Vehicleschedule::Where('type','go')
            ->orderBy('vehicle_id')
            ->get(),
            'back_vehicleschedules' => Vehicleschedule::Where('type','back')
            ->orderBy('vehicle_id')
            ->get(),
        );

        $ships = array(
            'go_shipschedule' => Shipschedule::Where('type','go')
            ->orderBy('ship_id')
            ->get(),
            'back_shipschedule' => Shipschedule::Where('type','back')
            ->orderBy('ship_id')
            ->get(),
        );
        

        return view('dashboard.schedule.index', compact('vehicles', 'ships'));
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
        //
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
        //
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

    public function changeshipstatus(Request $request)
    {
        $shipschedule = Shipschedule::find($request->id);
        $shipschedule->status = ($shipschedule->status === 1)? 0:1;
        $shipschedule->save();
        return response()->json(array($request->all()), 200);
    }

    public function changevehiclestatus(Request $request)
    {
        $vehicleschedule = Vehicleschedule::find($request->id);
        $vehicleschedule->status = ($vehicleschedule->status === 1)? 0:1;
        $vehicleschedule->save();
        return response()->json(array($request->all()), 200);
    }

    public function changetripstatus(Request $request)
    {
        $trip = Trip::find($request->id);
        $trip->status = ($trip->status === 1)? 0:1;
        $trip->save();
        return response()->json(array($request->all()), 200);
    }

    public function changetripprice(Request $request)
    {
        $trip = Trip::find($request->id);
        $trip->price = $request->price;
        $trip->save();
        return response()->json(array($request->all()), 200);
    }
}
