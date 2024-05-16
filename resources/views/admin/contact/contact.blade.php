@extends('admin.layouts.master')

@section('style')
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">All New Tasks</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col mb-3">

                        <div class="card">
                            <div class="card-header bg-primary">
                                <div class="mt-n2 mb-n2 d-flex">
                                    <h5 class="align-middle text-white">All Messages</h5>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-hover datatable">
                                        <thead>
                                            <tr>
                                                <th>FullName</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Country Name</th>
                                                <th>Country Flag</th>
                                                <th>Date</th>
                                                <th>subject</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                              @foreach ($contacts as $contact)
                                                <tr>
                                                    <td>{{ $contact->name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->area_code }} {{ $contact->mobile }}</td>
                                                    <td>{{ $contact->country_name }}</td>
                                                    <td><img style="width: 50px;height: 50px;border-radius: 100%" src="{{ $contact->country_flag }}" alt="{{ $contact->country_name }}"></td>
                                                    <td>{{ $contact->created_at->format('M D Y') }} | {{ $contact->created_at->diffForHumans()  }}</td>
                                                    <td>{{ $contact->subject }}</td>
                                                    <td style="width: 100px;"><textarea readonly name="message" id="" cols="30" rows="2">{{ $contact->message }}</textarea></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End Order Form -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
