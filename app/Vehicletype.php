<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicletype extends Model
{
    public function vehicle()
    {
        return $this->hasMany('App\Vehicle', 'id' , 'vehicletype_id');
    }
}
