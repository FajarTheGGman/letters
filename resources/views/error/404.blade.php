@extends('template.app')

@section('content')
                <div class="container-fluid">

                    <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">Tidak ada apa -apa di sini bung</p>
                        @if(Session::get('role') == 'admin')
                            <a href="{{ route('admin') }}">&larr; Kembali Ke Dashboard</a>
                        @else
                            <a href="{{ route('dashboard') }}">&larr; Kembali Ke Dashboard</a>
                        @endif
                    </div>

                </div>
@endsection

