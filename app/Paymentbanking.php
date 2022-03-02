<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentbanking extends Model
{
    //
    public function payments()
    {
        return $this->hasMany('App\Payment', 'paymentbanking_id', 'id');
    }
}
