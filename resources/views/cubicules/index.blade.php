@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{__('Registered Cubicules') }}</h1>
            <h3><a href="{{ route('cubicules.create') }}">{{ __('Register New Cubicule') }}</a></h3>
            @if (count($cubicules)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Office') }}</th>
                        <th scope="col">{{ __('Name') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($cubicules as $cubicule)
                    <tr>
                        <td class="align-middle">{{ $cubicule->office->name }}</td>
                        <td class="align-middle">{{ $cubicule->name }}</td>
                        <td class="align-middle" ><a href="{{ route('cubicules.edit', $cubicule->id) }}">{{ __('Edit') }}</a></td>
                        <td class="align-middle">
                            <form action="{{ route('cubicules.destroy', $cubicule->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-link text-danger">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
            <p>{{ __('There are no cubicules registered') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection