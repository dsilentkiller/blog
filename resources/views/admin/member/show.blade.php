@extends('layouts.admin-app')
@section('content')
    <h1 class="page-header text-center">Bootstrap 5 Modal Add Edit and
        Delete</h1>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <h2>Members Table
                <button type="button" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right"><i
                        class="fa fa-plus"></i> Member</button>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-1">
            <table class="table table-bordered table-responsive table-striped">
                <thead>
                    <th>Fisrtname</th>
                    <th>Lastname</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->firstname }}</td>
                            <td>{{ $member->lastname }}</td>
                            <td>
                                <a href="#edit{{ $member->id }}" data-bs-toggle="modal" class="btn btn-success"><i
                                        class='fa fa-edit'></i> Edit</a>
                                <a href="#delete{{ $member->id }}" data-bs-toggle="modal" class="btn btn-danger"><i
                                        class='fa fa-trash'></i> Delete</a>
                                @include('action')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
