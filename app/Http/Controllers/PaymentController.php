<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Paymentbanking;
use App\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use App\Mail\PaymentNotificationMail;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Paymentbanking::all();
        return view('payment',compact('banks'));
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
        $booking = Booking::where('ref', $request->invoice_number)->get()->first();
        
        if(!$booking){
            request()->session()->flash("error" , ["ref"=>"ไม่พบเลขที่ใบจอง"]);
            return redirect()->back();
        } else{
            request()->session()->forget('error');
        }

        $payment = Payment::where('booking_id', $booking->id)->get()->first();

        if ($payment->paymenttype_id === 2) {
            request()->session()->flash("error" , ["ref"=>"ไม่พบเลขที่ใบจอง"]);
            return redirect()->back();
        } else{
            request()->session()->forget('error');
        }

        if ($payment->status === 1){
            request()->session()->flash("error" , ["ref"=>"ท่านเคยแจ้งชำระแล้ว อยู่ระหว่างการตรวจสอบข้อมูล"]);
            return redirect()->back();
        }else{
            request()->session()->forget('error');
        }


        $payment_time = Carbon::createFromFormat('d/m/Y G : i', $request->payment_date." ".$request->payment_time);
        $filename = "";
        if ($request->hasFile('attach_file')) {
            $file     = request()->file('attach_file');
            $filename = date('Y-m-d')."-".$booking->id."-".$file->getClientOriginalName();
            $path     = $request->file('attach_file')->move(public_path('images/payment/'), $filename);
            $attach_fileURL = url('images/payment/'.$filename);
        }
        

        $payment->payment_time = $payment_time;
        $payment->payment_amount = $request->payment_amount;
        $payment->note = $request->note;
        $payment->paymentbanking_id = $request->paymentbanking_id;
        $payment->attach_file = $filename;
        $payment->status = 1;
        $payment->save();

        try {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new PaymentNotificationMail($booking));
        } catch (Exception $ex) {

        } 

        return redirect()->back()->with('status' , 'แจ้งชำระเงินเรียบร้อยแล้ว');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function checking()
    {
        return view('paymentstatus');
    }

    public function checkingstatus(Request $request)
    {
        $booking = Booking::where('ref', $request->invoice_number)->get()->first();
        
        if(!$booking){
            request()->session()->flash("error" , ["ref"=>"ไม่พบเลขที่ใบจอง"]);
            return redirect()->back();
        }else{
            request()->session()->forget('error');
        }

        if($booking->status != 'paid' && $booking->status != 'success'){
            request()->session()->flash("error" , ["ref"=>"ไม่พบเลขที่ใบจอง"]);
            return redirect()->back();
        }else{
            request()->session()->forget('error');
        }

        $payment = Payment::where('booking_id', $booking->id)->get()->first();



        if($booking->status === 'success') {
            request()->session()->forget('error');
            request()->session()->flash("msg" , ["ref"=>"ท่านแจ้งชำระเรียบร้อยแล้ว"]);
        } else {
            request()->session()->forget('msg');
            if ($payment->status === 0) {
                request()->session()->flash("error" , ["ref"=>"ท่านยังไม่แจ้งชำระ"]);
    
            } else if ($payment->status === 1){
                request()->session()->flash("error" , ["ref"=>"ท่านเคยแจ้งชำระแล้ว อยู่ระหว่างการตรวจสอบข้อมูล"]);
            }
        }

        return redirect()->back();


        
    }

    public function howto()
    {
        return view('payment-howto');
    }
}
