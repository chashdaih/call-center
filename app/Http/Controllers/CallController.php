<?php

namespace App\Http\Controllers;

use App\Call;
use App\Cubicule;
use App\Office;
use App\Schedule;
use App\Student;
use App\Caller;
use App\Reason;
use Illuminate\Http\Request;

class CallController extends Controller
{
    protected $date;

    public function __construct()
    {
        $this->middleware('auth');

        
    }
    
    public function index()
    {
        $this->date = request()->route()->parameter('date');
        // validate date
        if(is_null($this->date) || date('Y-m-d', strtotime($this->date)) !== $this->date) {
            $this->date = date('Y-m-d');
        }

        $calls = Call::where('date', $this->date)->get();

        return view('calls.index', ['calls' => $calls, 'date' => $this->date]);
    }

    public function create()
    {
        $offices = Office::all();
        $cubicules = Cubicule::where('office_id', 1)->get();
        $schedules = Schedule::all();
        $students = Student::all();
        $callers = Caller::all();
        $reasons = Reason::all();

        return view('calls.create', compact('offices', 'cubicules', 'schedules', 'students', 'callers', 'reasons'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validateCall();
        $attributes['called'] = false;

        Call::create($attributes);

        return redirect('calls');
    }

    public function edit(Call $call)
    {
        $offices = Office::all();
        $office_id = $call->cubicule->office->id;
        $cubicules = Cubicule::where('office_id', $office_id)->get();
        // dd($cubicules);
        $schedules = Schedule::all();
        $students = Student::all();
        $callers = Caller::all();
        $reasons = Reason::all();

        return view('calls.edit', compact('call', 'offices', 'cubicules', 'schedules', 'students', 'callers', 'reasons'));
    }

    public function update(Request $request, Call $call)
    {
        $call->update($this->validateCall());

        return redirect('calls');
    }

    public function called()
    {
        $id = request()->route()->parameter('id');
        $call = Call::where('id', $id)->first();
        $call->toggleCalled()->save();

        return response(200);
    }

    public function destroy(Call $call)
    {
        $call->delete();

        return redirect('calls');
    }

    protected function validateCall()
    {
        return request()->validate([
            'date' => 'required', // TODO validate format
            'schedule_id' => ['required', 'integer', 'exists:schedule,id'],
            'cubicule_id' => ['required', 'integer', 'exists:cubicule,id'], // TODO validate is available
            'student_id' => ['required', 'integer', 'exists:student,id'], // TODO validate student is free at that time
            'caller_id' => ['required', 'integer', 'exists:caller,id'], // TODO validate doesn't have other call at same time
            'reason_id' => ['required', 'integer', 'exists:reason,id'],
        ]);
    }
}
