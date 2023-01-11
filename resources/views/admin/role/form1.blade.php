@extends('layouts.manageuser.manage-user')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="form-group row btn-warning">
                {{-- <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('role.index') }}">
                        <h6>View role List</h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div> --}}

                {{-- <div class='col-md-3 col-sm-3'><a href="{{ route('admin-cms') }}">
                        <h6>Go to CMS Dashboard</h6>
                    </a></div> --}}
            </div>
            @if (isset($role))
                <form action="{{ route('role.update', $role) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                @else
                    <form action="{{ route('role.store') }}" method="post" enctype="multipart/form-data">
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="container '">
                        <div class="card card-info">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Role @if (isset($role))
                                        Update
                                    @else
                                        Addon
                                    @endif Form </div>
                            </div>
                            <div class="card-body">
                                {{-- <div class="form-group float-right">
                                    <label>Status:</label>
                                    <input type="checkbox" name="status" value="1" data-bootstrap-switch
                                        @if (isset($role)) @if ($role->status) checked @endif
                                    @else checked @endif>
                                </div> --}}

                                <div class="form-group">
                                    <label for="title">Role Name</label>
                                    <input type="text" name="role_name" class="form-control" placeholder="Enter Name"
                                        value="{{ old('role_name', @$role->role_name) }}">
                                    @error('role_name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Role Description</label>
                                    <input type="text" name="role_description" class="form-control"
                                        placeholder="Enter Name"
                                        value="{{ old('role_description', @$role->role_description) }}">
                                    @error('role_description')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- <div class="form-group">
                                        <label for="title">Person Address:</label>
                                        <input type="text" name="person_address" class="form-control"
                                            placeholder="Enter Address"
                                            value="{{ old('person_address', @$role->person_address) }}">
                                        @error('person_address')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Total Amount Rs:</label>
                                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount"
                                            value="{{ old('amount', @$role->amount) }}">
                                        @error('amount')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Remark</label>
                                        <input type="text" name="remark" class="form-control" placeholder="Enter Amount"
                                            value="{{ old('remark', @$role->remark) }}">
                                        @error('remark')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Payment Method </label>
                                        <input type="text" name="payment_method" class="form-control"
                                            placeholder="Enter Amount"
                                            value="{{ old('payment_method', @$role->payment_method) }}">
                                        @error('payment_method')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div> --}}
                                {{-- <div class="form-group">
                                        <label for="title">Created by</label>
                                        <input type="text" name="created_by" class="form-control"
                                            placeholder="Enter name" value="{{ old('created_by', @$role->created_by) }}">
                                        @error('created_by')
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
                                    </div> --}}
                                {{-- <div class="form-group">
										<label for="title">Speech:</label>
										<textarea class="form-control" style="height: 100px;" name="speech">{{old('speech', @$role->speech)}}</textarea>
										@error('speech')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div> --}}
                            </div>
                            <div class="card-footer">
                                <div>
                                    <button type="submit" class="btn btn-info float-right">
                                        @if (isset($role))
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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
@endsection

@push('js')
    <script src="{{ asset('dashboard/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
    <script type="text/javascript">
        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })
    </script>
@endpush
