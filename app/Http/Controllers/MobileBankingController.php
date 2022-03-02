<?php

namespace App\Http\Controllers;

use App\MobileBanking;
use App\Booking;
use App\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class MobileBankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $booking = Booking::Where('uuid',$id)->get()->first();

        $sum = 0;

        if((isset($booking->shipschedulesgo) || isset($booking->shipschedulesback))){
            if ($booking->tour_type === 'oneway') {
                if ($booking->tour_type_oneway === 'go') {
                    $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
                } else {
                    $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
                }
            } else {
                $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
                $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
            }
        }

        // dd($booking->tour_type_oneway);
        

        if((isset($booking->vehicleschedules_go) || isset($booking->vehicleschedules_back))){
            if ($booking->tour_type === 'oneway') {
                if ($booking->tour_type_oneway === 'go') {
                    if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
                        $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;   
                    } else {
                        $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
                    } 
                } else {
                    if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2) {
                        $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   
                    } else {
                        $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
                    } 
                }
            } else {
                if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
                    $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;  
                    $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   

                } else {
                    $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
                    $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
                }
            }
        }



    
        if((isset($booking->trip_id))){
        // ราคาเหมาทริป
            if ($booking->trip->triptype_id === 2) {
                $sum += $booking->trip->price * $booking->trip_rent_amount;
            } else {
                $sum += $booking->trip->price * $booking->adult;
            }
        }

        $insurances = 0;
        if(isset($booking->insurance_amount) ) {
            $insurances = Insurance::where('booking_id', $booking->id)->get();
            foreach($insurances as $insurance) {
                $sum += 150;
            }
        }
        return view('booking.mobilebanking', compact('booking','sum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request , $id = null)
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
     * @param  \App\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function show(MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function edit(MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MobileBanking $mobileBanking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MobileBanking  $mobileBanking
     * @return \Illuminate\Http\Response
     */
    public function destroy(MobileBanking $mobileBanking)
    {
        //
    }
}
