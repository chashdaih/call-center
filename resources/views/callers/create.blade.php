@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Registrar persona que ha marcado</h1>
        {{-- @if ($errors->any())
        <div class="notification is-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('callers.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                 class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                 name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text"
                                 class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                 name="last_name" value="{{ old('last_name') }}"  required>

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">{{ __('Age') }}</label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="0" max="127"
                                 class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}"
                                 name="age" value="{{ old('age') }}"  required>

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" 
                                 class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" 
                                 name="phone_number" value="{{ old('phone_number') }}" required>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="other_phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Another Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="other_phone_number" type="tel" 
                                 class="form-control{{ $errors->has('other_phone_number') ? ' is-invalid' : '' }}" 
                                 name="other_phone_number" value="{{ old('other_phone_number') }}">

                                @if ($errors->has('other_phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('other_phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <select id="state_id"
                                 class="form-control{{ $errors->has('state_id') ? ' is-invalid' : '' }}" 
                                 name="state_id" value="{{ old('state_id') }}" required>
                                    @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('state_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text"
                                 class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" 
                                 name="city" value="{{ old('city') }}" required>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file_number" class="col-md-4 col-form-label text-md-right">{{ __('File Number') }}</label>

                            <div class="col-md-6">
                                <input id="file_number" type="number"
                                 class="form-control{{ $errors->has('file_number') ? ' is-invalid' : '' }}" 
                                 name="file_number" value="{{ old('file_number') }}" required>

                                @if ($errors->has('file_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('file_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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