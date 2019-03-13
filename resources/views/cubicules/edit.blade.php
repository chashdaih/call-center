@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ __('Edit Cubicule') }}</h1>
            <div class="card">
                <div class="card-header">{{ __('Edit') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('cubicules.update', $cubicule->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group row">
                            <label for="office_id" class="col-md-4 col-form-label text-md-right">{{ __('Office') }}</label>

                            <div class="col-md-6">
                                <select id="office_id"
                                 class="form-control{{ $errors->has('office_id') ? ' is-invalid' : '' }}" 
                                 name="office_id" value="{{ $cubicule->office->id }}" required>
                                    @foreach ($offices as $office)
                                    <option {{ $office->id == $cubicule->office->id ? 'selected' : '' }}
                                     value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    name="name" value="{{ $cubicule->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection