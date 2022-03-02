<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use App\Payment;
use App\Insurance;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $booking_reservation_today = Booking::where('status', '!=', '0')
        ->whereDate('created_at' , date('Y-m-d'))
        ->count();

        $booking_reservation_recieve = Booking::where('status', '!=', '0')
        ->whereDate('created_at' , date('Y-m-d'))
        ->sum('sum');

        $booking_reservation_payment_today =  Payment::where('status', '!=', '0')
        ->count();
       
        $booking_reservation_all = Booking::where('status', '!=', '0')
        ->count();

        // $booking_today_checkin = Booking::where([
        //     'checkin_date' => date('Y-m-d'),
        //     'tour_type' => ['roundtrip'],
        // ]);
        
        // $booking_today_checkin_oneway_go = Booking::where([
        //     'checkin_date' => date('Y-m-d'),
        //     'tour_type' => ['oneway'],
        //     'tour_type_oneway' => ['go'],
        // ]);
        
        // $booking_today_checkin_oneway_back = Booking::where([
        //     'checkout_date' => date('Y-m-d'),
        //     'tour_type' => ['oneway'],
        //     'tour_type_oneway' => ['back'],
        // ]);

        // $payment_today = Payment::whereDate('updated_at', date('Y-m-d'))->count();

        // $booking_today = 0;
        // $booking_today += $booking_today_checkin->count();
        // $booking_today += $booking_today_checkin_oneway_go->count();
        // $booking_today += $booking_today_checkin_oneway_back->count();

        // $sum = 0;

        // $loop = [
        //     $booking_today_checkin,
        //     $booking_today_checkin_oneway_go,
        //     $booking_today_checkin_oneway_back
        // ];

        return view('dashboard.home', compact('booking_reservation_today', 'booking_reservation_recieve', 'booking_reservation_all', 'booking_reservation_payment_today'));
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
}
