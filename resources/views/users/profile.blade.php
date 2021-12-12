@extends('template.app')

@section('content')
    <div class='card shadow'>
        <div class='card-body'>
            <center>
            <img class="img-profile rounded-circle" width="80" height="80" src="{{ url("assets/img/undraw_profile.svg")}}">
            <h3 class='mt-3 text-primary'>{{ $data->firstname }} {{ $data->lastname }}</h3>
            @if($data->level == 'admin')
                <h5 class='text-warning'>{{ $data->role }}</h5>
            @else
                <h5 class='text-secondary'>{{ $data->role }}</h5>
            @endif
            </center>
        </div>
    </div>
@endsection
