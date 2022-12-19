@extends('layouts.admin-app')
@section('content')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
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
                <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('blog.index') }}">
                        <h6>View Blog List</h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div>


            </div>
            @if (isset($blog))
                <form action="{{ route('blog.update', $blog) }}" method="post" enctype="multipart/form-data" class=>
                    {{ method_field('PATCH') }}
                @else
                    <form action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="container '">
                        <div class="card card-info">
                            @csrf
                            <div class="card-header">
                                <div class="card-title bg-danger">Blog @if (isset($blog))
                                        Update
                                    @else
                                        Addon
                                    @endif Form </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group float-right">
                                    <label>Status:</label>
                                    <input type="checkbox" name="status" value="1" data-bootstrap-switch
                                        @if (isset($blog)) @if ($blog->status) checked @endif
                                    @else checked @endif>
                                </div>
                                <div class="form-group">
                                    <label for="title">Topic<span style="color:red; font-size: 20px; "> * </span></label>
                                    <input type="text" name="topic" class="form-control" placeholder="Topic"
                                        value="{{ old('topic', @$blog->topic) }}">
                                    @error('topic')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Choose Profile:</label><br>
                                    <label for="image">
                                        <input type="file" name="image" placeholder="Choose An image">
                                    </label>
                                    @error('image')
                                        <span>{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group "> <label for="date"> Date : <span
                                            style="color:red; font-size: 20px; "> * </span> </label>
                                    <div class="form-line ">
                                        <input type="text" name="date" id="date" class="datepicker form-control"
                                            placeholder="YYYY-MM-DD" value="{{ old('date', @$blog->date) }}" id="date"
                                            onchange="checkdate();"
                                            @error('date')>
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="title">Story<span style="color:red; font-size: 20px; "> *
                                            </span></label>
                                        <textarea class="form-control " name="story" value={{ old('story', @$blog->story) }}></textarea>
                                        @error('story')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div>
                                        <button type="submit" class="btn btn-success float-right">
                                            @if (isset($blog))
                                                Update
                                            @else
                                                Save
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
    </section>
    {{-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script> --}}


    @push('js')
        <script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
        <script type="text/javascript">
            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        </script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
    @endpush
@endsection
