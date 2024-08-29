<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;


class TicketController extends Controller
{
    public function raiseticket(){
    $devs=User::where('role','dev')->get();
    $client=User::where('email',auth()->user()->email)->first();
    $projects=Project::with('user')->where('user_id',$client->id)->get();
    $id=auth()->user()->id;
    return view('client.raiseTicket',compact('devs','projects','id'));
    }

    public function raiseticketstore(Request $request){
        $ticket=new Ticket();
        if($request->hasFile('image')){
            $image=$request->file('image');
            $path=$image->store('image','public');
            $ticket->image=$path;
        }
        $ticket->name=$request->name;
        $ticket->description=$request->description;
        $ticket->status=$request->status;
        $ticket->developer_id=$request->developer_id;
        $ticket->project_id=$request->project_id;
        $ticket->client_id=$request->client_id;
        $ticket->save();

        return redirect('/indexproject');
    }
    public function showticket(){
        $id=auth()->user()->id;
        $tickets=Ticket::with('project','developer')->where('client_id',$id)->get();
        return view('client.showTicket',compact('tickets'));

    }
}
