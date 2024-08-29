<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Client under AdminController
    public function newclients(){
        $clients=User::where('role','client')->get();
        return view('Admin.client',compact('clients'));
    }
    public function viewNewClient(){
        return view('Admin.newclient');
    }
    public function storeclients(Request $request){
        if(auth()->user()->role=='admin'){
            $client=new User();
            $client->name=$request->name;
            $client->email=$request->login;
            $client->password = Hash::make($request->pass);
            $client->role='client';
            $client->save();
            return redirect('/client');
        }
        else{
            return redirect()->back();
        }
    }
    public function viewClient($id){
        $client=User::find($id);
        return view('Admin.viewclient',compact('client'));
    }
    public function deleteClient($id){
        $client=User::find($id);
        $client->delete();
        return redirect('/client');
    }

    //Dev under AdminController
    public function newDev(){
        $devs=User::where('role','dev')->get();
        return view('Admin.dev',compact('devs'));
    }
    public function viewNewdev(){
        return view('Admin.newdev');
    }
    public function storedevs(Request $request){
        if(auth()->user()->role=='admin'){
            $dev=new User();
            $dev->name=$request->name;
            $dev->email=$request->login;
            $dev->password = Hash::make($request->pass);
            $dev->role='dev';
            $dev->save();
            return redirect('/dev');
        }
        else{
            return redirect('/dev');
        }
    }
    public function viewdev($id){
        $dev=User::find($id);
        return view('Admin.viewdev',compact('dev'));
    }
    public function deletedev($id){
        $client=User::find($id);
        $client->delete();
        return redirect('/dev');
    }

    //Projects under AdminController

    public function newproject(){
        $clients=User::where('role','client')->get();
        $projects=Project::all();
        $devs=User::where('role','dev')->get();
        return view('Admin.project',compact('clients','projects','devs'));
    }
    public function createproject(){
        $clients = User::where('role','client')->get();
        return view('Admin.newproject',compact('clients'));
    }
    public function projectstore(Request $request){
        if(auth()->user()->role=='admin'){
            $client=new Project();
            $client->name=$request->name;
            $client->description=$request->description;
            $client->user_id=$request->client_id;
            $client->save();
            return redirect('/project');
        }
        else{
            return redirect('/project');
        }
    }
    public function projectview($id){
        $project = Project::find($id);
        return view('Admin.viewproject',compact('project'));
    }
    public function projectdelete($id){
        $project=Project::find($id);
        $project->delete();
        return redirect('/project');
    }
}
