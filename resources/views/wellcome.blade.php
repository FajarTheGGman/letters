@extends('template.header')
<body id='page-top'>
    <div class='row bg-gradient-primary justify-content-between'>
        <div class='row ml-5 mt-2 pt-2 pb-2'>
            <img src="{{ url('assets/favicon.png') }}" width="50" height="50" />
        </div>

        <div class='row mr-5 align-items-center'>
            <a href={{ route('login') }} class='bg-white p-2 pl-3 pr-3 rounded-top rounded-bottom rounded-start rounded-end'>Mulai</a>
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
    @extends('template.js')
</body>
