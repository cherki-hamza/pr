@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
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
                    <div class="col-12">
                        <div class="card">
                            @can('create user')
                                <div class="card-header">
                                    <h3 class="card-title">

                                        {{-- <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-tambah" data-backdrop="static" data-keyboard="false"><i class="fas fa-plus"></i>Mobiles</a>
 --}}
                                    </h3>
                                </div>
                            @endcan
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">

                                <div class="col-12">

                                    <div class="card card-primary card-outline card-outline-tabs">
                                        <div class="card-header p-0 border-bottom-0">
                                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-four-home-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-home" role="tab"
                                                        aria-controls="custom-tabs-four-home" aria-selected="true">Current Phone Numbers</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                                        href="#custom-tabs-four-profile" role="tab"
                                                        aria-controls="custom-tabs-four-profile"
                                                        aria-selected="false">Buy New Phone Numbers</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-four-messages-tab"
                                                        data-toggle="pill" href="#custom-tabs-four-messages" role="tab"
                                                        aria-controls="custom-tabs-four-messages"
                                                        aria-selected="false">Bulk Update</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-four-tabContent">

                                                <!-- start phone numbers table -->
                                                <div class="tab-pane fade active show" id="custom-tabs-four-home"
                                                    role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

                                                    <div class="card-body table-responsive">
                                                        <table id="phoneNumbers" class="table table-bordered table-hover  datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>#ID</th>
                                                                    <th>Name</th>
                                                                    <th>State</th>
                                                                    <th>Phone Number</th>
                                                                    <th>RedirectTo</th>
                                                                    <th>Status</th>
                                                                    {{-- @canany(['update user', 'delete user']) --}}
                                                                        <th>Action</th>
                                                                    {{-- @endcanany --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($data as $i)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $i['name'] }}</td>
                                                                        <td>{{ $i['state'] }}</td>
                                                                        <td>{{ $i['phoneNumber'] }}</td>
                                                                        <td>{{ $i['redirectTo'] }}</td>
                                                                        <td>{!! ($i['status'] == 1) ? '<span style="color: green;">Activate</span>' :  '<span style="color: red;">Not Activate</span>'  !!}</td>
                                                                    {{-- @canany(['update user', 'delete user']) --}}
                                                                            <td>
                                                                                <div class="btn-group d-flex justify-content-center">
                                                                                   {{--  @can('update user') --}}
                                                                                        <button class="btn btn-sm btn-info btn-edit" data-id="{{ $i['id'] }}"><i class="fas fa-info mr-3"></i>Details $ Update</button>
                                                                                    {{-- @endcan --}}
                                                                                </div>
                                                                            </td>
                                                                        {{-- @endcanany --}}
                                                                    </tr>
                                                                @endforeach


                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- end phone numbers table -->

                                                <!-- start searsh phone numbers -->

                                                    <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                                        aria-labelledby="custom-tabs-four-profile-tab">
                                                        <form id="searchForm" action="{{ route('searsh_phone_number') }}" id="searsh_phone_number" method="GET">
                                                            @csrf
                                                        <div class="row">


                                                            <div class="col-sm-12">
                                                                <div class="row form-group">
                                                                <div class="col-sm-3">
                                                                    <div class="">
                                                                        <label>Phone Number Type:</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="">
                                                                        <select name="number_type" id="phoneType" class="custom-select" required>
                                                                            <option value="regular">Regular Number</option>
                                                                            <option value="toll_free">Toll Free</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 my-3">
                                                                <div class="row form-group">
                                                                <div class="col-sm-3">
                                                                    <div class="">
                                                                        <label>Search Type :</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="">
                                                                        <select class="custom-select" id="type" name="type" required>
                                                                            <option value="location">Location</option>
                                                                            <option value="area_code">Area Code</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 my-3">
                                                                <div class="row form-group">
                                                                <div class="col-sm-3">
                                                                    <div class="">
                                                                        <label>Location :</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    <div class="">
                                                                        <select class="custom-select" name="location" id="location">
                                                                            <option value="" selected="selected" value="any">Any ...</option>
                                                                            <option value="AL">Alabama (AL)</option>
                                                                            <option value="AK">Alaska (AK)</option>
                                                                            <option value="AZ">Arizona (AZ)</option>
                                                                            <option value="AR">Arkansas (AR)</option>
                                                                            <option value="CA">California (CA)</option>
                                                                            <option value="CO">Colorado (CO)</option>
                                                                            <option value="CT">Connecticut (CT)</option>
                                                                            <option value="DE">Delaware (DE)</option>
                                                                            <option value="DC">District Of Columbia (DC)</option>
                                                                            <option value="FL">Florida (FL)</option>
                                                                            <option value="GA">Georgia (GA)</option>
                                                                            <option value="HI">Hawaii (HI)</option>
                                                                            <option value="ID">Idaho (ID)</option>
                                                                            <option value="IL">Illinois (IL)</option>
                                                                            <option value="IN">Indiana (IN)</option>
                                                                            <option value="IA">Iowa (IA)</option>
                                                                            <option value="KS">Kansas (KS)</option>
                                                                            <option value="KY">Kentucky (KY)</option>
                                                                            <option value="LA">Louisiana (LA)</option>
                                                                            <option value="ME">Maine (ME)</option>
                                                                            <option value="MD">Maryland (MD)</option>
                                                                            <option value="MA">Massachusetts (MA)</option>
                                                                            <option value="MI">Michigan (MI)</option>
                                                                            <option value="MN">Minnesota (MN)</option>
                                                                            <option value="MS">Mississippi (MS)</option>
                                                                            <option value="MO">Missouri (MO)</option>
                                                                            <option value="MT">Montana (MT)</option>
                                                                            <option value="NE">Nebraska (NE)</option>
                                                                            <option value="NV">Nevada (NV)</option>
                                                                            <option value="NH">New Hampshire (NH)</option>
                                                                            <option value="NJ">New Jersey (NJ)</option>
                                                                            <option value="NM">New Mexico (NM)</option>
                                                                            <option value="NY">New York (NY)</option>
                                                                            <option value="NC">North Carolina (NC)</option>
                                                                            <option value="ND">North Dakota (ND)</option>
                                                                            <option value="OH">Ohio (OH)</option>
                                                                            <option value="OK">Oklahoma (OK)</option>
                                                                            <option value="OR">Oregon (OR)</option>
                                                                            <option value="PA">Pennsylvania (PA)</option>
                                                                            <option value="RI">Rhode Island (RI)</option>
                                                                            <option value="SC">South Carolina (SC)</option>
                                                                            <option value="SD">South Dakota (SD)</option>
                                                                            <option value="TN">Tennessee (TN)</option>
                                                                            <option value="TX">Texas (TX)</option>
                                                                            <option value="UT">Utah (UT)</option>
                                                                            <option value="VT">Vermont</option>
                                                                            <option value="VA">Virginia</option>
                                                                            <option value="WA">Washington</option>
                                                                            <option value="WV">West Virginia</option>
                                                                            <option value="WI">Wisconsin</option>
                                                                            <option value="WY">Wyoming</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12 my-3">
                                                                <div class="row form-group">
                                                                <div class="col-sm-3">
                                                                    <div class="">
                                                                        <label>Number or word :</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-5">
                                                                        <input type="TEXT" class="form-control" name="search-text" id="search-text" placeholder="Any">
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-8  text-right">
                                                                <button type="submit" class="btn btn-primary">Search</button>
                                                            </div>

                                                        </div>
                                                       </form>



                                                       <div id="searsh_phones_results" style="display:none" class="container-fluid  my-5">
                                                          <h1>Phone numbers Searsh results from signalwire API ......</h1>
                                                          <div style="height:auto;;border: 1px blue solid" class="container">
                                                            <div class="row d-flex justify-content-center">

                                                                @foreach ($numbers  as $number)
                                                                <div class="card-primary p-3">
                                                                    <div class="form-group">
                                                                        <label style="border: solid 1px purple" class="checkbox-inline">
                                                                           <input type="checkbox" id="inlineCheckbox1" value="{{$number->friendlyName}}"> {{$number->friendlyName}}
                                                                         </label>
                                                                   </div>
                                                                </div>
                                                                @endforeach

                                                            </div>

                                                          </div>
                                                        </div>

                                                    </div>


                                                <!-- end searsh phone numbers  -->

                                                <!-- start buttons logique -->
                                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel"
                                                    aria-labelledby="custom-tabs-four-messages-tab">

                                                    <div class="card-body table-responsive">
                                                        <table id="phoneNumbers" class="table table-bordered table-hover  datatable">
                                                            <thead>
                                                                <tr>
                                                                    <th>#ID</th>
                                                                    <th>Name</th>
                                                                    <th>State</th>
                                                                    <th>Phone Number</th>
                                                                    <th>RedirectTo</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @foreach ($data_bullk_update as $i)
                                                                    <tr>
                                                                        <td><input name="bullk_update[]" type="checkbox" id="checkboxPrimary2"></td>
                                                                        <td>{{ $i['name'] }}</td>
                                                                        <td>{{ $i['state'] }}</td>
                                                                        <td>{{ $i['group'] }}</td>
                                                                        <td>{{ $i['mobile'] }}</td>

                                                                        <td>{!! ($i['status'] == 1) ? '<span style="color: green;">Activate</span>' :  '<span style="color: red;">Not Activate</span>'  !!}</td>

                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="card-fotter my-3 text-right">
                                                        <button type="button" class="btn bg-gradient-danger">Bulk Delete csv</button>
                                                        <button type="button" class="btn  bg-gradient-danger">Bulk Delete</button>
                                                        <button type="button" class="btn  bg-gradient-primary">Bulk Update</button>
                                                        {{-- @endcan --}}
                                                    </div>

                                                </div>
                                                <!-- end buttons logique -->

                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

$(document).ready(function() {
    $('#searchForm').on('submit', function(e) {

        e.preventDefault();

        $.ajax({
            url: {{ route('searsh_phone_number') }},
            type: 'GET',
            dataType: 'json',//$(this).serialize()
            //dataType: 'json',
            success: function(response) {
                console.log(response);
               /*  var users = response.users;
                var userList = $('#userList');
                userList.empty();

                users.forEach(function(user) {
                    userList.append('<p>' + user.name + '</p>');
                }); */
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

      /*  $('#searchForm').on('submit', function(e) {
        e.preventDefault();

            $.ajax({
                url: $(this).attr('action'), // The URL of the route that will handle the request.
                type: 'POST', // The type of request to make (GET, POST, etc.).
                //dataType: "json",//$(this).serialize(), // The data to send with the request.
                success: function(response) { // The function to execute when the request is successful.
                    //$('#searsh_phones_results').show(); // Update the div with the search results.
                    console.log(response);
                },
                error: function(error) { // The function to execute if the request fails.
                    console.log(error);
                }
            });

        }); */
    </script>
@endsection

@section('modal')
@endsection
