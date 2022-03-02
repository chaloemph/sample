<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shiptype;
use App\Ship;
use App\Shipschedule;

class ScheduleShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ships = array(
            'go_shipschedule' => Shipschedule::Where('type','go')
            ->orderBy('starttime')
            ->get(),
            'back_shipschedule' => Shipschedule::Where('type','back')
            ->orderBy('starttime')
            ->get(),
        );
        

        return view('dashboard.shipschedule.index', compact('ships'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $shiptypes = Shiptype::all();
        $ships = Ship::all();
        $types = array('go','back');
        
        return view('dashboard.shipschedule.create', compact('shiptypes', 'ships', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shipschedule = new Shipschedule();
        $shipschedule->starttime = $request->starttime;
        $shipschedule->starttime_expected = $request->starttime_expected;
        $shipschedule->startpoint = $request->startpoint;
        $shipschedule->endpoint = $request->endpoint;
        $shipschedule->ship_id = $request->ship_id;
        $shipschedule->type = $request->type;
        $shipschedule->save();
        

        return redirect()->route('dashboard.shipschedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shipschedule = Shipschedule::find($id);
        $shiptypes = Shiptype::all();
        $ships = Ship::all();
        $types = array('go','back');
        return view('dashboard.shipschedule.show', compact('shiptypes', 'ships', 'types', 'shipschedule'));
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
        $shipschedule = Shipschedule::find($id);
        $shipschedule->starttime = $request->starttime;
        $shipschedule->starttime_expected = $request->starttime_expected;
        $shipschedule->startpoint = $request->startpoint;
        $shipschedule->endpoint = $request->endpoint;
        $shipschedule->ship_id = $request->ship_id;
        $shipschedule->type = $request->type;
        $shipschedule->save();
        

        return redirect()->route('dashboard.shipschedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipschedule = Shipschedule::destroy($id);
        return redirect()->route('dashboard.shipschedules.index');
    }
}
