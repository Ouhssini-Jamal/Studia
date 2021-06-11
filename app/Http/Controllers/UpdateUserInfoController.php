<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
class UpdateUserInfoController extends Controller
{
    public function updatename(Request $request){
        $request->validate([
            'fname' => 'required|string|regex:/^[a-zA-Z]+$/|max:255',
            'lname' => 'required|string|regex:/^[a-zA-Z]+$/|max:255',
        ]);
        auth::user()->fname = $request->fname;
        auth::user()->lname = $request->lname;
        auth::user()->save();
        return back()
        ->with('success','You have successfully updated your name.');
    }
    public function updateemail(Request $request){
        $request->validate([
            'email' => 'required|string|unique:users|email|max:255',
        ]);
        auth::user()->email = $request->email;
        auth::user()->save();
        return back()
        ->with('success','You have successfully updated your email.');
    }
    public function updatepassword(Request $request){
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);
        auth::user()->password = Hash::make($request->password);
        auth::user()->save();
        return back()
        ->with('success','You have successfully updated your password.');
    }
}
