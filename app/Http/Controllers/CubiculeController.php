<?php

namespace App\Http\Controllers;

use App\Cubicule;
use App\Office;
use Illuminate\Http\Request;

class CubiculeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cubicules = Cubicule::orderBy('office_id', 'asc')->get();

        return view('cubicules.index', compact('cubicules'));
    }

    public function cuboff() {
        $off = request()->route()->parameter('off');
        $cubs = Cubicule::where('office_id', $off)->get();
        return $cubs;
    }

    public function create()
    {
        $offices = Office::all();

        return view('cubicules.create', compact('offices'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validateCubicule();

        Cubicule::create($attributes);

        return redirect('cubicules');
    }

    public function edit(Cubicule $cubicule)
    {
        $offices = Office::all();

        return view('cubicules.edit', compact('offices', 'cubicule'));
    }

    public function update(Request $request, Cubicule $cubicule)
    {
        $cubicule->update($this->validateCubicule());

        return redirect('cubicules');
    }

    public function destroy(Cubicule $cubicule)
    {
        $cubicule->delete();

        return redirect('cubicules');
    }

    protected function validateCubicule()
    {
        return request()->validate([
            'office_id' => ['required', 'integer', 'exists:office,id'],
            'name' => 'required',
        ]);
    }
}
