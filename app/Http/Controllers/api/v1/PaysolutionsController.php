<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking;
use Mail;
use App\Mail\PaymentNotificationMail;


class PaysolutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $id = $request->all()[0]["ReferenceNo"];
        $recheck = $request->all()[0]["recheck"];
        $status = $request->all()[0]["StatusName"];
        $booking = Booking::find($id);
        if ($recheck != 'lipeferry@#') {
            $data = array('message' => 'failed', 'code'=> 401);
        } elseif(!$booking) {
            $data = array('message' => 'failed', 'code'=> 401);
        } else {
            if ($booking->status == 'paid' && $status == 'COMPLETE') {
                $booking->status = 'success';
                $booking->save();
            }
            $data = array('message' => 'success', 'code'=> 200 , 'data' => $booking);
        }

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PaymentNotificationMail($booking));
        } catch (Exception $ex) {

        } 

        return response()->json($data, 200);
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
