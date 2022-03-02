<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shipschedule extends Model
{
    use SoftDeletes;
    public function ship()
    {
        return $this->hasMany('App\Ship', 'id' , 'ship_id');
    }

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }
}
