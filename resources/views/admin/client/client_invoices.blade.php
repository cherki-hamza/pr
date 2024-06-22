@extends('admin.layouts.master')

@section('style')
<style>
    .loader {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 83%; /* Full height of the parent div */
      position: absolute;
      width: 100%;
      top: 0x;
      left: 0;
      z-index: 1; /* Ensure it is above the content */
      background-color: white;
    }

    /* Initially hide the content */
    .content{
      display: none;
    }
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

        <div class="loader">
            <img src="{{ asset('public/assets/images/loading.gif') }}" alt="Loading...">
         </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div id="content">
                    <div id="loading-overlay" style="display: none;">
                        <img src="/img/loading.gif" alt="Loading...">
                    </div>


<!-- Bonus Table -->
<div class="card mt-3">
        <div class="card-body">

            <div class="table-responsive" style="border-radius:5px">
                <table style="font-size: 20px" class="table table-sm table-dashboard table-bordered table-striped fs--1 p-0 datatable">
                    <thead class="bg-200 bg-primary">
                    <tr class="text-center">
                        <th class="d-table-cell">Order ID</th>
                        <th class="d-table-cell">Date</th>
                        <th class="d-xl-table-cell d-none">Order From Publisher URL</th>
                        <th class="d-table-cell">Transaction Amount</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($transactions as $transaction)
                           <tr class="text-center {{ ($transaction->status == 0) ? 'bg-danger': '' }}">

                            <td class="row d-table-cell"> {{  $transaction->id }}</td>

                            <td class="row d-table-cell"> {{ $transaction->created_at->format('D-M-Y') }} | {{  $transaction->created_at->diffForHumans() }}</td>


                             <td class="d-xl-table-cell d-none">{{ $transaction->site->site_url }}</td>

                            <td class="d-table-cell">${{ $transaction->price }}</td>

                           </tr>
                        @endforeach
                        <tr style="font-size: 20px;" class="text-center">
                            <td  class="bg-success">
                                <span class="ml-2 my-2">Total :</span>
                            </td>
                            <td colspan="2"></td>
                            <td class="bg-success">${{ $transactions->where('status',5)->sum('price') }}</td>
                        </tr>

                       </tbody>

                </table>
                <p class="text-center">

                 </p>
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
<script>
    // Function to hide loader and show content
    function showContent() {
      document.querySelector('.loader').style.display = 'none';
      document.querySelector('.content').style.display = 'block';
    }

    // Simulate content loading
    window.addEventListener('load', () => {
      setTimeout(showContent, 3000); // Change 3000 to the desired delay in milliseconds
    });
</script>

@endsection




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
