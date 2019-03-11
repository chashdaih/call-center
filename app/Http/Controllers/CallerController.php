<?php

namespace App\Http\Controllers;

use App\Caller;
use Illuminate\Http\Request;

class CallerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callers = Caller::all();

        return view('callers.index', compact('callers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caller  $caller
     * @return \Illuminate\Http\Response
     */
    public function show(Caller $caller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caller  $caller
     * @return \Illuminate\Http\Response
     */
    public function edit(Caller $caller)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caller  $caller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caller $caller)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caller  $caller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caller $caller)
    {
        //
    }
}
