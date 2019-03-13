<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'call';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function office()
    {
        return $this->belongsTo('App\Office', 'office_id');
    }

    public function cubicule()
    {
        return $this->belongsTo('App\Cubicule', 'cubicule_id');
    }

    public function schedule()
    {
        return $this->belongsTo('App\Schedule', 'schedule_id');
    }

    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id');
    }

    public function caller()
    {
        return $this->belongsTo('App\Caller', 'caller_id');
    }

    public function reason()
    {
        return $this->belongsTo('App\Reason', 'reason_id');
    }
}
