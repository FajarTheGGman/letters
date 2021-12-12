@extends('template.app')

@section('content')
    <h4 class='text-primary'>Send Letter</h4>
    <div class='card shadow'>
        <div class='card-body'>
            <form class='form-group' action={{ route('send-post-letter') }} method="post" enctype="multipart/form-data">
                @csrf
                <input class='form-control' name='subject' placeholder="Subject"/>
                <label class='form-label mt-3'>Send To :</label>
                <select id="to" name='role' class='form-control'>
                    <option disabled>Select Role To Send</option>
                    @foreach( $role as $x )
                        <option value={{ $x->name }}>{{ $x->name }}</option>
                    @endforeach
                </select>
                <label for="formFile" class="form-label mt-3">File Surat PDF</label>
                <input class="form-control mb-5 pb-4" name='file' type="file" id="formFile">
                <textarea name='body' id="editor" class='form-control mt-5'></textarea>
                <button class='btn btn-success mt-3' type='submit'>Send</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
          tinymce.init({
              selector: 'textarea#editor',
              menubar: false
            });
    </script>
@endsection
