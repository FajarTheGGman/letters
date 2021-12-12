@extends('template.app')

@section('content')
    <h4 class='text-primary'>Letters Template</h4>
    <div class='card shadow'>
        <div class='card-body'>
            <table class='table'>
                <tr>
                    <th>Title</th>
                    <th>Created at</th>
                    <th>Overview</th>
                    <th>Modify</th>
                </tr>
            @foreach($data as $x)
                <tr>
                    <td>{{ $x->title }}</td>
                    <td>{{ $x->date }}</td>
                    <td>
                        <a class='btn btn-success' href={{ route('overview-letter', $x->id) }}>Overview</a>
                    </td>
                    <td>
                        <a class='btn btn-danger' href={{ route('delete-letter', $x->id) }}><span class='fas fa-trash'></span></a>
                        <a class='btn btn-warning'><span class='fas fa-edit'></span></a>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
@endsection
