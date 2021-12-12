@extends('template.app')

@section('content')
    <div class='card shadow'>
        <div class='card-body'>
            <h3 class='text-primary'>{{ $data->subject }}</h3>
            <div class='d-flex row justify-content-between ml-1 mr-2'>
                <div>
                    <p class='text-dark'>From: {{ $data->from }}</p>
                </div>

                <div>
                    <p>{{ $data->date }}</p>
                </div>
            </div>
            <div class='mt-3'>
                <a class='btn btn-danger shadow'><span class='fas fa-file-pdf'></span><span class='ml-1'>Lampiran</span></a>
            </div>

            <div class='mt-3'>
            {!! $data->body !!}
            </div>

        </div>
        <div class='d-flex row justify-content-end mr-3 mb-3'>
            <a class='btn btn-danger shadow' href={{ route('inbox-delete', $data->id) }}><span class='fas fa-trash p-1'></span></a>
        </div>
    </div>

@endsection
