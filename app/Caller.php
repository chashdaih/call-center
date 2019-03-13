<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caller extends Model
{
    protected $table = 'caller';

    protected $guarded = [];

    public function state()
    {
        return $this->belongsTo('App\State', 'state_id');
    }
}
