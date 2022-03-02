<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Booking extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'startpoint_id',
        'endpoint_id',
    ];

    public function vehicleschedulego()
    {
        return $this->hasOne('App\Vehicleschedule', 'id', 'vehicleschedules_go')->withTrashed();
    }

    public function vehiclescheduleback()
    {
        return $this->hasOne('App\Vehicleschedule', 'id', 'vehicleschedules_back')->withTrashed();
    }

    public function shipschedulesgo()
    {
        return $this->hasOne('App\Shipschedule', 'id', 'shipschedules_go')->withTrashed();
    }

    public function shipschedulesback()
    {
        return $this->hasOne('App\Shipschedule', 'id', 'shipschedules_back')->withTrashed();
    }

    public function trip()
    {
        return $this->hasOne('App\Trip', 'id', 'trip_id')->withTrashed();
    }

    public function startpoint()
    {
        return $this->hasOne('App\Startpoint', 'id', 'startpoint_id')->withTrashed();
    }

    public function endpoint()
    {
        return $this->hasOne('App\Endpoint', 'id', 'endpoint_id')->withTrashed();
    }

    public function payment()
    {
        return $this->belongsTo('App\Payment', 'id' , 'booking_id');
    }

   
    public function insurances()
    {
        return $this->hasMany('App\Insurance');
    }





    

    // public function shipschedules()
    // {
    //     return $this->belongsTo('App\Shipschedule');
    // }
}
