@extends('layouts.admin-app')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="form-group row btn-warning">
                <div class="col-md-3 col-sm-3 float-right"><a href="{{ route('expense.index') }}">
                        <h6>View Expense List</h6>
                    </a></div>
                <div class='col-md-3 col-sm-3'><a href="/">
                        <h6>Go to Dashboard</h6>
                    </a></div>

                {{-- <div class='col-md-3 col-sm-3'><a href="{{ route('admin-cms') }}">
                        <h6>Go to CMS Dashboard</h6>
                    </a></div> --}}
            </div>
            @if (isset($expense))
                <form action="{{ route('expense.update', $expense) }}" method="post" enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                @else
                    <form action="{{ route('expense.store') }}" method="post" enctype="multipart/form-data">
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="container '">
                        <div class="card card-info">
                            @csrf
                            <div class="card-header">
                                <div class="card-title">expense @if (isset($expense)) Update
                                    @else
                                        Addon @endif Form </div>
                            </div>
                            <div class="card-body">
                                {{-- status --}}
                                <div class="form-group float-right">
                                    <label>Status:</label>
                                    <input type="checkbox" name="status" value="1" data-bootstrap-switch
                                        @if (isset($expense)) @if ($expense->status) checked @endif
                                    @else checked @endif>
                                </div>
                                {{-- date --}}
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

                                    {{-- <div class="form-group "> <label for="finish_date"> Final Date : <span
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
                                        </div> --}}
                                    {{-- client name --}}
                                    <div class="form-group">
                                        <label for="title">Person Name:</label>
                                        <input type="text" name="client_name" class="form-control"
                                            placeholder="Enter Name"
                                            value="{{ old('client_name', @$expense->client_name) }}">
                                        @error('client_name')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- purpose --}}
                                    <div class="form-group">
                                        <label for="title">Purpose:</label>
                                        <input type="text" name="purpose" class="form-control" placeholder="Enter Name"
                                            value="{{ old('purpose', @$expense->purpose) }}">
                                        @error('purpose')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- person address --}}
                                    <div class="form-group">
                                        <label for="title">Person Address:</label>
                                        <input type="text" name="person_address" class="form-control"
                                            placeholder="Enter Address"
                                            value="{{ old('person_address', @$expense->person_address) }}">
                                        @error('person_address')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- amount --}}
                                    <div class="form-group">
                                        <label for="title">Total Amount Rs:</label>
                                        <input type="text" name="amount" class="form-control" placeholder="Enter Amount"
                                            value="{{ old('amount', @$expense->amount) }}">
                                        @error('amount')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- remark --}}
                                    <div class="form-group">
                                        <label for="title">Remark</label>
                                        <input type="text" name="remark" class="form-control" placeholder="Enter Amount"
                                            value="{{ old('remark', @$expense->remark) }}">
                                        @error('remark')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- pament method --}}
                                    <div class="form-group">
                                        <label for="title">Payment Method </label>
                                        <input type="text" name="payment_method" class="form-control"
                                            placeholder="Enter Amount"
                                            value="{{ old('payment_method', @$expense->payment_method) }}">
                                        @error('payment_method')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- created by --}}
                                    <div class="form-group">
                                        <label for="title">Created by</label>
                                        <input type="text" name="created_by" class="form-control"
                                            placeholder="Enter name"
                                            value="{{ old('created_by', @$expense->created_by) }}">
                                        @error('created_by')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- image --}}
                                    <div class="form-group">
                                        <label>Choose Profile:</label><br>
                                        <label for="image">
                                            <input type="file" name="image" placeholder="Choose An image">
                                        </label>
                                        @error('image')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- amount taken from --}}
                                    <div class="form-group">
                                        <label for="title">Amount Taken From :</label>
                                        <input type="text" class="form-control" style="height: 100px;"
                                            name="amount_taken_from">{{ old('amount_taken_from', @$expense->amount_taken_from) }}>
                                        @error('amount_taken_from')
                                            <span class="alert alert-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div>
                                        <button type="submit" class="btn btn-info float-right">
                                            @if (isset($expense))
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
