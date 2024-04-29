@extends('admin.layouts.master')

@section('style')
 <style>

 </style>
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
                <div id="content">
                    <div id="loading-overlay" style="display: none;">
                        <img src="/img/loading.gif" alt="Loading...">
                    </div>


    <div class="main-body pt-2">


        <!-- Errors and Success Messages -->

            <!-- / Errors and Success Messages -->

        <!-- /Report Activities -->



        <!-- Buyer Balance -->
       <div class="row gutters-sm ">
        <!-- Bonus -->
    {{-- <div class="col-sm-6 col-xl-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="h2 d-flex justify-content-between mb-2">
                    <span class="">$0.00</span>
                    <i class="mr-2 font-size-lg text-facebook" data-fa-i2svg="">
                        <svg class="svg-inline--fa fa-wallet fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="wallet" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M461.2 128H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h384c8.84 0 16-7.16 16-16 0-26.51-21.49-48-48-48H64C28.65 32 0 60.65 0 96v320c0 35.35 28.65 64 64 64h397.2c28.02 0 50.8-21.53 50.8-48V176c0-26.47-22.78-48-50.8-48zM416 336c-17.67 0-32-14.33-32-32s14.33-32 32-32 32 14.33 32 32-14.33 32-32 32z"></path>
                        </svg>
                    </i>
                </div>
                <h5>Bonus</h5>
                <p class="small mb-0">The total amount that may be added during promotion campaigns</p>
            </div>
        </div>
    </div> --}}
    <!-- / Bonus -->

    <!-- Reserved -->
    {{-- <div class="col-sm-6 col-xl-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="h2 d-flex justify-content-between mb-2">
                    <span class="">$0.00</span>
                    <i class="mr-2 font-size-lg text-facebook" data-fa-i2svg=""><svg class="svg-inline--fa fa-file-invoice-dollar fa-w-12" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="file-invoice-dollar" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M377 105L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1c0-6.3-2.5-12.4-7-16.9zm-153 31V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zM64 72c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8V72zm0 80v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8zm144 263.88V440c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-24.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V232c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v24.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07z"></path></svg></i>
                </div>
                <h5 class="">Reserved</h5>
                <p class="small text-secondary mb-0">The Total amount that have been reserved for incompleted tasks</p>
            </div>
        </div>
    </div> --}}
    <!-- / Reserved -->

    <!-- MAIN BALANCE -->
    <div class="col-sm-6 col-xl-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="h2 d-flex justify-content-between mb-2">
                    @if (!auth()->user()->role == 'super-admin')
                       <span class="">$ {{ \App\Models\Payment::sum('amount') }}</span>
                    @else
                       <span class="">$ {{ \App\Models\Payment::where('user_id' , auth()->id())->sum('amount') }}</span>
                    @endif
                    <i class="mr-2 font-size-lg text-facebook" data-fa-i2svg=""><svg class="svg-inline--fa fa-money-check-alt fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-check-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M608 32H32C14.33 32 0 46.33 0 64v384c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM176 327.88V344c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-16.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V152c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07zM416 312c0 4.42-3.58 8-8 8H296c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16zm160 0c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-96c0 4.42-3.58 8-8 8H296c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h272c4.42 0 8 3.58 8 8v16z"></path></svg></i>
                </div>
                <h5>Main Balance</h5>
                <p class="small mb-0">The Total amount available for purchase that you have added</p>
            </div>
        </div>
    </div>
    <!-- / MAIN BALANCE -->


   @if (auth()->user()->role == 'client')
    <div class="col">
        <div class="d-flex justify-content-between float-right">

        <a href="{{ route('add_funds') }}" class="btn float-right" role="button" style="background-color:#3c5a99; color:white"><i class="mr-2" data-fa-i2svg="">
        <svg style="width: 20px;" class="svg-inline--fa fa-coins fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="coins" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
        <path fill="currentColor" d="M0 405.3V448c0 35.3 86 64 192 64s192-28.7 192-64v-42.7C342.7 434.4 267.2 448 192 448S41.3 434.4 0 405.3zM320 128c106 0 192-28.7 192-64S426 0 320 0 128 28.7 128 64s86 64 192 64zM0 300.4V352c0 35.3 86 64 192 64s192-28.7 192-64v-51.6c-41.3 34-116.9 51.6-192 51.6S41.3 334.4 0 300.4zm416 11c57.3-11.1 96-31.7 96-55.4v-42.7c-23.2 16.4-57.3 27.6-96 34.5v63.6zM192 160C86 160 0 195.8 0 240s86 80 192 80 192-35.8 192-80-86-80-192-80zm219.3 56.3c60-10.8 100.7-32 100.7-56.3v-42.7c-35.5 25.1-96.5 38.6-160.7 41.8 29.5 14.3 51.2 33.5 60 57.2z"></path></svg></i>
          Add Funds
       </a>
        </div>
    </div>
    @endif

</div>


<!-- Transfer Bonus To Your Main Balance -->
<div class="modal fade show" id="transferBonusToYourMainBalance" tabindex="-1" aria-labelledby="basicModalLabel" style="display: none; padding-right: 9px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #ffdb4a; color: #4c4116">
                <h5 class="modal-title" id="basicModalLabel" style="color: #4c4116">Transfer bonus to your main balance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="outline: none !important; box-shadow: none;">
                    <span aria-hidden="true" class="" style="color: black">×</span>
                </button>

            </div>
            <form action="https://icopify.co/buyer/transferBonus" method="POST" class="d-inline" onsubmit="this.querySelectorAll('[type=submit]').forEach(b => b.disabled = true)">
                <input type="hidden" name="_token" value="CammiquJuKDFAERZMfDAJbsoVcEgvrRbPoaoQ6ta">                <input type="hidden" name="_method" value="PUT">                <div class="m-3">
                    <label for="cat">Amount you would like to transfer</label>
                    <input class="form-control" type="number" name="transferBonus" step="0.01" min="0.01" max="0.00" value="0.00" required="">

                </div>
                <div class="modal-footer">
                    <div class="m-auto d-inline-flex">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Cancel &amp; Return</button>
                        <button type="submit" class="btn float-right ml-1" style="background-color: #ffdb4a; color: #4c4116">Transfer Now</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / Transfer Bonus To Your Main Balance -->



