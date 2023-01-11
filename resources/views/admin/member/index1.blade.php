@extends('layouts.manageuser.manage-user')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Member List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th> Marital Status</th>
                                <th>Status</th>
                                <th>Email</th>


                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($members) && count($members) > 0)
                                @foreach ($members as $member)
                                    <tr>
                                        <td>{{ $n++ }}</td>
                                        <td>
                                            <a href="{{ asset('uploads/members/thumbnail/' . $member->image) }}"><img
                                                    src="{{ asset('uploads/members/thumbnail/' . $member->image) }}"
                                                    height="80" width="150"></a>
                                        </td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>{{ $member->age }}</td>
                                        <td>{{ $member->gender }}</td>
                                        <td>{{ $member->marital_status }}</td>
                                        <td>{{ $member->status }}</td>
                                        <td>{{ $member->email }}</td>



                                        <td><a href="{{ route('member.edit', $member) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td><a href="{{ route('member.show', $member) }}" class="btn btn-info">Show</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('member.destroy', $member) }}" method="post">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <center>No Record Found</center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Delete Warning Modal -->
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
        aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('member.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input id="id" name="id" hidden>
                        <h5 class="text-center">Are you sure you want to delete this role?</h5>
                        <input id="firstName" name="firstName"><input id="lastName" name="lastName">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete role</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Delete Modal -->
    <script>
        $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>


@endsection
