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
                                {{-- <div class="form-group float-right">
                                    <label>email:</label>
                                    <input type="checkbox" name="email" value="1" data-bootstrap-switch
                                        @if (isset($role)) @if ($role->email) checked @endif
                                    @else checked @endif>
                                </div> --}}
                                {{--
                                <div class="form-group">
                                    <label for="title">role Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                        value="{{ old('name', @$role->name) }}">
                                    @error('name')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">role Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Name"
                                        value="{{ old('address', @$role->address) }}">
                                    @error('address')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Phone:</label>
                                    <input type="number" name="phone" class="form-control" placeholder="Enter phone"
                                        value="{{ old('phone', @$role->phone) }}">
                                    @error('phone')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Age </label>
                                    <input type="text" name="age" class="form-control" placeholder="Enter age"
                                        value="{{ old('age', @$role->age) }}">
                                    @error('age')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                {{-- gender --}}
                                {{-- <div class="form-group">
                                    <label>Gender:</label>
                                    <select name="gender" id="gender"> --}}
                                {{-- @if ($role->gender == 'male') --}}
                                {{-- <option value="male" selected>Male</option>
                                        <option value="female">Female</option> --}}
                                {{-- @elseif($role->gender == 'female')
                                            <option value="male">Male</option>
                                            <option value="female" selected>Female</option>
                                        @endif --}}
                                {{-- </select>
                                    @error('gender')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                {{-- marital status --}}
                                {{-- <div class="form-group">
                                    <label>Marital Status:</label>
                                    <select name="marital_status" id="marital_status"> --}}
                                {{-- @if ($role->marital_status == 'married') --}}
                                {{-- <option value="married" selected>Married</option>
                                        <option value="unmarried">Unmarried</option> --}}
                                {{-- @elseif($role->marital_status == 'unmarried')
                                            <option value="married">Married</option>
                                            <option value="unmarried" selected>Unmarried</option>
                                        @endif --}}
                                {{-- </select>
                                    @error('marital_status')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}
                                {{-- status user --}}
                                {{-- <div class="form-group">
                                    <label>User Status:</label>
                                    <select name="status" id="status">
                                        {{-- @if ($role->status == 'active') --}}
                                {{-- <option value="active" selected>Active</option> --}}
                                {{-- <option value="inactive">Inactive</option> --}}
                                {{-- @elseif($role->status == 'inactive')
                                            <option value="active">Active</option>
                                            <option value="inactive" selected>Inactive</option>
                                        {{-- @endif --}}
                                {{-- </select>
                                    @error('status')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div> --}}


                                {{--
                                <div class="form-group">
                                    <label for="title">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter age"
                                        value="{{ old('email', @$role->email) }}">
                                    @error('email')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="password"
                                        value="{{ old('password', @$role->password) }}">
                                    @error('password')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
 --}}


                                {{-- <div class="form-group">
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
