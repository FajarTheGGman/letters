@extends('template.app')

@section('content')
    <div class='card shadow'>
        <div class='card-body'>
            <h3 class='text-primary'>{{ $data->subject }}</h3>
            <div class='d-flex row justify-content-between ml-1 mr-2'>
                <p class='text-dark'>From: {{ $data->from }}</p>
                <p>{{ $data->date }}</p>
            </div>
            <div class='mt-3'>
                <a class='btn btn-danger shadow'><span class='fas fa-file-pdf'></span><span class='ml-1'>Lampiran</span></a>
            </div>

            <div class='mt-3'>
            {!! $data->body !!}
            </div>
        </div>
    </div>

@endsection
