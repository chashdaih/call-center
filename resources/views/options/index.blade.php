@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ ucfirst(__($model_name)) }}s registrados</h1>
            <h3><a href="/options/{{ $model_name }}/create">Registrar nuevo {{ __($model_name) }}</a></h3>
            @if (count($data)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data as $entry)
                    <tr>
                        <td class="align-middle">{{ $entry->name }}</td>
                        <td class="align-middle" ><a href="/options/{{ $model_name }}/{{ $entry->id }}/edit">{{ __('Edit') }}</a></td>
                        <td class="align-middle">
                            <form action="/options/{{ $model_name }}/{{ $entry->id }}" method="POST">
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
            <p>No se ha registrado ningún {{ $model_name }}</p>
            @endif
        </div>
    </div>
</div>
@endsection