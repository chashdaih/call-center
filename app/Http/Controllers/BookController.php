<?php

namespace App\Http\Controllers;

use App\Call;
use App\Office;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function welcome()
    {
        $calls = Call::where('date', ">=", date('Y-m-d'))
                        ->orderBy('date', 'asc')->get(); // TODO get only 5 days or so from today
        
        $dates = [];
        $offices = [];
        foreach ($calls as $call) {
            if(!in_array($call->date, $dates)){
                array_push($dates, $call->date);
            }
            if(!in_array($call->office, $offices)) {
                array_push($offices, $call->office);
            }
        }
        // dd($dates);

        // $offices = Office::all();
        // $initial_office = $offices[0];
        // $current_date = date('Y-m-d');

        return view('book', compact('calls'));
    }
}
