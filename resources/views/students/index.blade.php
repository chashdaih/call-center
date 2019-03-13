@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>{{ __('Registered Students') }}</h1>
            <h3><a href="{{ route('students.create') }}">{{ __('Register New Student') }}</a></h3>
            @if (count($students)>0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">{{ __('Name') }}</th>
                        <th scope="col">{{ __('Last Name') }}</th>
                        <th scope="col">{{ __('E-Mail Address') }}</th>
                        <th scope="col">{{ __('Phone Number') }}</th>
                        <th scope="col">{{ __('Account Number') }}</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class="align-middle">{{ $student->name }}</td>
                        <td class="align-middle">{{ $student->last_name }}</td>
                        <td class="align-middle">{{ $student->email }}</td>
                        <td class="align-middle">{{ $student->phone_number }}</td>
                        <td class="align-middle">{{ $student->account_number }}</td>
                        <td class="align-middle" ><a  href="{{ route('students.edit', $student->id) }}">{{ __('Edit') }}</a></td>
                        <td class="align-middle">
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
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
            <p>{{ __('There are no registered students') }}</p>
            @endif
        </div>
    </div>
</div>
@endsection