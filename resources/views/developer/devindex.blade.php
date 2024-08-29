@extends('Component-layouts.master')
@section('css')
@endsection
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Project Bugs</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                            </li>
                        
                            <li class="breadcrumb-item active">Project Bugs
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div id="stats" style="display:flex;justify-content:space-around;align-items:center;">
            <div id="box1" style="height:150px;width:150px;background-color:rgb(169, 169, 230);margin:10px">
                <h2>Total Tickets Assigned To Me : {{$tickets_count}}</h2>
            </div>
            <div id="box2" style="height:150px;width:150px;background-color:rgb(176, 176, 227);margin:10px;padding:10px;">
                <h2>Total Tickets Open : {{$open_tickets_count}}</h2>
            </div>
            <div id="box3" style="height:150px;width:150px;background-color:rgb(182, 182, 223);margin:10px;padding:10px;">
                <h2>Total Tickets Pending : {{$pending_tickets_count}}</h2>
            </div>
            <div id="box4" style="height:150px;width:150px;background-color:rgb(181, 181, 214);margin:10px;padding:10px;">
                <h2>Tickets Completed : {{$completed_tickets_count}}</h2>
            </div>
        </div> --}}
        <div class="content-detached ">
            <div class="content-body">
                <section >
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Bugs</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                {{-- <div class="heading-elements">
                                    <button class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Raise A Ticket</button>
                                </div> --}}
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <!-- Task List table -->
                                    <div class="table-responsive">
                                        <table id="project-bugs-list" class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                                            <thead>
                                                <tr>
                                                    <th>Ticket ID</th>
                                                    <th>Ticket Title</th>
                                                    <th>Ticket Description</th>
                                                    <th>Ticket Image</th>
                                                    <th>Raised To</th>
                                                    <th>Raised By</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tickets as $t)
                                                <tr>
                                                    <td>{{$t->id}}</td>
                                                    <td>
                                                        {{$t->name}}
                                                    </td>
                                                    <td>
                                                    <p class="text-muted font-small-2">{{$t->description}}</p>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $t->image) }}" alt="" style="width:70px;height:70px">
                                                    </td>
                                                    <td class="text-center">
                                                        <h4>{{$t->developer->name}}</h4>
                                                    </td>
                                                    <td class="text-center">
                                                        <h4>{{$t->client->name}}</h4>
                                                    </td>
                                                    <td>
                                                        <input type="text" value={{$t->status}} disabled name="status">

                                                        <td><a href="/view-reply/{{$t->id}}">View</a></td>
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
                </section>

            </div>
        </div>

    </div>
</div>
@endsection
<!-- END: Content-->
@section('script')
<script src="../../../app-assets/js/core/libraries/jquery_ui/jquery-ui.min.js"></script>
{{-- <script src="../../../app-assets/vendors/js/forms/select/select2.min.js"></script> --}}
<script src="../../../app-assets/vendors/js/tables/jquery.dataTables.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
<script src="../../../app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js"></script>
<script src="../../../app-assets/vendors/js/charts/apexcharts/apexcharts.min.js"></script>
<script src="../../../app-assets/js/scripts/pages/project-bug-list.js"></script>
<script src="../../../app-assets/js/scripts/pages/project-summary-bug.js"></script>
<script src="../../../app-assets/js/scripts/ui/jquery-ui/date-pickers.js"></script>
<script>
    function cl(id){
        $(`#select-status${id}`).on('change', function() {
        var status = Number($(this).val());
        console.log(status,id);
        $.ajax({
            url:'/upstat',
            method:'POST',
            data:{
                _token: '{{ csrf_token() }}',
                id: id,
                status: status
            },
            success:function(message){
                console.log(message);
                // window.location.reload();
            },
            error:function(error){
                alert(error.responseJSON.message);
            }
        })

    })
    }
</script>
@endsection
