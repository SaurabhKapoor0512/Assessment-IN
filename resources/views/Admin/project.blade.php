@extends('Component-layouts.master')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/animate/animate.css"> --}}
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Advanced DataTable</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                                </li>
                                
                                <li class="breadcrumb-item active">Project Table
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="content-header-right col-md-6 col-12">
                    <div class="btn-group float-md-right">
                        <a href="/project-create" class="btn btn-info round btn-glow px-2">
                            Add New
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard dataTables_wrapper dt-bootstrap">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                <thead>
                                                    <tr>
                                                        <th>Project Name</th>
                                                        <th>Project Description</th>
                                                        <th>Project Client</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projects as $c)
                                                        <tr>
                                                            <td>{{ $c->name }}</td>
                                                            <td>{{ $c->description }}</td>
                                                            <td>{{ $c->user->name }}</td>
                                                            <td>
                                                                <a href="/projectview/{{$c->id}}" class="btn btn-primary">View</a>
                                                                <a href="/projectdelete/{{$c->id}}" class="btn btn-danger">Delete</a>
                                                                
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @section('page-js')
        <!-- BEGIN: Page Vendor JS-->
        <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
        <script>
            $('document').ready(function() {
                $('.select2').select2();
            });
        </script>
        <!-- END: Page Vendor JS-->
    @endsection
@endsection
