<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class ImageUploadController extends Controller
{
    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $file = public_path().'/imgs/pdp'.'/'.auth::user()->image;
        File::delete($file);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('imgs/pdp'), $imageName);
        auth::user()->image = $imageName;
        auth::user()->save();
        return back()
            ->with('success','You have successfully upload image.');
    }
}
