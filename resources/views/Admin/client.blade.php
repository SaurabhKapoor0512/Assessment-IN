@extends('Component-layouts.master')
@section('page-css')
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
{{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css">
<link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/animate/animate.css"> --}}

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
                            <li class="breadcrumb-item active">Advanced DataTable
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="content-header-right col-md-6 col-12">
                <div class="btn-group float-md-right">
                    <a href="/client-loginview" class="btn btn-primary">
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
                                                    <th>Client Name</th>
                                                    <th>Client LoginID</th>
                                                    <th>Client Password</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $c)
                                                <tr>
                                                    <td>{{$c->name}}</td>
                                                    <td>{{$c->email}}</td>
                                                    <td>{{$c->password}}</td>
                                                    <td>
                                                        <a href="/viewclient/{{$c->id}}" class="btn btn-success">View</a>
                                                        <a href="/deleteclient/{{$c->id}}" class="btn btn-danger">Delete</a>
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
@endsection

