<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\course;
use App\Models\post;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\File;
class PostController extends Controller
{
    public function store(Request $request,$id){
        $media = null;
        $ext = null;
        if(!is_null($request->media)){
            $file = $request->media;
            $mime = $file->getMimeType();
            if(Str::contains($mime, 'video') && auth::user()->hasRole('teacher')){
                $request->validate([
                    'body' => 'required|string|max:2048',
                    'media' => 'mimes:mp4'
                ]);
            }
            elseif(Str::contains($mime, 'image')){
                $request->validate([
                    'body' => 'required|string|max:2048',
                    'media' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }else return back()->withErrors(['there was an error within your upload']);
            $ext = $request->media->extension();
            $media = time().'.'.$ext;
            $request->media->move(public_path('imgs/classes_posts_media'), $media);
        }else{
            $request->validate([
                'body' => 'required|string|max:2048',
            ]);
        }
         post::create([
            'body'=> $request->body,
            'media'=> $media,
            'user_id'=> auth::user()->id,
            'classroom_id' => $id,
            'ext' => $ext,
        ]);
        return back()->with('success','You have successfully created the post.');
    }
    public function edit(request $request,$id){
        $post = post::find($id);
        if(is_null($request->media)){
            $request->validate([
                'body' => 'required|string|max:2048',
            ]);
            $post->body = $request->body;
            $post->save();
            return back()->with('success','You have successfully updated the post.');
        }else {
            $request->validate([
            'body' => 'required|string|max:2048',
        ]);
        $post->body = $request->body;
        $file = public_path().'/imgs/classes_posts_media'.'/'.$post->media;
        File::delete($file);
        $ext = $request->media->extension();
        $media = time().'.'.$ext;
        $request->media->move(public_path('imgs/classes_posts_media'), $media);
        $post->media = $media;
        $post->save();
        return back()->with('success','You have successfully updated the post.');
    }
    }
    public function delete(request $request,$id){
        $post = post::find($id);
        $file = public_path().'/imgs/classes_posts_media'.'/'.$post->media;
        File::delete($file);
        $post->delete();
        return back()
        ->with('success','You have successfully deleted the post.');
    }

    public function ajaxrequest()
    {
        return view('test');
    }
   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function ajaxrequestpost(Request $request)
    {
        $com = new Comment();
        $com->body = $request->body;
        $com->post_id = $request->post_id;
        $com->user_id = $request->user_id;
        $com->save();
        $user = $com->user;
        $post = post::find($request->post_id);
        $nbr = $post->comments->count();
        return response()
            ->json(['user' => $user,'comment' => $com,'nbr' => $nbr]);
    }
    public function ajaxrequestpost1(Request $request)
    {
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = $request->user_id;
        $comment->parent_id = $request->parent_id;
        $comment->save();
        $com = comment::find($request->parent_id);
        $nbr = $com->replies->count();
        $user = $comment->user;
        return response()
            ->json(['user' => $user,'comment' => $comment,'nbr' => $nbr]);
    }
}
