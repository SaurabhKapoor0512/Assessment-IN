@extends('Component-layouts.master')
@section('page-css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/animate/animate.css"> --}}
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/selects/select2.min.css">
@endsection
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="match-height">
                        <div >
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Raise A Ticket</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <form class="form" action="/raiseticketstore" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i> Developer Info</h4>
                                                <div >
                                                    <div >
                                                        <div class="form-group">
                                                            <label for="projectinput1">Ticket Raised Against</label>
                                                            <select class="select2 form-control" name="developer_id" id="dev">
                                                                @foreach ($devs as $d)
                                                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="projectinput1">Project Raised Against</label>
                                                            <select class="select2 form-control" name="project_id" id="proj">
                                                                @foreach ($projects as $d)
                                                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="projectinput1">Status</label>
                                                            <select class="select2 form-control" name="status" id="status">
                                                                <option value="Open">Open</option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Completed">Completed</option>
                                                                <option value="Closed">Closed</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                                <h4 class="form-section">Tell Us About The Issue</h4>

                                                <div class="form-group">
                                                    <label for="companyName">Title</label>
                                                    <input type="text" id="companyName" class="form-control"
                                                        placeholder="Ticket Main Issue" name="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="companyName">Description</label>
                                                    <input type="text" id="companyName" class="form-control"
                                                        placeholder="Describe the issue" name="description">
                                                </div>
                                                <div class="form-group">
                                                    <label>Select File</label>
                                                    <label id="projectinput7" class="file center-block">
                                                        <input type="file" name="image" id="file">
                                                        <span class="file-custom"></span>
                                                    </label>
                                                </div>

                                                <input type="hidden" name="client_id" value="{{$id}}">
                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </form>
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
@section('script')
        <!-- BEGIN: Page Vendor JS-->
        <script src="../../../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
        <script>
            $('document').ready(function() {
                $('.select2').select2();
            });
        </script>
        <!-- END: Page Vendor JS-->
@endsection
