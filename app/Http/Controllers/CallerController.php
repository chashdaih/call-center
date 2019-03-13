<?php

namespace App\Http\Controllers;

use App\Caller;
use App\State;
use Illuminate\Http\Request;

class CallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $callers = Caller::orderBy('file_number', 'desc')->get();

        return view('callers.index', compact('callers'));
    }

    public function create()
    {
        $states = State::all();

        return view('callers.create', compact('states'));
    }


    public function store(Request $request)
    {
        $attributes = $this->validateCaller();

        Caller::create($attributes);

        return redirect('callers');
    }

    public function edit(Caller $caller)
    {
        $states = State::all();
        return view('callers.edit', compact('caller', 'states'));
    }

    public function update(Request $request, Caller $caller)
    {
        $caller->update($this->validateCaller());

        return redirect('callers');
    }

    public function destroy(Caller $caller)
    {
        $caller->delete();

        return redirect('callers');
    }

    protected function validateCaller()
    {
        return request()->validate([
            'name' => 'required',
            'last_name' => 'required',
            'age' => ['required', 'integer', 'min:0', 'max:127'],
            'phone_number' => 'required',
            'state_id' => ['required', 'integer', 'exists:state,id'],
            'city' => 'required',
            'file_number' => 'required'
        ]);
    }
}
