<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function viewreply($id){
        $replies = Reply::where('ticket_id', $id)->get();
        // dd($tic_id);
        return view('reply.replies',compact('id','replies'));
    }

    public function storereply(Request $request){
        $reply = new Reply();
        $reply->ticket_id = $request->id;
        $reply->content = $request->content;
        $reply->user_id = auth()->user()->id;
        $reply->save();
        return redirect()->back();
    }
}
