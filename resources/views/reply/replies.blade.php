@extends('Component-layouts.master')
@section('title')
    Chat model
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
                            <li class="breadcrumb-item"><a href="/dashboard">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Chat with others</li>                           </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <h3>Chat Box </h3>
        <div>
        @foreach($replies as $r)
        <textarea name="reply" rows="2" cols="50" readonly>{{$r->content}}</textarea>
        <br>
        <p>By: {{$r->user->name}} on {{$r->created_at}}</p>
        @endforeach
        <div>
            <br>
        <div class="row">
            <div class="col-md-6">          
                <form method="post" action="/store/reply">
                    @csrf
                    <div>
                    <input type="hidden" name="id" value="{{$id}}">
                    <input type="text" class="form-control" placeholder="Type a Message" name="content">
                    </div>
                    <br>
                    <div>
                    <button type="submit">Send</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div> 
</div>
   
@endsection
