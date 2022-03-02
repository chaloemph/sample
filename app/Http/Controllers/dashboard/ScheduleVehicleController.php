<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vehicletype;
use App\Vehicle;
use App\Vehicleschedule;
use App\Vehiclepoint;
use App\Startpoint;
use App\Endpoint;

class ScheduleVehicleController extends Controller
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
            ->orderBy('starttime')
            ->get(),
            'back_vehicleschedules' => Vehicleschedule::Where('type','back')
            ->orderBy('starttime')
            ->get(),
        );
        
        $vehiclepoints =  Vehiclepoint::all();
        
        $vehicletypes = Vehicletype::all();
        

        return view('dashboard.vehicleschedule.index', compact('vehicles', 'vehiclepoints', 'vehicletypes'));
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
        $vehiclepoints = Vehiclepoint::all();

        return view('dashboard.vehicleschedule.create', compact('vehicletypes', 'vehicles', 'types', 'vehiclepoints'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicleschedule = new Vehicleschedule();
        $vehicleschedule->starttime = $request->starttime;
        $vehicleschedule->starttime_expected = $request->starttime_expected;
        $vehicleschedule->vehicle_id = $request->vehicle_id;
        $vehicleschedule->type = $request->type;
        $vehicleschedule->vehiclepoint_id = $request->vehiclepoint_id;
        $vehicleschedule->save();

        return redirect()->route('dashboard.vehicleschedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicleschedule = Vehicleschedule::find($id);
        $vehicletypes = Vehicletype::all();
        $vehicles = Vehicle::all();
        $types = array('go','back');
        $vehiclepoints = Vehiclepoint::all();
        return view('dashboard.vehicleschedule.show', compact('vehicletypes', 'vehicles', 'types', 'vehiclepoints', 'vehicleschedule'));
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
        $vehicleschedule = Vehicleschedule::find($id);
        $vehicleschedule->starttime = $request->starttime;
        $vehicleschedule->starttime_expected = $request->starttime_expected;
        $vehicleschedule->vehicle_id = $request->vehicle_id;
        $vehicleschedule->type = $request->type;
        $vehicleschedule->vehiclepoint_id = $request->vehiclepoint_id;
        $vehicleschedule->save();

        return redirect()->route('dashboard.vehicleschedules.index', ['fillter'=> $vehicleschedule->vehiclepoint_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleschedule = Vehicleschedule::destroy($id);
        return redirect()->route('dashboard.vehicleschedules.index');
    }
}
