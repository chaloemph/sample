<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{

    public function shipschedules()
    {
        return $this->belongsTo('App\Shipschedule');
    }

    public function shiptype()
    {
        return $this->belongsTo('App\Shiptype', 'shiptype_id');
    }
}
