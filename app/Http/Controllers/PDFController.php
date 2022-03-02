<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Booking;
use App\Insurance;
use App\Payment;
use App\Paymenttype;
use Illuminate\Support\Str;


class PDFController extends Controller
{
    //
    public function index(Request $request , $id)
    {


        // dd( Paymenttype::with('payments')->get() );
        $booking = Booking::Where('uuid',$id)->get()->first();

        // $booking = Booking::with('payment')->where('id' , $id)->get();
        $insurances = Insurance::where('booking_id', $booking->id);
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

        if( isset($booking->insurance_amount) ) {
            $insurances = Insurance::where('booking_id', $booking->id)->get();
            foreach($insurances as $insurance) {
                $sum += 150;
            }
        }
        
        $ip = 'http://'.$request->ip();
        return view('pdf', compact('booking', 'sum', 'ip'));
    }

    public function success(Request $request , $id)
    {


        // dd( Paymenttype::with('payments')->get() );
        $booking = Booking::Where('uuid',$id)->get()->first();

        // $booking = Booking::with('payment')->where('id' , $id)->get();
        $insurances = Insurance::where('booking_id', $booking->id);
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

        if( isset($booking->insurance_amount) ) {
            $insurances = Insurance::where('booking_id', $booking->id)->get();
            foreach($insurances as $insurance) {
                $sum += 150;
            }
        }
        
        $ip = 'http://'.$request->ip();
        return view('invoice', compact('booking', 'sum', 'ip'));
    }
}
