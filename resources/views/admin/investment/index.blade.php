@extends('layouts.admin-app')
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
                <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('investment.create') }}">
                        <h6>Add New Investment </h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div>


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
                                        <th>Date</th>

                                        <th>Total Amount </th>
                                        <th> Name</th>
                                        <th>Purpose</th>

                                        <th>Remark</th>
                                        <th>Image</th>
                                        <th>Payment Method</th>
                                        <th>Created_by</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($investments) && count($investments) > 0)
                                        @foreach ($investments as $investment)
                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                {{-- <td>
                                                    <a href="{{ asset('uploads/investments/thumbnail/' . $investment->image) }}"><img
                                                            src="{{ asset('uploads/investments/thumbnail/' . $investment->image) }}"
                                                            height="80" width="150"></a>
                                                </td> --}}
                                                <td>{{ $investment->date }}</td>
                                                <td>{{ $investment->amount }}</td>
                                                <td>{{ $investment->client_name }}</td>
                                                <td>{{ $investment->purpose }}</td>
                                                <td>{{ $investment->remark }}</td>
                                                <td>{{ $investment->image }}</td>
                                                <td>{{ $investment->payment_method }}</td>
                                                <td>{{ $investment->created_by }}</td>

                                                <td>{{ $investment->status }}</td>
                                                {{-- <td><a href="{{ route('investment.show', $investment) }}">Show</a></td> --}}
                                                <td><a href="{{ route('investment.edit', $investment) }}">Edit</a></td>
                                                <td>
                                                    {{-- <form action="{{ route('investment.destroy', $investment) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        {{-- <button type="submit" class="btn-danger" >Deleted</button> --}}
                                                    {{-- <button type="submit" data-target="#exampleModal"
                                                            data-id={{ $investment->id }} class="btn btn-danger delete"
                                                            data-toggle="modal" data-target="#deleteModal">
                                                            Delete
                                                        </button>
                                                    </form> --}}

                                                    {{-- <a data-toggle="modal" id="deleteModal" data-target="#deleteModal"
                                                        data-attr="{{ route('investment.destroy', $investment->id) }}"
                                                        title="Delete investment">
                                                        <i class="fas fa-trash text-danger  fa-lg"></i>
                                                    </a> --}}


                                                <td>
                                                    <a href="{{ route('investment.destroy', $investment) }}"
                                                        data-id={{ $investment->id }} class="btn btn-danger delete"
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

                            {{ $investments->links() }}
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
    <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete"
        aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete investment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('investment.destroy') }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input id="id" name="id" hidden>
                        <h5 class="text-center">Are you sure you want to delete this investment?</h5>
                        {{-- <input id="firstName" name="firstName"><input id="lastName" name="lastName"> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Yes, Delete investment</button>
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
