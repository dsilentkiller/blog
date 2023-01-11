@extends('layouts.admin-app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>


                </div> --}}
                {{-- house --}}
            </div>
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>Brand New House</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                {{-- average house --}}
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>53
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>Average House</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                    </div>
                </div>
                {{-- land --}}

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>50
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>Land</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                {{-- new customer --}}

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>50
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>Total Expense List</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                {{-- land customer --}}

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>50
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>Land Customer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                {{-- new contact --}}

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>50
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                            </h3>

                            <p>new enquires</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>


            </div>


        </div>
    </div>
    </div>
@endsection
