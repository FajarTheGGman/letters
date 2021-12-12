@extends('template.app')

@section('content')
    <h4 class='text-primary'>Your Inbox</h4>
    <div class='card shadow'>
        <div class='card-body'>
            @foreach( $inbox as $x )
                <a href={{ route('inbox-overview-letter', $x->id) }} class='card shadow mt-3' style='text-decoration: none; cursor: pointer'>
                    <div class='card-body d-flex justify-content-between'>
                        <h5>From : {{ $x->from }}</h5>
                        <p>{{ $x->subject }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