<!-- Bonus Table -->
<div class="card mt-3">
        <div class="card-body">

            <div class="table-responsive" style="border-radius:5px">
                <table class="table table-sm table-dashboard table-bordered table-striped fs--1 p-0">
                    <thead class="bg-200">
                    <tr class="text-center">
                        <th class="d-table-cell">Date</th>
                        <th class="d-xl-table-cell d-none">Transaction Description</th>
                        <th class="d-table-cell">Transaction Amount</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($transactions as $transaction)
                            <tr class="text-center">
                                <td class="row d-table-cell">{{  $transaction->created_at->diffForHumans() }}</td>
                                <td class="d-xl-table-cell d-none">You have transfer your bonus to your main balance from client name :  <span class="text-danger">{{ $transaction->user->name }}</span></td>
                                <td class="d-table-cell">${{ $transaction->amount }}</td>
                            </tr>
                        @endforeach

                       </tbody>
                </table>
                   <div class="my-4">
                      {{ $transactions->links() }}
                   </div>
            </div>
        </div>
    </div>

    <div>
        <ul class="pagination justify-content-center mb-0 pt-3">
            <li class="page-item">

            </li>
        </ul>
    </div>

<!-- / Bonus Table -->
                    <!-- / Buyer Balance -->

        <!-- Publisher & Writer Balance -->
                    <!-- / Publisher & Writer Balance -->

        <!-- Affiliate Balance -->
                    <!-- / Affiliate Balance -->


        <!-- Publisher & Writer Balance -->
                <!-- / Publisher & Writer Balance -->





        </div>






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
<script src="{{ asset('public/template/admin/plugins/jquery/jquery.min.js') }}"></script>
<script>
     $(document).ready(function() {

        // start update status
        $("input:checkbox").change(function() {
            //e.preventDefault();
            let id = $(this).attr("data-id");
            console.log(id);
            $.ajax({
                    url: "{{ route('update_status') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {

                    },
                });
                setTimeout(function () { document.location.reload(true); }, 1000);
        });
        // end update status


        // start edit project
            // start user edit modal
            $(document).on("click", '.update_status', function() {
                e.preventDefault();
                let id = $(this).attr("data-id");


                /* $('#toggle-event').change(function() {
                    //$('#console-event').html('Toggle: ' + $(this).prop('checked'))

                }) */
                alert(id)
                $.ajax({
                    url: "{{ route('update_status') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        //console.console.log(data);
                    },
                });
            });
        // end edit project

       /*  $('#update_status').submit(function(e) {
        	e.preventDefault();
        	const formData = new FormData(this);
           // Send an AJAX request
            $.ajax({
                type: 'POST',
                url: '{{ route("update_status") }}',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    // Handle the response message
                    //$('#cf-response-message').text(response.message);
                    alert('dev .....');
                    console.log('status clicked ...');
                },
                error: function(xhr, status, error) {
                    // Handle errors if needed
                    console.error(xhr.responseText);
                }
            });
 		}); */
        // end update status


        // start edit project
            // start user edit modal
            $(document).on("click", '.btn_project_edit', function() {
                let id = $(this).attr("data-id");
                //alert(id)
                //$('#modal-loading').modal({backdrop: 'static', keyboard: false, show: true});
                $.ajax({
                    url: "{{ route('show_project') }}",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id: id,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        var data = data.data;
                        $("#project_name").val(data.project_name);
                        $("#project_url").val(data.project_url);
                        $("#id").val(data.id);
                        $('#modal-loading').modal('hide');
                        $('#modal-edit').modal({backdrop: 'static', keyboard: false, show: true});
                    },
                });
            });
        // end edit project


         // start user delete modal
         $(document).on("click", '.btn_delete_project', function() {
                let id = $(this).attr("data-id");
                let name = $(this).attr("data-name");
                $("#did").val(id);
                $("#delete-data").html(name);
                $('#modal-delete').modal({backdrop: 'static', keyboard: false, show: true});
            });
            // end user delete modal

    });
</script>

@section('modal')
    {{-- Modal tambah --}}
    <div class="modal fade" id="create_project">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-folder-plus"></i>
                        Add New Project
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group">
                            <label>Project Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                    placeholder="Name" name="project_name" value="{{ old('project_name') }}">
                                @error('project_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Project URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_url') is-invalid @enderror"
                                    placeholder="https://example.com" name="project_url"
                                    value="{{ old('project_url') }}">
                                @error('project_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- Modal Update --}}
    <div class="modal fade" id="edit_project">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update_project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="input-group">
                            <label>Project Name</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                    placeholder="Name" name="project_name" id="project_name" value="{{ old('project_name') }}">
                                @error('project_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Project URL</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('project_url') is-invalid @enderror"
                                    placeholder="https://example.com" name="project_url" id="project_url"
                                    value="{{ old('project_url') }}">
                                @error('project_url')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- Modal delete --}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Project</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('destroy_project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <p class="modal-text">Are you sure you want to delete it? <b id="delete-data"></b></p>
                        <input type="hidden" name="id" id="did">
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection
