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
                        <h4>Add Publisher</h4>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard </a></li>
                            <li class="breadcrumb-item active">Edit Publisher Site</li>
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
                            <div class="card-header">
                                <h3 class="card-title">
                                     <i class="fa fa-plus mr-2"></i>Edit Site Publisher : {{ $site->site_url ?? '' }}
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                   <form style="width: 100%" action="{{ route('update_publishers' , ['site_id' => $site->id]) }}" method="post">
                                     @csrf
                                     @method('PUT')

                                     {{--  --}}
                                     <div class="form-group my-5">
                                        <div class="row">
                                            <div class="col-4 col-md-4">
                                                <label>Site Name</label>
                                                <input type="text" class="form-control" value="{{ !empty($site->site_name) ? $site->site_name : removeAfterPeriod($site->site_url) }}" name="site_name" placeholder="Enter Site Name">
                                            </div>
                                            <div class="col-4 col-md-4">
                                                <label>Site Url</label>
                                                <input type="text" class="form-control" value="{{ $site->site_url ?? '' }}" name="site_url" placeholder="Enter Site Url">
                                            </div>
                                            <div class="col-4 col-md-4">
                                                <label>Site Genre</label>
                                                <input type="text" class="form-control" value="{{ $site->site_category ?? '' }}" name="site_cat" placeholder="Enter Site Genre">
                                            </div>
                                           {{--  <div class="col-4 col-md-3">
                                                <label>Site Genre</label>
                                                <input type="text" class="form-control" name="site_cat" placeholder="Enter Site Genre">
                                            </div> --}}
                                        </div>
                                        {{--  --}}

                                        <hr style="border: solid rgb(197, 83, 83) 2px">

                                        {{--  --}}
                                     <div class="form-group my-5">
                                        <div class="row">
                                            <div class="col-4 col-md-3">
                                                <label>Site Domain Authority <span class="text-danger">(DA)</span></label>
                                                <input type="text" class="form-control" value="{{ $site->site_domain_authority ?? '' }}" name="site_da" placeholder="Enter Site Domain Authority">
                                            </div>
                                            <div class="col-4 col-md-3">
                                                <label>Site Domain Rating <span class="text-danger">(DR)</span></label>
                                                <input type="text" class="form-control" value="{{ $site->site_domain_rating ?? '' }}" name="site_dr" placeholder="Enter Site Domain Rating">
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Site Sponsored</label>
                                                <select name="site_sponsored" class="form-control">
                                                    <option selected value="{{ $site->site_sposored ?? '' }}">{{ $site->site_sposored ?? '' }}</option>
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Site INDEXED</label>
                                                <select name="site_indexed" class="form-control">
                                                    <option selected value="{{ $site->site_indexed ?? '' }}">{{ $site->site_indexed ?? '' }}</option>
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Site DOFOLLOW</label>
                                                <select name="site_dofollow" class="form-control">
                                                    <option selected value="{{ $site->site_dofollow ?? '' }}">{{ $site->site_dofollow ?? '' }}</option>
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{--  --}}

                                        <hr style="border: solid rgb(197, 83, 83) 2px">

                                        {{--  --}}
                                     <div class="form-group my-5">
                                        <div class="row">
                                            <div class="col-4 col-md-2">
                                                <label>Site Spam Score</label>
                                                <input type="number" class="form-control" value="{{ $site->spam_score  ?? '' }}" name="spam_score">
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Site Turnaround Time</label>
                                                <input type="text" class="form-control" value="{{ $site->site_time ?? '' }}" name="site_tat">
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Word Limite</label>
                                                <input type="text" class="form-control" name="word_limite" value="{{ $site->word_limite ?? '' }}">
                                            </div>
                                            @if(empty($site->pr_site_id))
                                            <div class="col-4 col-md-3">
                                                <label>Site Country/Region</label>
                                                <input type="text" class="form-control" value="{{ $site->site_region_location ?? '' }}" name="site_country">
                                            </div>
                                            <div class="col-4 col-md-3">
                                                <label>Site Price</label>
                                                <input type="number" class="form-control" value="{{  str_replace(',', '', $site->site_price)  ?? '' }}" name="site_price">
                                            </div>
                                            @else
                                            <div class="col-4 col-md-2">
                                                <label>Site Country/Region</label>
                                                <input type="text" class="form-control" value="{{ $site->site_region_location ?? '' }}" name="site_country">
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Content Placment Price</label>
                                                <input type="number" class="form-control" value="{{  str_replace(',', '', $site->site_c_p_price)  ?? '' }}" name="site_c_p_price">
                                            </div>
                                            <div class="col-4 col-md-2">
                                                <label>Content Creation & Placement Price</label>
                                                <input type="number" class="form-control" value="{{  str_replace(',', '', $site->site_c_c_p_price)  ?? '' }}" name="site_c_c_p_price">
                                            </div>
                                            @endif
                                        </div>
                                        {{--  --}}

                                        <div class="form-group  text-right my-5">

                                               <input type="submit" class="btn btn-success" value="Update Publisher Site">
                                        </div>

                                     </div>
                                   </form>
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

@endsection
