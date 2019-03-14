@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md">

            

            {{-- <h1>{{ __('Calls for Office').' '.$initial_office->name }}</h1>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="office_id">{{ __('Change Office') }}</label>
                <div class="col-md-4">
                    <select id="office_id" class="form-control" name="office_id">
                    @foreach ($offices as $office)
                        <option value="{{ $office->id }}">{{ $office->name }}</option>
                    @endforeach
                    </select>
                </div>
            </div> --}}
        </div>
        {{-- <div class="col-md">
            <h1>{{ __('Calls for Date').' '.$current_date }}</h1>
            <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right" for="date">{{ __('Change Date') }}</label>
                <div class="col-md-4">
                    <input id="date" type="date" class="form-control" name="date" value="{{ $current_date }}">
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection