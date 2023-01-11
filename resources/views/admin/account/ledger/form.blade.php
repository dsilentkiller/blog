@extends('layouts.accounts.account-app')
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

        @if (isset($ledger))
            <form action="{{ route('ledger.update', $ledger) }}" method="post" enctype="multipart/form-data" class=>
                {{ method_field('PATCH') }}
            @else
                <form action="{{ route('ledger.store') }}" method="post" enctype="multipart/form-data">
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="container '">
                    <div class="card card-info">
                        @csrf
                        <div class="card-header">
                            <div class="card-title bg-danger">Ledger @if (isset($ledger))
                                    Update
                                @else
                                    Addon
                                @endif Form </div>
                        </div>
                        <div class="card-body">
                            <div class="form float-right">
                                <label>Status:</label>
                                <input type="checkbox" name="status" value="1" data-bootstrap-switch
                                @if (isset($ledger)) @if ($ledger->status) checked @endif @else
                                    checked @endif>
                            </div>
                            <div class="form">
                                <label for="title">Ledger Name<span style="color:red; font-size: 20px; "> *
                                    </span></label>
                                <input type="text" name="ledger_name" class="form-control"
                                    placeholder="ram,abc company,nabil bank"
                                    value="{{ old('ledger_name', @$ledger->ledger_name) }}">
                                @error('ledger_name')
                                    <span class="alert alert-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-6 control-label" for="ledger_groups"
                                            style="font-size:16px;font-style: normal;border-top: auto; padding-right: 30px;">Select
                                            Ledger Group Name<span style="color:red; font-size:12px; "> * </span></label>
                                        <div class="col-md-8">
                                            <div class="form-line border:1px">
                                                <select name="ledger_groups_id" class="form-control selectpicker"
                                                    onchange="changeStatus()" id="ledger_groups_id" required>
                                                    <option value="" id="ledger_groups_id">Select Ledger Group
                                                    </option>
                                                    {{-- <option value="" id="btn">Select Ledger Group</option> --}}

                                                    {{-- @foreach ($ledgergroups as $ledgergroup) --}}
                                                    <option style="color: black;"
                                                        value="{{ old('ledgergroup_id', @$ledgergroup->ledgergroup_id) }}">
                                                        {{ @$ledgergroup->ledgergroup_name }} </option>
                                                    {{-- @endforeach --}}

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="form">
                                <label>Choose Profile:</label><br>
                                <label for="image">
                                    <input type="file" name="image" placeholder="Choose An image">
                                </label>
                                @error('image')
                                    <span>{{ $message }}</span>
                                @enderror
                            </div> --}}

                                {{-- <div class="form "> <label for="date"> Date : <span
                                        style="color:red; font-size: 20px; "> * </span> </label>
                                <div class="form-line ">
                                    <input type="text" name="date" id="date" class="datepicker form-control"
                                        placeholder="YYYY-MM-DD" value="{{ old('date', @$ledger->date) }}" id="date"
                                        onchange="checkdate();"
                                        @error('date')>
                                                        <span class="alert alert-danger">{{ $message }}</span>
                                                    @enderror
                                        </div>
                                </div> --}}


                                <div class="form">
                                    <label for="title">Ledger Group Code<span style="color:red; font-size: 20px; "> *
                                        </span></label>
                                    <input type="number" class="form-control" name="ledger_code"
                                        value={{ old('ledgergroup_code', @$ledger->ledger_code) }}>
                                    @error('ledger_code')
                                        <span class="alert alert-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <div>
                                    <button type="submit" class="btn btn-success float-right">
                                        @if (isset($ledger))
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
    <script>
        function changeStatus() {
            var status = document.getElementById('ledger_groups_id');
            if (status.value == "ledgergroup_name") {
                document.getElementById("ledgergroup_code").style.visibility = "hidden";
            } else {
                document.getElementById("ledgergroup_code").style.visibility = "visible";

            }
        }
        // const btn = document.getElementById('btn');

        // btn.addEventListener('click', () => {
        //     const form = document.getElementById('form');

        // if (form.style.display === 'none') {
        // {{-- //  this SHOWS the form --}}
        // form.style.display = 'block';
        // } else {
        //     {{-- //  this HIDES the form --}}
        //     form.style.display = 'none';
        //     }
        // });
        {{-- end --}}
    </script>

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
