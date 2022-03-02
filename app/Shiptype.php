<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shiptype extends Model
{
    //
    public function ship()
    {
        return $this->hasMany('App\Ship');
    }
}
