@extends('template.app')
@section('content')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-primary">New Admin</h1>

                    <button class='btn btn-success pb-2' data-target='#add' data-toggle='modal' >
                        Add Admin
                    </button>

                    <div class='card mt-3'>
                        <table class='card-body table'>
                            <tr>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Edit</th>
                            </tr>

                            @foreach($users as $x)
                            <tr>
                                <td>{{ $x->email }}</td>
                                <td>{{ $x->firstname }}</td>
                                <td>{{ $x->role }}</td>
                                <td><button type="button" data-target="#edit" class='btn btn-warning' data-toggle='modal'><span class='fas fa-edit'></span></button><a class='btn btn-danger ml-3'><span class='fas fa-trash'></span></a></td>
                            </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
                <!-- /.container-fluid -->
                <div class='modal fade' id='edit' tabindex='-1' role='dialog'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5>Edit Users</h5>
                                <button type='button' class='close' data-dismiss='modal' aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form class=''>
                                    <input placeholder="change users" class='form-control' />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class='modal fade' id='add' role='dialog'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                                <h5>Add Admin</h5>
                                <button class='close' data-dismiss='modal' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>
                            <div class='modal-body'>
                                <form>
                                    <input type='email' placeholder="Email" class='form-control mt-3' />
                                     <input placeholder="First Name" class='form-control mt-3' />
                                    <input placeholder="Last Name" class='form-control mt-3' />
                                    <input type='password' placeholder="Password" class='form-control mt-3' />
                                    <button class='btn btn-success mt-3'>Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- End of Main Content -->
@endsection
