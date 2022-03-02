<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ship;
use App\Shiptype;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships = Ship::all();
        $shiptypes = Shiptype::all();
        return view('dashboard.ship.index', compact('ships', 'shiptypes'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shiptypes = Shiptype::all();
        $ships = Ship::all();
        $types = array('go','back');
        return view('dashboard.ship.create', compact('shiptypes', 'ships', 'types'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ship = new Ship();
        $ship->name = $request->name;
        $ship->shiptype_id = $request->shiptype_id;
        $ship->price = $request->price;
        $ship->save();

        return redirect()->route('dashboard.ships.index');

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
        $ship = Ship::find($id);
        $shiptypes = Shiptype::all();
        $ships = Ship::all();
        $types = array('go','back');
        return view('dashboard.ship.edit', compact('shiptypes', 'ships', 'types', 'ship'));
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
        $ship = Ship::find($id);
        $ship->name = $request->name;
        $ship->shiptype_id = $request->shiptype_id;
        $ship->price = $request->price;
        $ship->save();

        return redirect()->route('dashboard.ships.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ship = Ship::destroy($id);
        return redirect()->route('dashboard.ships.index');
    }
}
