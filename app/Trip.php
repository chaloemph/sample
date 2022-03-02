<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Trip extends Model
{
    use SoftDeletes;

    public function triptype()
    {
        return $this->belongsTo('App\Triptype', 'triptype_id', 'id');
    }
}
