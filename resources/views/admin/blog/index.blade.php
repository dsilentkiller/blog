@extends('layouts.admin-app')
@section('content')
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
                                                        <button type="submit" class="btn-danger">Deleted</button>
                                                    </form> --}}
                                                    {{-- <a type="button" class="btn btn-danger"
                                                        href="{{ route('blog.destroy', $blog->id) }}" data-toggle="modal"
                                                        data-target="#deleteBlog" id="#deleteBlog">Delete</a> --}}
                                                    <a data-toggle="modal" href="#deactiveModal"
                                                        href="{{ route('blog.destroy') }}" id="deleteModal"
                                                        onclick="opendeactivemodal()"><i class="fa fa-ban"
                                                            aria-hidden="true"></i></a>
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
@endsection



<!-- starting of cancell modal -->

<!-- starting of delete modal -->
<div class="modal fade" id="deactiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title">Are you sure to you want to delete request? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('blog.destroy') }}" method="POST">
                <div class="modal-body">

                    <p>Click confirm to delete !</p>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="id" value="id">
                    <button class="btn btn-success" id="submit">Confirm</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    function opendeactivemodal(id) {
        $("#id").val(id);
    }
</script>
{{-- <div class="modal fade" id="#deleteBlog" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="deleteBlog" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">This action is not reversible.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete <span id="modal_blog_name"></span>?
                <input type="hidden" id="deletelog" name="blog_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-white" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="modal_confirm_delete">Delete</button>
            </div>
        </div>
    </div>
</div>
@section('script')
    <script>
        function loadDeleteModal(id, name) {
            $('#modal-blog_name').html(name);
            $('#modal-confirm_delete').attr('onclick', `confirmDelete(${id})`);
            $('#deleteBlog').modal('show');
        }

        function confirmDelete(id) {
            $.ajax({
                url: '{{ url('blogs') }}/' + id,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    '_method': 'delete',
                },
                success: function(data) {
                    // Success logic goes here..!

                    $('#deleteBlog').modal('hide');
                },
                error: function(error) {
                    // Error logic goes here..!
                }
            });
        }
    </script> --}}
