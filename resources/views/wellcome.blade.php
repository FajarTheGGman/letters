<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Official Letter</title>

    <link href="{{ url("favicon.ico") }}" rel="icon" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://localhost:8000/assets/css/loading-bar.css"/>

    <!-- Custom fonts for this template-->
    <link href="{{ url("assets/vendor/fontawesome-free/css/all.min.css") }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url("assets/css/sb-admin-2.min.css") }}" rel="stylesheet">

</head>

<body style="overflow-x: hidden">
    <div class='row bg-gradient-primary justify-content-between'>
        <div class='row ml-5 mt-2 pt-2 pb-2'>
            <h1 class='text-white' style="font-family: 'Sacramento', cursive">Letters</h1>
        </div>

        <div class='row mr-5 align-items-center'>
            @if(session('email'))
                @if(session('level') == 'admin')
                    <a href={{ route('admin') }} class='bg-white p-2 pl-3 pr-3 rounded-top rounded-bottom rounded-start rounded-end'>Mulai</a>
                @else
                    <a href={{ route('dashboard') }} class='bg-white p-2 pl-3 pr-3 rounded-top rounded-bottom rounded-start rounded-end'>Mulai</a>
                @endif
            @else
                <a href={{ route('login') }} class='bg-white p-2 pl-3 pr-3 rounded-top rounded-bottom rounded-start rounded-end'>Mulai</a>
            @endif
        </div>
    </div>

    <div class='col' style="margin-top: 10%">
        <div class='row'>
            <div style="margin-left: 1%">
                <img src='{{ url('assets/illustrations/explain.png') }}' class='w-50' />
            </div>

            <div  style="margin-left: -6%">
                <h3>Apa itu `Letters` ?</h3>
                <p>Letters adalah sebuah sistem informasi <br>yang bertujuan untuk mempermudah <br> membuat surat secara digital <br> dan bisa juga di cetak / print</p>
            </div>
        </div>
    </div>

    <div class='col' style="margin-top: 10%">
        <div class='row'>
            <div style="margin-left: 1%">
                <img src='{{ url('assets/illustrations/features.png') }}' class='w-50' />
            </div>

            <div  style="margin-left: -6%">
                <h3>Apa saja fitur dari Letters ?</h3>
                <p>Letter mempunyai beberapa fitur
                <br>yang memudahkan membuat surat
                <br>Seperti Membuat template,
                <br>Menggunakan template, Mengirim surat
                <br>dan lain-lain
                </p>
            </div>
        </div>
    </div>

    <footer class='sticky-footer bg-primary'>
        <div class='container my-auto'>
            <div class='copyright text-center my-auto'>
                <span class='text-white'>Copyright &copy; 2021 By Fajar Firdaus</span>
            </div>
        </div>
    </footer>

    <div style="position: fixed; display: block; width: 100%; height: 100%; top: 0; left: 0; right: 0; bottom: 0;" class='bg-gradient-primary' id='loading'>
        <center style="margin-top: 17%">
            <h1 class='fas fa-envelope text-white'></h1>
            <h3 class='text-white'>Tunggu Sebentar...</h3>
        </center>
    </div>

    <script src="{{ url("assets/vendor/jquery/jquery.min.js") }}"></script>
    <script src="{{ url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url("assets/vendor/jquery-easing/jquery.easing.min.js") }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url("assets/js/sb-admin-2.min.js") }}"></script>

    <script src={{ url("assets/js/texteditor.js") }} referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        setTimeout(() => {
            $("#loading").fadeOut("slow");
        }, 3000)
    </script>
</body>
