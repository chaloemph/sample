<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function booking()
    {
        return $this->hasOne('App\Booking', 'id', 'booking_id');
    }

    public function paymenttype()
    {
        return $this->belongsTo('App\Paymenttype', 'paymenttype_id', 'id');
    }

    public function paymentbanking()
    {
        return $this->belongsTo('App\Paymentbanking', 'paymentbanking_id', 'id');
    }

    
}
