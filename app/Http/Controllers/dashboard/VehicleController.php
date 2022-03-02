<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Vehicletype;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        $vehicletypes = Vehicletype::all();
        return view('dashboard.vehicle.index', compact('vehicles', 'vehicletypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicletypes = Vehicletype::all();
        $vehicles = Vehicle::all();
        $types = array('go','back');
        return view('dashboard.vehicle.create', compact('vehicletypes', 'vehicles', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->name = $request->name;
        $vehicle->vehicletype_id = $request->vehicletype_id;
        $vehicle->price = $request->price;
        $vehicle->save();

        return redirect()->route('dashboard.vehicles.index');
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
        $vehicle = Vehicle::find($id);
        $vehicletypes = Vehicletype::all();
        $vehicles = Vehicle::all();
        $types = array('go','back');
        return view('dashboard.vehicle.edit', compact('vehicletypes', 'vehicles', 'types', 'vehicle'));
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
        $vehicle = Vehicle::find($id);
        $vehicle->name = $request->name;
        $vehicle->vehicletype_id = $request->vehicletype_id;
        $vehicle->price = $request->price;
        $vehicle->save();

        return redirect()->route('dashboard.vehicles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::destroy($id);
        return redirect()->route('dashboard.vehicles.index');
    }
}
