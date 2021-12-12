<html>
    <head>
        <title>Blank Letters</title>
    </head>

<style>

</style>

    <body>
        <div class='header'>
            <div>
                <img src="https://idn-static-assets.s3-ap-southeast-1.amazonaws.com/school/10287.png" width='90px' height='90px' />
            </div>
            <div style='position: absolute; top: -5; left: 70'>
                <h2 style="color: {{ $tone_title }}">{{ $title }}</h2>
                <p style="margin-top: -2%">{{ $alamat }}</p>
                <p style="margin-top: -1%">{{ $desc }}</p>
            </div>
        </div>
        <hr style="margin-top: 2%">
        {!! $body !!}
    </body>
</html>
