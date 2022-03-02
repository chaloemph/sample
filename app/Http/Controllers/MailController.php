<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
use App\Booking;
use Illuminate\Support\Str;


class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = null)
    {
        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->statemail = "paid";
        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new TestMail($booking));
            Mail::to($booking->email)->send(new TestMail($booking));
            return redirect()->route('invoice', ['id'=> $booking->uuid]);
        } catch (Exception $ex) {
            return redirect()->route('invoice', ['id'=> $booking->uuid]);
        } 
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

    public function success($id = null)
    {
        $booking = Booking::find($id);
        $booking->status = 'success';
        $booking->save();
        $booking->statemail = "success";
        try {
            Mail::to($booking->email)->send(new TestMail($booking));
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new TestMail($booking));
            return redirect()->route('dashboard.bookings.index');
        } catch (Exception $ex) {
            return redirect()->route('dashboard.bookings.index');
        } 
    }
}
