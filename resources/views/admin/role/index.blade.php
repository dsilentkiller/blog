@extends('layouts.manageuser.manage-user')
@section('content')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <section class="content">
        <div class="container-fluid">
            <div class="form-group row btn-warning">
                {{-- <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('role.create') }}">
                        <h6>Add New role </h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div> --}}
                <div class="card-header">
                    {{-- status --}}
                    <div class="card-title"> Add Employee Role </div>
                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>Picture</th> --}}
                                        <th>Role Name</th>
                                        <th>Role Description</th>

                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($userroles) && count($userroles) > 0)
                                        @foreach ($userroles as $role)
                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                {{-- <td>
                                                    <a href="{{ asset('uploads/roles/thumbnail/' . $role->image) }}"><img
                                                            src="{{ asset('uploads/roles/thumbnail/' . $role->image) }}"
                                                            height="80" width="150"></a>
                                                </td> --}}

                                                <td>{{ $role->role_name }}</td>
                                                <td>{{ $role->role_description }}</td>


                                                {{-- <td>{{ $role->status }}</td> --}}
                                                {{-- <td><a href="{{ route('role.show', $role) }}">Show</a></td> --}}
                                                <td><a href="{{ route('userrole.edit', $role) }}">Edit</a></td>
                                                <td>
                                                    {{-- <form action="{{ route('role.destroy', $role) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        {{-- <button type="submit" class="btn-danger" >Deleted</button> --}}
                                                    {{-- <button type="submit" data-target="#exampleModal"
                                                            data-id={{ $role->id }} class="btn btn-danger delete"
                                                            data-toggle="modal" data-target="#deleteModal">
                                                            Delete
                                                        </button>
                                                    </form> --}}

                                                    {{-- <a data-toggle="modal" id="deleteModal" data-target="#deleteModal"
                                                        data-attr="{{ route('role.destroy', $role->id) }}"
                                                        title="Delete role">
                                                        <i class="fas fa-trash text-danger  fa-lg"></i>
                                                    </a> --}}

                                                <td>
                                                    <a href="{{ route('userrole.destroy', $role) }}"
                                                        data-id={{ $userrole->id }} class="btn btn-danger delete"
                                                        data-toggle="modal" data-target="#deleteModal">Delete</a>
                                                </td>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="2">
                                                <center>No Record Found</center>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            {{ $userroles->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Delete Warning Modal -->
    {{-- <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
        aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('role.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input id="id" name="id" hidden>
                        <h5 class="text-center">Are you sure you want to delete this role?</h5>
                        {{-- <input id="firstName" name="firstName"><input id="lastName" name="lastName"> --}}
    {{-- </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete role</button>
                </div>
                </form>
            </div>
        </div>
    </div> --}}
    <!-- End Delete Modal -->
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>


@endsection
