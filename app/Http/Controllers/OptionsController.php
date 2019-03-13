<?php

namespace App\Http\Controllers;

// use App\Cubicule;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class OptionsController extends Controller
{

    protected $model;
    protected $model_name;
    protected $id;
    
    public function __construct()
    {
        $this->middleware('auth');
        $allowed_options = ['office', 'reason'];
        $this->model_name = request()->route()->parameter('model');
        $this->id = request()->route()->parameter('id');
        if (!in_array($this->model_name, $allowed_options)) {
            abort(404);
        }
        $this->model = app('App\\'.ucfirst($this->model_name));
    }

    public function index()
    {
        $data = $this->model::all();

        return view('options.index', ['data' => $data, 'model_name' => $this->model_name]);
    }

    public function create()
    {
        return view('options.create', ['model_name' => $this->model_name]);
    }

    public function store(Request $request)
    {
        $attrs = request()->validate(['name' => 'required']);

        $this->model::create($attrs);

        return redirect('options/'.$this->model_name);
    }

    public function edit()
    {
        $entry = $this->model::where('id', $this->id)->first();
        return view('options.edit', ['entry' => $entry, 'model_name' => $this->model_name]);
    }

    public function update()
    {
        $new_name = request()->validate(['name' => 'required'])['name'];
        $entry = $this->model::where('id', $this->id)->first();
        $entry->name = $new_name;
        $entry->save();

        return redirect('options/'.$this->model_name);
    }

    public function destroy()
    {
        $entry = $this->model::where('id', $this->id)->first();
        $entry->delete();

        return redirect('options/'.$this->model_name);
    }
}
