<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Ticket;

class ClientController extends Controller
{
    public function myprojects(){
        if(auth()->user()->role=='client'){
            $projects = Project::where('user_id',auth()->user()->id)->get();
            return view('client.clientprojects', compact('projects'));
        }
    }
    public function indexproject(){
        $client=User::where('email',auth()->user()->email)->where('role','client')->first();
        $tickets=Ticket::with('project','client','developer')->where('client_id',$client->id)->get();
        $tickets_count=Ticket::with('project','client','developer')->where('client_id',$client->id)->count();
        $open_tickets_count=Ticket::with('project','client','developer')->where('client_id',$client->id)->where('status','Open')->count();
        $pending_tickets_count=Ticket::with('project','client','developer')->where('client_id',$client->id)->where('status','Pending')->count();
        $completed_tickets_count=Ticket::with('project','client','developer')->where('client_id',$client->id)->where('status','Completed')->count();
        return view('client.main',compact('client','tickets','tickets_count','open_tickets_count','pending_tickets_count','completed_tickets_count'));
    }
      
    public function raise(){
        if(auth()->user()->role=='client'){
            $devs=User::where('role','dev')->get();
            $projects=Project::where('user_id',auth()->user()->id)->get();
            $id=auth()->user()->id;
            return view('client.raise', compact('devs','projects','id'));
        }
    }
}
