<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;

class RoleController extends Controller
{
    public function index(){
        if(auth()->user()->role=='admin'){
            return redirect('/client');
        }else if(auth()->user()->role=='client'){
        $client=User::where('email',auth()->user()->email)->where('role','client')->first();
        $tickets=Ticket::with('project','client','developer')->where('client_id',$client->id)->get();
        $tickets_count=Ticket::with('project','client')->where('client_id',$client->id)->count();
        $open_tickets_count=Ticket::with('project','client')->where('client_id',$client->id)->where('status','Open')->count();
        $pending_tickets_count=Ticket::with('project','client')->where('client_id',$client->id)->where('status','Pending')->count();
        $completed_tickets_count=Ticket::with('project','client')->where('client_id',$client->id)->where('status','Completed')->count();
        return view('client.main',compact('client','tickets','tickets_count','open_tickets_count','pending_tickets_count','completed_tickets_count'));
}
        else if(auth()->user()->role=='dev'){
            $dev = User::where('email',auth()->user()->email)->where('role','dev')->first();
            $tickets=Ticket::with('project','client','developer')->where('developer_id',$dev->id)->get();
            return view('developer.devindex',compact('dev','tickets'));
        }
    }
}
