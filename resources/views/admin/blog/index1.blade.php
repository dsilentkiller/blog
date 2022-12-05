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
                <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('blog.create') }}">
                        <h6>View Blog Form</h6>
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
                                        <th>Picture</th>
                                        <th>Topic</th>
                                        <th>Story</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($blogs) && count($blogs) > 0)
                                        @foreach ($blogs as $blog)
                                            <tr>
                                                <td>{{ $n++ }}</td>
                                                <td>
                                                    <a href="{{ asset('uploads/blogs/thumbnail/' . $blog->image) }}"><img
                                                            src="{{ asset('uploads/blogs/thumbnail/' . $blog->image) }}"
                                                            height="80" width="150"></a>
                                                </td>
                                                <td>{{ $blog->topic }}</td>

                                                <td>{{ $blog->story }}</td>
                                                <td><a href="{{ route('blog.show', $blog) }}">Show</a></td>
                                                <td><a href="{{ route('blog.edit', $blog) }}">Edit</a></td>
                                                <td>
                                                    {{-- <form action="{{ route('blog.destroy', $blog) }}" method="post">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                        {{-- <button type="submit" class="btn-danger">Deleted</button> --}}
                                                    {{-- <button type="submit" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            Delete
                                                        </button>
                                                    </form> --}}

                                                    <a data-toggle="modal" id="deleteModal" data-target="#deleteModal"
                                                        data-attr="{{ route('blog.destroy', $blog->id) }}"
                                                        title="Delete blog">
                                                        <i class="fas fa-trash text-danger  fa-lg"></i>
                                                    </a>


                                                    {{-- <button class="delete-modal btn btn-danger"
                                                        data-id="{{ $blog->id }}" data-name="{{ $blog->name }}">
                                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                                    </button> --}}
                                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal">
                                                        Delete
                                                    </button> --}}
                                                    {{-- <a type="button" class="btn btn-danger"
                                                        href="{{ route('blog.destroy') }}" data-toggle="modal"
                                                        data-target="#deleteBlog" id="#deleteBlog">Delete</a> --}}
                                                    {{-- <a data-toggle="modal" href="#deactiveModal"
                                                        href="{{ route('blog.destroy') }}" id="deleteModal"
                                                        onclick="opendeactivemodal()"><i class="fa fa-ban"
                                                            aria-hidden="true"></i></a> --}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5">
                                                <center>No Record Found</center>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                            {{ $blogs->links() }}
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

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>R u Sure Want to delete this?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // display a modal (delete modal)
        $(document).on('click', '#deleteModal', function(event) {
            event.preventDefault();
            let href = $(this).attr('data-attr');
            $.ajax({
                url: href,
                beforeSend: function() {
                    $('#loader').show();
                },
                // return the result
                success: function(result) {
                    $('#deleteModal').modal("show");
                    $('#deleteBody').html(result).show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                error: function(jqXHR, testStatus, error) {
                    console.log(error);
                    alert("Page " + href + " cannot open. Error:" + error);
                    $('#loader').hide();
                },
                timeout: 8000
            })
        });
    </script>


@endsection

<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Delete
</button> --}}
