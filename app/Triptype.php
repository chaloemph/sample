<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Triptype extends Model
{
    public function trips()
    {
        return $this->hasMany('App\Trip');
    }
}
