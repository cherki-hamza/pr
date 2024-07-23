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
                            <li class="breadcrumb-item active">Packages</li>
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
                    <div class="col-6">
                      <div class="card mt-2">
                        <h2 class="ml-3 mt-1">All Package:</h2>
                        <div class="card-body table-responsive">
                            <table id="editableTable" class="table table-bordered table-hover datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Package Offer</th>
                                        <th>Package Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($packages as $package)
                                        <tr data-id="{{ $package->id }}">
                                            <td>{{ $package->id }}</td>
                                            <td data-field="package_offre" contenteditable="true">{{ $package->package_offre }} Words</td>
                                            <td data-field="package_price" contenteditable="true">${{ $package->package_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-6">
                        <div class="card mt-2">
                            <h2 class="ml-3 mt-1">Package Details:</h2>
                            <div style="display: block;font-size: 20px" id="alert_package" class="aler alert-warning py-2 mx-2 text-center">Oops At least one package must be entered.</div>
                            <div class="card-body table-responsive">
                            <form action="{{ route('store_packages') }}" method="POST" id="packageForm">
                                @csrf
                                <div class="input-group mb-3" id="inputTemplate">
                                    <label for="">Package Order:</label>
                                    <input type="text" class="form-control mx-2" placeholder="example : 100 - 500" name="packageName[]">
                                    <label for="">Package Price:</label>
                                    <input type="number" class="form-control mx-2" placeholder="500" name="packagePrice[]">

                                    <button class="btn btn-danger" type="button" onclick="removeInput(this)">Remove</button>
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-primary ml-3 mb-3" onclick="cloneInput()">Add More</button>
                                    <button type="submit" class="btn btn-success ml-3 mb-3">Submit</button>
                                </div>

                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('js')

<script>
    function cloneInput() {
        var original = document.getElementById('inputTemplate');
        var clone = original.cloneNode(true); // deep clone
        clone.id = ""; // remove id or set to another unique value
        original.parentNode.insertBefore(clone, original);
    }

    function removeInput(button) {
        // only remove the input group if more than one is present
        if (document.querySelectorAll('.input-group').length > 1) {
            button.closest('.input-group').remove();
        } else {
            alert("At least one package must be entered.");
        }
    }
</script>

<script>
    $(document).ready(function() {
        $("#editableTable td[contenteditable=true]").on("blur", function() {
            var cell = $(this);
            var newValue = cell.text();
            var field = cell.data("field");
            var rowId = cell.closest("tr").data("id");

            console.log(cell);
            console.log(newValue);
            console.log(field);
            console.log(rowId);

            $.ajax({
                url: '/admin/packages/editable-table/update', // Change to your server endpoint
                dataType : 'json',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for security
                    id: rowId,
                    field: field,
                    value: newValue
                },
                success: function(response) {
                    alert('Update successful');
                },
                error: function(xhr, status, error) {
                    alert('Update failed: ' + error);
                }
            });
        });
    });
    </script>

@endsection
