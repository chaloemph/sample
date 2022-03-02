<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function vehicleschedules()
    {
        return $this->belongsTo('App\Vehicleschedule');
    }

    public function vehicletype()
    {
        return $this->belongsTo('App\Vehicletype');
    }
}
