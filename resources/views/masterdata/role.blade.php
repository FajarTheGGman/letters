@extends('template.app')

@section('content')
    <h4 class='text-primary'>Role Management</h4>
    <button class='btn btn-primary mt-4' type='button' data-toggle="modal" data-target='#addrole'>Add new role</button>
    <div class='card shadow mt-2'>
        <div class='card-body'>
            <table class='table'>
                <tr>
                    <th>Name</th>
                    <th>Level</th>
                    <th>Action</th>
                </tr>

                @foreach($list as $x)
                <tr>
                    <td>{{ $x->name }}</td>
                    <td>{{ $x->level }}</td>
                    <td>
                        <a class='btn btn-danger' href={{ route('admin-role-delete', $x->id) }}><span class="fas fa-trash"></span></a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="modal fade" id="addrole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="exampleModalLabel">Add new role</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class='form-group' action={{ route('admin-role-post') }} method="post">
                        @csrf
                        <input class='form-control' name='name' placeholder='Name roles' />
                        <label for='level' class='mt-3'>Level of role</label>
                        <select id='level' name='role' class='form-control'>
                            <option value='admin'>Admin</option>
                            <option valie='users'>Users</option>
                        </select>
                        <button class='btn btn-success mt-3' type='submit'>Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>@endsection
