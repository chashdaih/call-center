<?php

namespace App\Http\Controllers;

use App\Call;
use App\Cubicule;
use App\Schedule;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function welcome()
    {
        // $calls = Call::where('date', ">=", date('Y-m-d'))
        //                 ->orderBy('date', 'asc')->get(); // TODO get only 5 days or so from today
        // $schedules = Schedule::all();
        
        // $data = [];
        // setLocale(LC_TIME, 'spanish');
        // foreach ($calls as $call) {
        //     $date_key = ucfirst(strftime('%A %d', strtotime($call->date)));
        //     if(!array_key_exists($date_key, $data)){
        //         $data[$date_key] = [];
        //     } 
        //     $date_arr = $data[$date_key];
        //     $office_key = $call->cubicule->office->name;
        //     if(!array_key_exists($office_key, $date_arr)){
        //         $data[$date_key][$office_key] = [];
        //     }
        //     $office_arr = $data[$date_key][$office_key];
        //     $cub_key = $call->cubicule->name;
        //     if(!array_key_exists($cub_key, $office_arr)){
        //         $data[$date_key][$office_key][$cub_key] = [];
        //     }
        //     $cub_arr = $data[$date_key][$office_key][$cub_key];
        //     $sch_key = $call->schedule->time;
        //     $data[$date_key][$office_key][$cub_key][$sch_key] = $call;

        // }

        $cubicules = Cubicule::all();
        $schedules = Schedule::all();
        $date = "Jueves 14";
        $office = "PAPD";
        $calls = Call::where('date', date('Y-m-d'))->get();
        $data = [];
        foreach ($cubicules as $cubicule) {
            $space = [];
            foreach ($schedules as $schedule) {
                foreach ($calls as $call) {
                    if ($call->cubicule_id == $cubicule->id && $call->schedule_id == $schedule->id) {
                        // TODO fix
                        $space[$schedule->id] = "ocupado";
                    } else {
                        $space[$schedule->id] = null;
                    }
                }
            }
            $data[$cubicule->name] = $space;
        }

        return view('book', compact('calls', 'data', 'date', 'schedules', 'office'));
    }
}
