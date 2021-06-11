<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index(){
        if(auth::user()->hasRole('teacher'))
        {
            $classrooms = auth::user()->classrooms1;
            $classrooms1 = $classrooms->take(3);
            return view('dashboard.teacher')->with(compact('classrooms1','classrooms'));
        }
        if(auth::user()->hasRole('student'))
        {
            $classrooms=auth::user()->classrooms;
            $classrooms1 = $classrooms->take(3);
            return view('dashboard.student')->with(compact('classrooms1','classrooms'));
        }
            if(auth::user()->hasRole('admin')) return view('dashboard.admin');
    }
     public function show_profile(){
        if(auth::user()->hasRole('student')){
            $classrooms1 = auth::user()->classrooms;
            $nbr=$classrooms1->count();
            $classrooms1 = $classrooms1->take(3);}
        if(auth::user()->hasRole('teacher')) {
            $classrooms1 = auth::User()->classrooms1;
            $nbr = $classrooms1->count();
             $classrooms1 = $classrooms1->take(3);}

        return view('profile',compact('classrooms1','nbr'));
    }

    // public function index(){
    //     if (auth::user()->hasVerifiedEmail()){
    //         if(auth::user()->hasRole('student')){
    //             return view('dashboard.student');
    //         }
    //         if(auth::user()->hasRole('teacher')){
    //             return view('dashboard.teacher');
    //         }
    //         if(auth::user()->hasRole('admin')){
    //             return view('dashboard.admin');
    //         }
    //     }
    //     else return redirect('verify-email');
    // }
}