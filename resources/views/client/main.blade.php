@extends('Component-layouts.master')

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
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Project Bugs
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-detached ">
        <span class="container">
            {{$tickets_count}}
            <span class="badge badge-pill badge-primary">Total Bugs</span>
        </span>
        <span class="container">
            {{$open_tickets_count}}
            <span class="badge badge-pill badge-success">Open</span>
        </span>       
        <span class="container">
            {{$pending_tickets_count}}
            <span class="badge badge-pill badge-warning">Pending</span>
        </span>
        <span class="container">
            {{$completed_tickets_count}}
            <span class="badge badge-pill badge-danger">Completed</span>
        </span>

        </div>
        <br><br>
        <div class="content-detached ">
            <div class="content-body">
                <section >
                    <div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Raised Bugs</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <a href="/raiseticket" class="btn btn-primary btn-sm"><i class="ft-plus white"></i> Raise A Ticket</a>
                                </div>
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
                                                        @if($t->status=='Open')
                                                        
                                                            <span>{{$t->status}}</span>
                                                        </div>

                                                        @elseif($t->status=='Pending')
                                                            <span>{{$t->status}}</span>
                                                        </div>

                                                        @elseif($t->status=='Completed')
                                                        
                                                            <span>{{$t->status}}</span>
                                                        </div>

                                                        @elseif($t->status=='Closed')
                                                        
                                                            <span>{{$t->status}}</span>
                                                        </div>

                                                        @endif
                                                    </td>
                                                    <td><a href="/view-reply/{{$t->id}}">View</a></td>
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
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
                                                <!-- END: Content-->
