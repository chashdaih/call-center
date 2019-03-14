@extends('layouts.app')

@section('content')
<div class="container">
        <h1>{{ $date }}</h1>
        <h2>{{ $office }}</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Cubículos
                    </th>
                    @foreach ($schedules as $schedule)
                    <th>{{ $schedule->time }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $cubicule => $items)
                    <tr>
                        <th>{{ $cubicule }}</th>
                        @foreach ($items as $item => $id)
                        <td>{{$id}}</td>
                            
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    {{-- <div class="row ">
        <div class="col-md">
            @foreach ($data as $date => $offices)
            <h1>{{ $date }}</h1>
            <div class="row">
                @foreach ($offices as $office => $cubicules)
                    <div class="col">
                        <h2>{{ $office }}</h2>
                        <div class="row">
                        @foreach ($cubicules as $cubicule => $schs)
                            <div class="col">
                                <h3>{{ $cubicule }}</h3>
                                @foreach ($schedules as $schedule)
                                    <div class="row">
                                        <p>{{$schedule->time}}</p>
                                        @foreach ($schs as $call)
                                            @if ($call->schedule->id == $schedule->id)
                                                <p> {{ $call->student->name }}</p>
                                            @endif
                                        @endforeach
                                    </div>
                                 @endforeach
                            </div>
                        @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
            @endforeach
    </div> --}}
</div>
@endsection