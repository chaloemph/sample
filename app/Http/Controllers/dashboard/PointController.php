<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Startpoint;
use App\Endpoint;
use App\Vehiclepoint;
use DB;
use Illuminate\Database\Eloquent\SoftDeletes;


class PointController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $startpoints = Startpoint::all();
        $endpoints = Endpoint::all();
        $points = ['startpoints' => $startpoints, 'endpoints' => $endpoints];
        return view('dashboard.point.index', compact('startpoints', 'endpoints', 'points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $type = $request->type;
        $points = ['startpoint', 'endpoint'];
        return view('dashboard.point.create', compact('points', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = $request->type;
        if ($type === 'startpoints') {
            $point = new Startpoint();
        } else {
            $point = new Endpoint();
        }

        $point->name = $request->name;
        $point->status = 1;
        $point->save();

        // DB::table('vehiclepoints')->truncate();
        $startpoints = Startpoint::all();
        $endpoints = Endpoint::all();
        foreach($startpoints as $startpoint) {
            foreach($endpoints as $endpoint) {
                $vehiclepoint = Vehiclepoint::where('startpoint', $startpoint->name)
                ->where('endpoint', '=', $endpoint->name)
                ->first();

                if (!$vehiclepoint) {
                    Vehiclepoint::create([
                        'startpoint' => $startpoint->name,
                        'endpoint' => $endpoint->name,
                        'status' => 1,
                    ]);
                }
            }
        }
        

        return redirect()->route('dashboard.points.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $type = $request->type;
        if ($type === 'startpoints') {
            $point = Startpoint::find($id);
        } else {
            $point = Endpoint::find($id);
        }

        return view('dashboard.point.edit', compact('point', 'type'));        
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
        $type = $request->type;
        if ($type === 'startpoints') {
            $point = Startpoint::find($id);
            $vehicleUpdates = Vehiclepoint::where('startpoint', $point->name)->get();
            foreach($vehicleUpdates as $vehicleUpdate) {
                $vehicleUpdate->startpoint = $request->name;
                $vehicleUpdate->save();
            }
        } else {
            $point = Endpoint::find($id);
            $vehicleUpdates = Vehiclepoint::where('endpoint', $point->name)->get();
            foreach($vehicleUpdates as $vehicleUpdate) {
                $vehicleUpdate->endpoint = $request->name;
                $vehicleUpdate->save();
            }
        }


        $point->name = $request->name;
        $point->save();
        


        return redirect()->route('dashboard.points.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $type = $request->type;
        if ($type === 'startpoints') {
            $point = Startpoint::destroy($id);
            $pointDeleted = Startpoint::withTrashed()
            ->where('id', $id)
            ->get()
            ->first();
            $vehicleDeletes = Vehiclepoint::where('startpoint', $pointDeleted->name)->get();
        } else {
            $point = Endpoint::destroy($id);
            $pointDeleted = Endpoint::withTrashed()
            ->where('id', $id)
            ->get()
            ->first();
            $vehicleDeletes = Vehiclepoint::where('endpoint', $pointDeleted->name)->get();
        }

        foreach($vehicleDeletes as $vehicleDelete) {
            Vehiclepoint::destroy($vehicleDelete->id);
        }
    
        return redirect()->route('dashboard.points.index');
    }
}
