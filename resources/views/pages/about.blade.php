@extends('app')
@section('content')

    <div class="content">
        <div class="title">About Me!</div>
        <h3>People I Like:</h3>
        @if (count($people))
            <ul>
                @foreach ($people as $person)
                    <li>{{ $person }}</li>
                @endforeach
            </ul>
        @endif
    </div>



@stop