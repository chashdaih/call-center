<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cubicule extends Model
{
    protected $table = 'cubicule';

    protected $guarded = ["id"];

    public function office()
    {
        return $this->belongsTo('App\Office', 'office_id');
    }
}
