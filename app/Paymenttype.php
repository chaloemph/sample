<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymenttype extends Model
{
    //
    public function payments()
    {
        return $this->hasMany('App\Payment', 'paymenttype_id', 'id');
    }
}
