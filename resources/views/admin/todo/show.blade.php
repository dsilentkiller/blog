@extends('layouts.admin-app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="form-group row btn-warning">
                <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('todo.index') }}">
                        <h6>View todo List</h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div>


            </div>
            <div class="row">
                <div class="container">
                    <div class="col-md-12 col-lg-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="card-title">Info : {{ $todo->title }}</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <img src="{{ asset('uploads/todo/thumbnail/' . $todo->image) }}" width="358"
                                        height="239">
                                </div>
                                <hr>
                                <div class="form-group mt-2">
                                    <label>Created Or Updated By: {{ $todo->user->name }} </label>
                                </div>
                                {{-- summary --}}
                                <div class="form-group">
                                    <label>Story: </label><br>
                                    <p>
                                        {{ $todo->story }}
                                    </p>
                                </div>
                                {{-- title --}}
                                <div class="form-group">
                                    <label>Topic: </label><br>
                                    <p>
                                        {{ $todo->topic }}
                                    </p>
                                </div>
                                {{-- description --}}
                                <div class="form-group">
                                    <label>Status: </label><br>
                                    <p>
                                        {!! $todo->status !!}
                                    </p>
                                </div>
                                {{-- title tag --}}
                                {{-- <div class="form-group">
                                    <label>Title Tag: {{ $todo->title_tag }}</label>
                                </div>
                                <div class="form-group">
                                    <label>Meta Keywords: </label>
                                    {{ $todo->meta_keywords }}
                                </div> --}}
                                {{-- meta description --}}
                                {{-- <div class="form-group">
                                    <label>Meta Description:</label>
                                    <p>
                                        {{ $todo->meta_description }}
                                    </p>
                                </div> --}}
                            </div>
                            <div class="card-footer">
                                <div>
                                    <center><a href="{{ route('todo.index') }}">
                                            << Go Back</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
