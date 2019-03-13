@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{ __('Schedule a new call') }}</h1>
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('calls.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date"
                                 class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" 
                                 name="date" value="{{ old('date', date('Y-m-d')) }}" required >

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="schedule_id" class="col-md-4 col-form-label text-md-right">{{ __('Schedule') }}</label>

                            <div class="col-md-6">
                                <select id="schedule_id"
                                 class="form-control{{ $errors->has('schedule_id') ? ' is-invalid' : '' }}" 
                                 name="schedule_id" value="{{ old('schedule_id') }}" required>
                                    @foreach ($schedules as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->time }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('schedule_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('schedule_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="office_id" class="col-md-4 col-form-label text-md-right">{{ __('Office') }}</label>

                            <div class="col-md-6">
                                <select id="office_id"
                                 class="form-control{{ $errors->has('office_id') ? ' is-invalid' : '' }}" 
                                 name="office_id" value="{{ old('office_id') }}" required>
                                    @foreach ($offices as $office)
                                    <option value="{{ $office->id }}">{{ $office->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('office_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('office_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cubicule_id" class="col-md-4 col-form-label text-md-right">{{ __('Cubicule') }}</label>

                            <div class="col-md-6">
                                <select id="cubicule_id"
                                 class="form-control{{ $errors->has('cubicule_id') ? ' is-invalid' : '' }}" 
                                 name="cubicule_id" value="{{ old('cubicule_id') }}" required>
                                    @foreach ($cubicules as $cubicule)
                                    <option value="{{ $cubicule->id }}">{{ $cubicule->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('cubicule_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cubicule_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="student_id" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>

                            <div class="col-md-6">
                                <select id="student_id"
                                 class="form-control{{ $errors->has('student_id') ? ' is-invalid' : '' }}" 
                                 name="student_id" value="{{ old('student_id') }}" required>
                                    @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name.' '.$student->last_name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('student_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('student_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="caller_id" class="col-md-4 col-form-label text-md-right">{{ __('Caller') }}</label>

                            <div class="col-md-6">
                                <select id="caller_id"
                                 class="form-control{{ $errors->has('caller_id') ? ' is-invalid' : '' }}" 
                                 name="caller_id" value="{{ old('caller_id') }}" required>
                                    @foreach ($callers as $caller)
                                    <option value="{{ $caller->id }}">{{ $caller->name.' '.$caller->last_name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('caller_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('caller_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reason_id" class="col-md-4 col-form-label text-md-right">{{ __('Reason') }}</label>

                            <div class="col-md-6">
                                <select id="reason_id"
                                 class="form-control{{ $errors->has('reason_id') ? ' is-invalid' : '' }}" 
                                 name="reason_id" value="{{ old('reason_id') }}" required>
                                    @foreach ($reasons as $reason)
                                    <option value="{{ $reason->id }}">{{ $reason->name }}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('reason_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reason_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="observation" class="col-md-4 col-form-label text-md-right">{{ __('Observations') }}</label>

                            <div class="col-md-6">
                                <textarea id="observation" 
                                 class="form-control{{ $errors->has('observation') ? ' is-invalid' : '' }}" 
                                 name="observation" value="{{ old('observation') }}" ></textarea>

                                @if ($errors->has('observation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('observation') }}</strong>
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
<script>
    window.onload = function(){
        $("#office_id").on('change', function() {
            var url = "cubs-office/" + $(this).val();
            $.get(url, function(data) {
                $("#cubicule_id").empty();
                for (var i = 0; i < data.length; i++) {
                    $("#cubicule_id").append($('<option>', {'value': data[i].id}).text(data[i].name));
                }
            });
        });
    };
</script>
@endsection