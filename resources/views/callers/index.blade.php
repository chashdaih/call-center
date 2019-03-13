@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{__("Callers List")}}</h1>
            <h3><a href="{{ route('callers.create') }}">{{ __('Register New Caller') }}</a></h3>
            @if (count($callers)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('File Number') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Last Name') }}</th>
                        <th scope="col">{{ __('Age') }}</th>
                        <th scope="col">{{ __('Phone Number') }}</th>
                        <th scope="col">{{ __('Another Phone Number') }}</th>
                        <th scope="col">{{ __('State') }}</th>
                        <th scope="col">{{ __('City') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($callers as $caller)
                    <tr>
                        <th  class="align-middle" scope="row">{{ $caller->file_number }}</th>
                        <td class="align-middle">{{ $caller->name }}</td>
                        <td class="align-middle">{{ $caller->last_name }}</td>
                        <td class="align-middle">{{ $caller->age }}</td>
                        <td class="align-middle">{{ $caller->phone_number }}</td>
                        <td class="align-middle">{{ $caller->other_phone_number }}</td>
                        <td class="align-middle">{{ $caller->state->name }}</td>
                        <td class="align-middle">{{ $caller->city }}</td>
                        <td class="align-middle" ><a  href="{{ route('callers.edit', $caller->id) }}">{{ __("Edit") }}</a></td>
                        <td class="align-middle">
                            <form action="{{ route('callers.destroy', $caller->id) }}" method="POST">
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
            <p>{{ __("There are no registered people") }}</p>
            @endif
        </div>
    </div>
</div>
@endsection