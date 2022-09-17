{{-- 1.layouts exteds and start section --}}
@extends('layouts.admin-app')
@section('content')
    <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                {{-- 2.update and store start route --}}
                @if (isset($banner))
                    <form action="{{ route('banner.update', $banner) }}" method="POST" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                    @else
                        <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            @csrf
                            <div class="card-header">
                                {{-- status --}}
                                <div class="card-title">Banner @if (isset($banner))Update
                                    @else
                                        Addon @endif Form</div>
                            </div>
                            <div class="card-body">
                                <div class="form-group float-right">
                                    <label>Status::</label>
                                    <input type="checkbox" designation="status" value="1" data-bootstrap-switch
                                        @if (isset($banner)) @if ($banner->status) checked @endif
                                    @else checked @endif>
                                </div>

                                {{-- update and store route end --}}

                                <!-- SELECT2 EXAMPLE -->
                                <div class="card card-default">

                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="row">
                                            {{-- <div class="col-md-6"> --}}

                                            <!-- /.form-group -->

                                            {{-- </div> --}}
                                            {{-- greeting --}}
                                            <div class="form-group">
                                                <label for="greeting">Greeting:</label>
                                                <input type="text" designation="greeting" class="form-control"
                                                    placeholder="Enter Greeting"
                                                    value="{{ old('greeting', @$banner->greeting) }}">
                                                @error('greeting')
                                                    <span class="alert alert-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.col -->
                                            {{-- name --}}
                                            <div class="form-group">
                                                <label for="title">Name:</label>
                                                <input type="text" name="name" class="form-control"
                                                    placeholder="Enter Name" value="{{ old('name', @$banner->name) }}">
                                                @error('name')
                                                    <span class="alert alert-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- designation --}}
                                            <div class="form-group">
                                                <label for="title">Designation:</label>
                                                <input type="text" slug="designation" class="form-control"
                                                    placeholder="Enter designation"
                                                    value="{{ old('designation', @$banner->designation) }}">
                                                @error('designation')
                                                    <span class="alert alert-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- slug --}}
                                            <div class="form-group">
                                                <label for="title">Slug:</label>
                                                <input type="text" name="slug" class="form-control"
                                                    placeholder="Enter slug" value="{{ old('slug', @$banner->slug) }}">
                                                @error('slug')
                                                    <span class="alert alert-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            {{-- image --}}
                                            <div class="form-group">
                                                <label>Choose Profile:</label><br>
                                                <label for="image">
                                                    <input type="file" designation="image" placeholder="Choose An image">
                                                </label>
                                                @error('image')
                                                    <span>{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->

                                    </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                        <div class="card-footer">
                            <div>
                                <button type="submit" class="btn btn-info float-right">
                                    @if (isset($banner))Update
                                    @else
                                        Save @endif
                                </button>
                            </div>
                        </div>
                    </div>

                </div>

        </section>
        <!-- /.content -->

        {{-- index --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Banner List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Status</th>
                                    <th>Greeting</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>slug</th>
                                    <th>Image</th>
                                    <th colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($banners) && count($banners) > 0)
                                    @foreach ($banners as $banner)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            <td>
                                                <a href="{{ asset('uploads/banners/thumbnail/' . $banner->image) }}"><img
                                                        src="{{ asset('uploads/banners/thumbnail/' . $banner->image) }}"
                                                        height="80" width="150"></a>
                                            </td>
                                            <td>{{ $banner->title }}</td>
                                            <td>{{ $banner->price }}</td>

                                            <td><a href="{{ route('banner.edit', $banner) }}"
                                                    class="btn btn-primary">Edit</a>
                                            </td>
                                            <td><a href="{{ route('banner.show', $banner) }}" class="btn btn-info">Show</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('banner.destroy', $banner) }}" method="post">
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
        {{-- index ..end --}}
    </div>
@endsection
<script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script type="text/javascript">
    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
</script>
