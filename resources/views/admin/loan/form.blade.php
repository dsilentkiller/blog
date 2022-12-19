@extends('layouts.admin-app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="form-group row btn-warning">
                <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('loan.index') }}">
                        <h6>View Loan List</h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div>

                {{-- <div class='col-md-3 col-sm-3'><a href="{{ route('admin-cms') }}">
                        <h6>Go to CMS Dashboard</h6>
                    </a></div> --}}
            </div>
            @if (isset($loan))
                <form action="{{ route('loan.update', $loan) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                @else
                    <form action="{{ route('loan.store') }}" method="post" enctype="multipart/form-data">
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="container '">
                        <div class="card card-info">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">Loan @if (isset($loan)) Update
                                    @else
                                        Addon @endif Form </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group float-right">
                                    <label>Status:</label>
                                    <input type="checkbox" name="status" value="1" data-bootstrap-switch
                                        @if (isset($loan)) @if ($loan->status) checked @endif
                                    @else checked @endif>
                                </div>
                                <div class="form-group "> <label for="date"> Date : <span
                                            style="color:red; font-size: 20px; "> * </span> </label>
                                    <div class="form-line ">
                                        <input type="date" name="date" id="date" class="datepicker form-control"
                                            placeholder="YYYY-MM-DD" value="{{ old('date', @$blog->date) }}" id="date"
                                            onchange="checkdate();"
                                            @error('date')>
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                    </div>

                                    <div class="form-group "> <label for="finish_date"> Final Date : <span
                                                style="color:red; font-size: 20px; "> * </span> </label>
                                        <div class="form-line ">
                                            <input type="date" name="finish_date" id="finish_date"
                                                class="datepicker form-control" placeholder="YYYY-MM-DD"
                                                value="{{ old('finish_date', @$todo->finish_date) }}"
                                                onchange="checkdate();"
                                                @error('finish_date')>
                                                    <span class="alert alert-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Person Name:</label>
                                            <input type="text" name="person_name" class="form-control"
                                                placeholder="Enter Name"
                                                value="{{ old('person_name', @$loan->person_name) }}">
                                            @error('person_name')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Person Phone:</label>
                                            <input type="number" name="person_phone" class="form-control"
                                                placeholder="Enter Name"
                                                value="{{ old('person_phone', @$loan->person_phone) }}">
                                            @error('person_phone')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Person Address:</label>
                                            <input type="text" name="person_address" class="form-control"
                                                placeholder="Enter Address"
                                                value="{{ old('person_address', @$loan->person_address) }}">
                                            @error('person_address')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Total Amount Rs:</label>
                                            <input type="text" name="total_amount" class="form-control"
                                                placeholder="Enter Amount"
                                                value="{{ old('total_amount', @$loan->total_amount) }}">
                                            @error('total_amount')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Paid Amount Rs:</label>
                                            <input type="text" name="paid_amount" class="form-control"
                                                placeholder="Enter Amount"
                                                value="{{ old('paid_amount', @$loan->paid_amount) }}">
                                            @error('paid_amount')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Due Amount Rs:</label>
                                            <input type="text" name="due_amount" class="form-control"
                                                placeholder="Enter Amount"
                                                value="{{ old('due_amount', @$loan->due_amount) }}">
                                            @error('due_amount')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="title">Paid by</label>
                                            <input type="text" name="paid_by" class="form-control"
                                                placeholder="Enter Amount" value="{{ old('paid_by', @$loan->paid_by) }}">
                                            @error('paid_by')
                                                <span class="alert alert-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

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
										<textarea class="form-control" style="height: 100px;" name="speech">{{old('speech', @$loan->speech)}}</textarea>
										@error('speech')
										<span class="alert alert-danger">{{$message}}</span>
										@enderror
									</div> --}}
                                    </div>
                                    <div class="card-footer">
                                        <div>
                                            <button type="submit" class="btn btn-info float-right">
                                                @if (isset($loan))
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
