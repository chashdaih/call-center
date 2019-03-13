@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{__("Calls List")}}, {{ $date }}</h1>
            <h3><a href="{{ route('calls.create') }}">{{ __('Schedule New Call') }}</a></h3>
            @if (count($calls)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Office') }}</th>
                        <th scope="col">{{ __('Cubicule') }}</th>
                        {{-- <th scope="col">{{ __('Date') }}</th> --}}
                        <th scope="col">{{ __('Time') }}</th>
                        <th scope="col">{{ __('Student') }}</th>
                        <th scope="col">{{ __('Caller') }}</th>
                        <th scope="col">{{ __('Reason') }}</th>
                        <th scope="col">{{ __('Called?') }}</th>
                        <th scope="col">{{ __('Observations') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($calls as $call)
                    <tr>
                        <td class="align-middle">{{ $call->cubicule->office->name }}</td>
                        <td class="align-middle">{{ $call->cubicule->name }}</td>
                        {{-- <td class="align-middle">{{ $call->date }}</td> --}}
                        <td class="align-middle">{{ $call->schedule->time }}</td>
                        <td class="align-middle">{{ $call->student->name.' '.$call->student->last_name }}</td>
                        <td class="align-middle">{{ $call->caller->name.' '.$call->caller->last_name }}</td>
                        <td class="align-middle">{{ $call->reason->name }}</td>
                        <td class="align-middle text-center">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check_called" data-id="{{ $call->id }}" {{ $call->called ? 'checked' : '' }}>
                                <label class="custom-control-label" for="check_called">{{ __('called') }}</label>
                            </div>
                        </td>
                        <td class="align-middle">{{ $call->observation }}</td>
                        <td class="align-middle" ><a  href="{{ route('calls.edit', $call->id) }}">{{ __("Edit") }}</a></td>
                        <td class="align-middle">
                            <form action="{{ route('calls.destroy', $call->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger">{{ __("Delete") }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <p>{{ __("There are no scheduled calls") }}</p>
            @endif
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#check_called').on('change', function() {
            // TODO disable check
            var id = $(this).data('id');
            var url = "/calls/called/" + id;
            var request = $.ajax({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                url: url,
                method: "PATCH"
            });
            request.done(function() {
                console.log('exito');
                //TODO re-enable check 
            });
            request.fail(function() {
                // TODO untoggle check
            });
        });
    };
</script>
@endsection