@extends('template.app')

@section('content')
    <h4 class='text-primary'>Your Inbox</h4>
    <div class='card shadow'>
        <div class='card-body'>
            @if( $inbox->count() == 0 )
                <center>
                    <h1 class='fas fa-box-open'></h1>
                    <h4>Inbox Masih Kosong !</h4>
                    <h5>Silahkan Mengirim Surat Untuk Mengisi Inbox</h5>
                </center>
            @else
                @foreach( $inbox as $x )
                    <a href={{ route('inbox-overview-letter', $x->id) }} class='card shadow mt-3' style='text-decoration: none; cursor: pointer'>
                        <div class='card-body d-flex justify-content-between'>
                            <h5>From : {{ $x->from }}</h5>
                            <p>{{ $x->subject }}</p>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection
