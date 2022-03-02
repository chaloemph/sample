<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Booking;
use App\Insurance;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $booking = $this->booking;
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
        if ($booking->statemail === 'paid') {
            return $this->view('pdf', compact('booking', 'sum'))->subject('ชำระค่าบริการหลีเป๊ะเฟอรี่ #'.$booking->ref) ;
        } else {
            return $this->view('invoice', compact('booking', 'sum'))->subject('ชำระค่าบริการหลีเป๊ะเฟอรี่ #'.$booking->ref) ;
        }
    }
}
