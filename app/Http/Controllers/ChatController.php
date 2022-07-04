<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\msg;
use App\Models\User;
use App\Models\Classroom;
class ChatController extends Controller
{
     public function chat_show($id)
    {
        $classroom = classroom::find($id);
        $messages = $classroom->messages;
        $msgs = msg::all();
        $last = $msgs->last();
        return view('classroom.chatroom',compact('classroom','messages','last'));
    }
    public function send(request $request,$id)
    {
        $request->validate([
            'body' => 'required|string|max:2048',
        ]);
        $message = msg::create([
            'body'=> $request->body,
            'user_id'=> auth::user()->id,
            'classroom_id' => $id,
        ]);
        $user = $message->user;
        return response()
        ->json(['user' => $user,'message' => $message]);
    }
    public function get_messages($id,$id1)
    {
        $msgs = msg::all();
        $ide = $msgs->last();
        $ide = $ide->id;
        $message = $msgs->firstWhere('id', '>', $id);
        $classroom = classroom::find($id1);
        $class_owner = $classroom->user;
        $user = null;
        if(!is_null($message)){
            foreach($classroom->messages as $msg)
            if($msg->id == $message->id){
                $classroom = $message->classroom;
                $user = $message->user;
                return response()->json(['user' => $user,'message' => $message,'ide' => $ide,'class_owner' => $class_owner]);
            }
        }
         return response()->json(['user' => $user,'message' => $message,'ide' => $ide,'class_owner' => $class_owner]);
    }
    public function report($id){
        $msg = Msg::find($id);
        $msg->is_reported = true;
        $msg->save();
        return back()->with('success','You have successfully reported the message.');
    }
    public function report_show($id){
        $classroom = Classroom::find($id);
        $msgs = $classroom->reported_msgs;
        $i=1;
        return view('classroom.reported_messages',compact('msgs','classroom','i'));
    }
    public function prevent_chat($id1,$id,$id2){
        $classroom = Classroom::find($id1);
        $user = User::find($id);
        $msg = Msg::find($id2);
        $msg->body = "message has been deleted by admin";
        $msg->is_reported = false;
        $msg->save();
        $classroom->users()->detach($id);
        $classroom->users()->attach($id,[
            'valid' => 1,
            'is_allowed_chat' => 0,
        ]);
        return back()->with('success','You have successfully prevented this user from chatting.');
    }
    public function ignore($id){
        $msg = Msg::find($id);
        $msg->is_reported = false;
        $msg->save();
        return back();
    }
}
