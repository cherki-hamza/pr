@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        {{-- <h1 class="m-0">Dashboard <x-iconic-phone  style="width: 50px"/></h1> --}}
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">

                <div class="main-body pt-2">

                    <!-- Errors and Success Messages -->
                    <!-- / Errors and Success Messages -->

                    <!-- Report Activity -->
                    <div class="row gutters-sm">
                        <!-- Total Purchases -->
                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex h2 justify-content-between mb-2">

                                        <span>00</span>
                                        <svg style="width: 40px"
                                            class="svg-inline--fa fa-list-ol fa-w-16 font-size-lg text-facebook"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="list-ol"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M61.77 401l17.5-20.15a19.92 19.92 0 0 0 5.07-14.19v-3.31C84.34 356 80.5 352 73 352H16a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8h22.83a157.41 157.41 0 0 0-11 12.31l-5.61 7c-4 5.07-5.25 10.13-2.8 14.88l1.05 1.93c3 5.76 6.29 7.88 12.25 7.88h4.73c10.33 0 15.94 2.44 15.94 9.09 0 4.72-4.2 8.22-14.36 8.22a41.54 41.54 0 0 1-15.47-3.12c-6.49-3.88-11.74-3.5-15.6 3.12l-5.59 9.31c-3.72 6.13-3.19 11.72 2.63 15.94 7.71 4.69 20.38 9.44 37 9.44 34.16 0 48.5-22.75 48.5-44.12-.03-14.38-9.12-29.76-28.73-34.88zM496 224H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-160H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 320H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zM16 160h64a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8H64V40a8 8 0 0 0-8-8H32a8 8 0 0 0-7.14 4.42l-8 16A8 8 0 0 0 24 64h8v64H16a8 8 0 0 0-8 8v16a8 8 0 0 0 8 8zm-3.91 160H80a8 8 0 0 0 8-8v-16a8 8 0 0 0-8-8H41.32c3.29-10.29 48.34-18.68 48.34-56.44 0-29.06-25-39.56-44.47-39.56-21.36 0-33.8 10-40.46 18.75-4.37 5.59-3 10.84 2.8 15.37l8.58 6.88c5.61 4.56 11 2.47 16.12-2.44a13.44 13.44 0 0 1 9.46-3.84c3.33 0 9.28 1.56 9.28 8.75C51 248.19 0 257.31 0 304.59v4C0 316 5.08 320 12.09 320z">
                                            </path>
                                        </svg><!-- <i class="fas fa-list-ol font-size-lg text-facebook"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <h5>Open Tasks</h5>
                                    <p class="small text-secondary mb-0">Tasks waiting for your acceptance or rejection.
                                        Please accept or reject it within 3 days.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /Total Purchases -->

                        <!-- Complete Order -->
                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex h2 justify-content-between mb-2">

                                        <span>00</span>
                                        <svg style="width: 40px"
                                            class="svg-inline--fa fa-tasks fa-w-16 font-size-lg text-facebook"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="tasks"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M139.61 35.5a12 12 0 0 0-17 0L58.93 98.81l-22.7-22.12a12 12 0 0 0-17 0L3.53 92.41a12 12 0 0 0 0 17l47.59 47.4a12.78 12.78 0 0 0 17.61 0l15.59-15.62L156.52 69a12.09 12.09 0 0 0 .09-17zm0 159.19a12 12 0 0 0-17 0l-63.68 63.72-22.7-22.1a12 12 0 0 0-17 0L3.53 252a12 12 0 0 0 0 17L51 316.5a12.77 12.77 0 0 0 17.6 0l15.7-15.69 72.2-72.22a12 12 0 0 0 .09-16.9zM64 368c-26.49 0-48.59 21.5-48.59 48S37.53 464 64 464a48 48 0 0 0 0-96zm432 16H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-320H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16zm0 160H208a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h288a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16z">
                                            </path>
                                        </svg><!-- <i class="fas fa-tasks font-size-lg text-facebook"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <h5>For Improvement</h5>
                                    <p class="small text-secondary mb-0">Tasks send back to be improved by you. Please
                                        revise it as soon as possible.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /Complete Order -->

                        <!-- Active Order -->
                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex h2 justify-content-between mb-2">
                                        <span>$0.00</span>
                                        <svg style="width: 40px"
                                            class="svg-inline--fa fa-piggy-bank fa-w-18 font-size-lg text-facebook"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="piggy-bank"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M560 224h-29.5c-8.8-20-21.6-37.7-37.4-52.5L512 96h-32c-29.4 0-55.4 13.5-73 34.3-7.6-1.1-15.1-2.3-23-2.3H256c-77.4 0-141.9 55-156.8 128H56c-14.8 0-26.5-13.5-23.5-28.8C34.7 215.8 45.4 208 57 208h1c3.3 0 6-2.7 6-6v-20c0-3.3-2.7-6-6-6-28.5 0-53.9 20.4-57.5 48.6C-3.9 258.8 22.7 288 56 288h40c0 52.2 25.4 98.1 64 127.3V496c0 8.8 7.2 16 16 16h64c8.8 0 16-7.2 16-16v-48h128v48c0 8.8 7.2 16 16 16h64c8.8 0 16-7.2 16-16v-80.7c11.8-8.9 22.3-19.4 31.3-31.3H560c8.8 0 16-7.2 16-16V240c0-8.8-7.2-16-16-16zm-128 64c-8.8 0-16-7.2-16-16s7.2-16 16-16 16 7.2 16 16-7.2 16-16 16zM256 96h128c5.4 0 10.7.4 15.9.8 0-.3.1-.5.1-.8 0-53-43-96-96-96s-96 43-96 96c0 2.1.5 4.1.6 6.2 15.2-3.9 31-6.2 47.4-6.2z">
                                            </path>
                                        </svg><!-- <i class="fas fa-piggy-bank font-size-lg text-facebook"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <h5>Reserved</h5>
                                    <p class="small mb-0">The Total amount that have been reserved for incompleted tasks.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- YActive Order -->

                        <!-- Current Balance -->
                        <div class="col-sm-6 col-xl-3 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <div class="d-flex h2 justify-content-between mb-2">
                                        <span>
                                            $0.00
                                        </span>
                                        <svg style="width: 40px"
                                            class="svg-inline--fa fa-coins fa-w-16 font-size-lg text-facebook"
                                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="coins"
                                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M0 405.3V448c0 35.3 86 64 192 64s192-28.7 192-64v-42.7C342.7 434.4 267.2 448 192 448S41.3 434.4 0 405.3zM320 128c106 0 192-28.7 192-64S426 0 320 0 128 28.7 128 64s86 64 192 64zM0 300.4V352c0 35.3 86 64 192 64s192-28.7 192-64v-51.6c-41.3 34-116.9 51.6-192 51.6S41.3 334.4 0 300.4zm416 11c57.3-11.1 96-31.7 96-55.4v-42.7c-23.2 16.4-57.3 27.6-96 34.5v63.6zM192 160C86 160 0 195.8 0 240s86 80 192 80 192-35.8 192-80-86-80-192-80zm219.3 56.3c60-10.8 100.7-32 100.7-56.3v-42.7c-35.5 25.1-96.5 38.6-160.7 41.8 29.5 14.3 51.2 33.5 60 57.2z">
                                            </path>
                                        </svg><!-- <i class="fas fa-coins font-size-lg text-facebook"></i> Font Awesome fontawesome.com -->
                                    </div>
                                    <h5>Current Balance</h5>
                                    <p class="small text-secondary mb-0">The Total amount you have earned for completed
                                        tasks.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Current Balance -->



                </div>

            </div>
        </section>
        <!-- /.content -->

    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/annotations.js"></script>

    {{--
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/gantt/modules/gantt.js"></script>
<script src="https://code.highcharts.com/gantt/modules/exporting.js"></script> --}}

    <script>
        /* Highcharts.chart('my_chart', {
        xAxis: {
            categories: [
                'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
            ]
        },

        title: {
            text: 'Tasks By Month'
        },

        series: [{
            data: [
                { y: 29.9, id: 'min' }, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6,
                148.5, { y: 216.4, id: 'max' }, 194.1, 95.6, 54.4
            ]
        }],

        annotations: [{
            labels: [{
                point: 'max',
                text: 'Max'
            }, {
                point: 'min',
                text: 'Min',
                backgroundColor: 'white'
            }]
        }]
    }); */
    </script>
@endsection
