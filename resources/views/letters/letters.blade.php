@extends('template.app')

@section('content')
    <h4 class='text-primary'>Create new letter template</h4>
    <div class='card shadow'>
        <div class='card-body'>
            <form method='post' action={{ route('create') }} enctype='multipart/form-data'>
                @csrf
                <h5 class='text-dark'>Headers Letter</h5>
                <div class='input-group'>
                    <div class='input-group-prepend'>
                        <input class="input-group-text" type='color' id="x" style="padding: 5px; height: 38px" name='tone_title'>
                    </div>
                    <input class='form-control' placeholder='Judul' name='title' aria-describedby="x" />
                </div>
                <input class='form-control mt-3' placeholder="Alamat" name="alamat" />
                <input class='form-control mt-3' placeholder="Description" name='desc' />
                <input type='file' class='form-control mt-3 mb-3 pb-3' name='cover' />

                <h5 class='text-dark mt-3'>Body Letter</h5>
                <textarea id='editor' name='body'></textarea>
                <button class='btn btn-success mt-3' type='submit' >Create</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
          tinymce.init({
              selector: 'textarea#editor',
              menubar: true
            });

          tinymce.init({
              selector: 'textarea#header',
              menubar: true
          })

    </script>
    <script>
        if("{{ session('success') }}"){
            Swal.fire({
                title: 'Success',
                text: 'Berhasil Membuat Template Surat!'
                icon: 'success'
            })
        }
    </script>
@endsection
