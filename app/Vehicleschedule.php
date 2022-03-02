<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vehicleschedule extends Model
{
    use SoftDeletes;
    public function vehicle()
    {
        return $this->hasMany('App\Vehicle', 'id' , 'vehicle_id');
    }

    public function vehiclepoint()
    {
        return $this->hasMany('App\Vehiclepoint', 'id' , 'vehiclepoint_id');
    }

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }
}
