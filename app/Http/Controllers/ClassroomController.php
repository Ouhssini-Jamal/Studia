<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\course;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\msg;
use App\Models\rating;
use Illuminate\Support\Facades\File;
class classroomController extends Controller
{
    public function store(Request $request){

        if(!is_null($request->code)){
            $request->validate([
                'name'=>'required|string|unique:classrooms|max:255',
                'code'=>'unique:classrooms|max:255',
                'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'desc' => 'string|required|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs/classes_covers'), $imageName);
        $classroom = Classroom::create([
            'name'=>$request->name,
            'code'=>$request->code,
            'user_id'=> auth::user()->id,
            'image' => $imageName,
            'desc' => $request->desc,
        ]);
    }else{
        $request->validate([
            'name'=>'required|string|unique:classrooms|max:255',
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'desc' => 'string|required|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('imgs/classes_covers'), $imageName);
        $classroom = Classroom::create([
        'name'=>$request->name,
        'is_public' => 1,
        'user_id'=> auth::user()->id,
        'image' => $imageName,
        'desc' => $request->desc,
    ]);}
        return redirect('/dashboard')->with('success','You have successfully created the classroom.');
    }
    public function index(){
        if(auth::user()->hasRole('teacher')){
            $classrooms1 = auth::user()->classrooms1;
            $classrooms1 = $classrooms1->take(3);
            return view('classroom.create')->with(compact('classrooms1'));
        }
        if(auth::user()->hasRole('student')){
            $classrooms1 = auth::user()->classrooms;
            $classrooms1 = $classrooms1->take(3);
            return view('classroom.join')->with(compact('classrooms1'));
        }
    }
    public function join(Request $request){
        $request->validate([
            'code'=>'required|string|max:255',
        ]);
        $classrooms=classroom::all();
        $classes=auth::user()->classrooms;
        foreach ($classrooms as $classroom) {
            if($classroom->code == $request->code){
                foreach($classroom->waiters as $waiter){
                    if($waiter->id == auth::user()->id)
                    return back()
                    ->withErrors(['you have already sent a request for this classroom']);
                }
                foreach($classes as $class){
                    if($class->code == $request->code)
                    return back()
                    ->withErrors(['you have already joined for this classroom']);
                }
                $classroom->waiters()->attach(auth::user()->id);
                return redirect('/dashboard')->with('success','You have successfully sent a join request');
            }
        }
        return back()
        ->withErrors(['There is no classroom with the given code']);
    }
    public function join_public(request $request,$id){
        $classroom = classroom::find($id);
        $classroom->users()->attach(auth::user()->id,[
            'valid' => 1
        ]);
        return redirect('/dashboard')->with('success','You have successfully joined the classroom');
    }
    public function destroy($id){
        $classroom = classroom::find($id);
        $file = public_path().'/imgs/classes_covers'.'/'.$classroom->image;
        File::delete($file);
        $classroom->delete();
        return back()
        ->with('success','You have successfully deleted the classroom.');
    }
    public function destroy1($id){
        $classroom = classroom::find($id);
        $file = public_path().'/imgs/classes_covers'.'/'.$classroom->image;
        File::delete($file);
        $classroom->delete();
        return redirect('classes')
        ->with('success','You have successfully deleted the classroom.');
    }
    public function withdraw($id){
        auth::user()->classrooms()->detach($id);
        return back()
        ->with('success','You have successfully withdrawn from the classroom.');;
    }
    public function withdraw1($id){
        auth::user()->classrooms()->detach($id);
        return redirect('/dashboard')
        ->with('success','You have successfully withdrawn from the classroom.');;
    }
    public function index1($id){
        if(auth::user()->hasRole('teacher'))
        {
            $classroom = classroom::find($id);
            $posts = $classroom->posts;
            $posts = $posts->reverse();
            if($classroom->user->id == auth::user()->id)
            return view('classroom.classroom_teacher')->with(compact('classroom','posts'));
            else abort(404);
        }
        if(auth::user()->hasRole('student'))
        {
            $classroom = classroom::find($id);
            $posts = $classroom->posts;
            $posts = $posts->reverse();
            foreach($classroom->users as $user){
                if(auth::user()->id == $user->id)
                    return view('classroom.classroom_student')->with(compact('classroom','posts'));
            }
            abort(404);
        }
    }
    public function courseUpload($id)
    {
        $classroom = classroom::find($id);
        $courses = $classroom->courses;
        if(auth::user()->hasRole('teacher'))
            if($classroom->user->id == auth::user()->id)
                return view('classroom.courses_teacher')->with(compact('id','classroom','courses'));
            else abort(404);
        if(auth::user()->hasRole('student'))
        foreach($classroom->users as $user){
            if(auth::user()->id == $user->id)
                return view('classroom.courses_student')->with(compact('id','courses','classroom'));
        }
        abort(404);
    }
  
    public function courseUploadPost(Request $request,$id)
    {
        $request->validate([
            'file' => 'required',
            'name' => 'required|string|max:255'
        ]);
        course::create([
            'name'=>$request->name.'.'.$request->file->extension(),
            'ext'=>$request->file->extension(),
            'classroom_id' => $id,
        ]);
        $fileName = $request->name.'.'.$request->file->extension();
        $request->file->move(public_path('Courses'), $fileName);
        return back()
            ->with('success','You have successfully upload file.');
    }
    public function download($name){
        return response()->download(public_path().'/courses'.'/'.$name);
    }
    public function destroy_file($id1){
       $course = course::find($id1);
       $file =public_path().'/courses'.'/'.$course->name;
        File::delete($file);
        $course->delete();
        return back()
        ->with('success','You have successfully deleted the course.');
    }
    public function members($id){
        $classroom = classroom::find($id);
        $users = $classroom->users;
        $waiters = $classroom->waiters;
        $i=1;
        $j=1;
        $user1 = auth::user();
        $id1 = $id;
        return view('classroom.members',compact('users','classroom','i','user1','id1','waiters','j'));
    }
  
    public function accept($id1,$id){
        $classroom = classroom::find($id1);
        $classroom->waiters()->detach($id);
        $classroom->users()->attach($id,[
            'valid' => 1
        ]);
        return back()
        ->with('success','You have have successfully accepted a new student.');
    }
    public function deny($id1,$id){
        $classroom = classroom::find($id1);
        $classroom->waiters()->detach($id);
        return back()
        ->with('success','You have have successfully denied the request.');
    }
    public function remove_member($id1,$id){
        $classroom = classroom::find($id1);
        $classroom->users()->detach($id);
        return back()
        ->with('success','You have successfully removed the student.');
    }
    public function settings($id){
        $classroom = classroom::find($id);
        return view('classroom.settings', compact('classroom'));
    }
    public function update_class_name(Request $request, $id){
        $request->validate([
            'name'=>'required|string|unique:classrooms|max:255',
        ]);
        $classroom = classroom::find($id);
        $classroom->name = $request->name;
        $classroom->save();
        return back()
        ->with('success','You have successfully updated your classroom name.');
    }
    public function update_class_desc(Request $request, $id){
        $request->validate([
            'desc' => 'string|required|max:2048',
        ]);
        $classroom = classroom::find($id);
        $classroom->desc = $request->desc;
        $classroom->save();
        return back()
        ->with('success','You have successfully updated your classroom description.');
    }
    public function update_class_code(Request $request, $id){
        $classroom = classroom::find($id);
        if(!is_null($request->code)){
            $request->validate([
                'code'=>'required|string|unique:classrooms|max:255',
            ]);
            $classroom->code = $request->code;
            $classroom->is_public = 0;
        }else{
            $classroom->code = $request->code;
            $classroom->is_public = 1;
        }
        $classroom->save();
        return back()
        ->with('success','You have successfully updated your classroom code.');
    }
    public function search(Request $request){
        $key = trim($request->name);
        if(auth::user()->hasRole("student"))
        $classrooms1 = auth::user()->classrooms;
        else $classrooms1 = auth::user()->classrooms1;
        $classrooms = classroom::query()
            ->where('name', 'like', "%{$key}%")
            ->orderBy('is_public', 'desc')
            ->get();
        $stud_classrooms = $classrooms1->intersect($classrooms);
        $classrooms = $classrooms->diff($stud_classrooms);
        $classrooms1 = $classrooms1->take(3);
        return view('classroom.search_classroom',compact('classrooms','classrooms1','stud_classrooms'));
    }
    public function rate(request $request,$id){
        $ratings = auth::user()->ratings;
        $classroom= classroom::find($id);
        $average=0;
        $sum=0;
        $request->validate([
            'rating'=>'required',
        ]);
        rating::create([
            'user_id'=>auth::user()->id,
            'rating'=>$request->rating,
            'classroom_id' => $id,
        ]);
        foreach($classroom->ratings as $rating)
        {
            $sum+=$rating->rating;
        }
        $average=$sum/$classroom->ratings->count();
        $classroom->average=$average;
        $classroom->save();
        return back()
        ->with('success','You have successfully rated the classroom.');
    }
    public function desc($id)
    {
        $classroom=classroom::find($id);
        $classrooms=auth::user()->classrooms;
         $classrooms1 = $classrooms->take(3);
        return view('classroom.description',compact('classroom','classrooms1'));
    }
    public function remove_member1($id1,$id,$id2){
        $classroom = classroom::find($id1);
        $classroom->users()->detach($id);
        $msg = Msg::find($id2);
        $msg->body = "message has been deleted by admin";
        $msg->is_reported = false;
        $msg->save();
        return back()
        ->with('success','You have successfully removed the student.');
    }
}
    