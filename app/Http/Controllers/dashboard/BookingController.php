<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Payment;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        $payments = Payment::where('paymenttype_id',2)->get('booking_id');
        $bookings = Booking::whereIn('status', ['paid', 'success'])
        ->whereNotIn('id', $payments)
        ->orderBy('id', 'desc')
        ->get();
        // foreach($bookings as $booking) {
        //     $insurances = $booking->insurances;
        //     $sum = 0;

        //     if((isset($booking->shipschedulesgo) || isset($booking->shipschedulesback))){
        //         if ($booking->tour_type === 'oneway') {
        //             if ($booking->tour_type_oneway === 'go') {
        //                 $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
        //             } else {
        //                 $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
        //             }
        //         } else {
        //             $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
        //             $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
        //         }
        //     }

        //     if((isset($booking->vehicleschedules_go) || isset($booking->vehicleschedules_back))){
        //         if ($booking->tour_type === 'oneway') {
        //             if ($booking->tour_type_oneway === 'go') {
        //                 if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
        //                     $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;   
        //                 } else {
        //                     $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
        //                 } 
        //             } else {
        //                 if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2) {
        //                     $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   
        //                 } else {
        //                     $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
        //                 } 
        //             }
        //         } else {
        //             if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
        //                 $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;  
        //                 $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   

        //             } else {
        //                 $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
        //                 $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
        //             }
        //         }
        //     }
        
        //     if((isset($booking->trip_id))){
        //     // ราคาเหมาทริป
        //         if ($booking->trip->triptype_id === 2) {
        //             $sum += $booking->trip->price * $booking->trip_rent_amount;
        //         } else {
        //             $sum += $booking->trip->price * $booking->adult;
        //         }
        //     }

        //     if( isset($booking->insurance_amount) ) {
        //         foreach($insurances as $insurance) {
        //             $sum += 150;
        //         }
        //     }
        //     $booking->sum = $sum;
        // }
        
        return view('dashboard.booking.index')->with("bookings" , $bookings);
    }

    public function indexmobilebanking()
    {
        $bookings = Booking::all();
        $payments = Payment::where('paymenttype_id',1)->get('booking_id');
        $bookings = Booking::whereIn('status', ['paid', 'success'])
        ->whereNotIn('id', $payments)
        ->orderBy('id', 'desc')
        ->get();
        // foreach($bookings as $booking) {
        //     $insurances = $booking->insurances;
        //     $sum = 0;

        //     if((isset($booking->shipschedulesgo) || isset($booking->shipschedulesback))){
        //         if ($booking->tour_type === 'oneway') {
        //             if ($booking->tour_type_oneway === 'go') {
        //                 $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
        //             } else {
        //                 $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
        //             }
        //         } else {
        //             $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
        //             $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
        //         }
        //     }

        //     if((isset($booking->vehicleschedules_go) || isset($booking->vehicleschedules_back))){
        //         if ($booking->tour_type === 'oneway') {
        //             if ($booking->tour_type_oneway === 'go') {
        //                 if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
        //                     $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;   
        //                 } else {
        //                     $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
        //                 } 
        //             } else {
        //                 if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2) {
        //                     $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   
        //                 } else {
        //                     $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
        //                 } 
        //             }
        //         } else {
        //             if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
        //                 $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;  
        //                 $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   

        //             } else {
        //                 $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
        //                 $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
        //             }
        //         }
        //     }
        
        //     if((isset($booking->trip_id))){
        //     // ราคาเหมาทริป
        //         if ($booking->trip->triptype_id === 2) {
        //             $sum += $booking->trip->price * $booking->trip_rent_amount;
        //         } else {
        //             $sum += $booking->trip->price * $booking->adult;
        //         }
        //     }

        //     if( isset($booking->insurance_amount) ) {
        //         foreach($insurances as $insurance) {
        //             $sum += 150;
        //         }
        //     }
        //     $booking->sum = $sum;
        // }
        
        return view('dashboard.booking.mobilebanking')->with("bookings" , $bookings);
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

    public function canclebooking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'cancle';
        $booking->save();
        return redirect()->back();
    }

    public function confirmbooking($id)
    {
        $booking = Booking::find($id);
        if($booking->status === 'paid'){
            $booking->status = 'success';
            $booking->save();
            return response()->json($booking, 200);    
        }else {
            $booking->status = 'paid';
            $booking->save();
            return response()->json($booking, 200);
        }
    }

    public function notesave(Request $request, $id)
    {
        $booking = Booking::find($id);
        $booking->note = $request->note;
        $booking->save();
        return response()->json($booking, 200);
    }
}
