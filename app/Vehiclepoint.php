<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vehiclepoint extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['startpoint', 'endpoint'];


    public function vehicleschedules()
    {
        return $this->belongsTo('App\Vehicleschedule');
    }
}
