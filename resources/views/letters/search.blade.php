@extends('template.app')

@section('content')
    <div class='card'>
        <div class='card-body'>
            <h4 class='text-primary'><span class='fas fa-search pr-2'></span>Search Result ...</h4>
            @if( $data->count() == 0 )
                <center class='mt-5'>
                    <h1 class='fas fa-box-open'></h1>
                    <h4>Tidak Ditemukan !</h4>
                    <h5>Template Yang Di Cari Tidak Ditemukan</h5>
                </center>
            @else
                @foreach( $data as $x )
                    <a href={{ route('overview-letter', $x->id) }} class='card shadow mt-3' style='text-decoration: none; cursor: pointer'>
                        <div class='card-body d-flex justify-content-between'>
                            <div class='row ml-2'>
                                <h2 class='fas fa-envelope pr-2'></h2>
                                <h5 class='mt-1 ml-2'>{{ $x->title }}</h5>
                            </div>

                            <div>
                                <p class='text-secondary'>{{ $x->date }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection
