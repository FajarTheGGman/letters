<html>
    <head>
        <title>{{ $title }}</title>
    </head>

<style>

</style>

    <body>
        @if( $banner == 'none.png' )
            <div>
                <center>
                    <h2 style="color: {{ $tone_title }}">{{ $title }}</h2>
                    <p style="margin-top: -2%">{{ $alamat }}</p>
                    <p style="margin-top: -1.5%">{{ $desc }}</p>
                </center>
            </div>
        @else
            <div class='header'>
                <div>
                    <img src={{ $banner }} width='90px' height='90px' />
                </div>
                <div style='position: absolute; top: -5; left: 70'>
                    <h2 style="color: {{ $tone_title }}">{{ $title }}</h2>
                    <p style="margin-top: -2%">{{ $alamat }}</p>
                    <p style="margin-top: -1%">{{ $desc }}</p>
                </div>
            </div>
        @endif
        <hr style="margin-top: 2%">
        {!! $body !!}
    </body>
</html>
