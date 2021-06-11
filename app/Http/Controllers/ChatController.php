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
}
