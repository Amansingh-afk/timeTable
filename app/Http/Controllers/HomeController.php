<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Courses;
use App\Models\Professor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }
    public function isStudent(){

        
        $roomsCount = Room::count();
        $coursesCount = Courses::count();
        $professorsCount = Professor::count();
        $classesCount = Classes::count();

        return view('user.student', compact('roomsCount','coursesCount','professorsCount','classesCount'));
    }
    public function dashboard()
    {
        $roomsCount = Room::count();
        $coursesCount = Courses::count();
        $professorsCount = Professor::count();
        $classesCount = Classes::count();
    
            return view('admin.dashboard', compact('roomsCount','coursesCount','professorsCount','classesCount'));
        
  
    }
    public function isTeacher()
    {
        
        $roomsCount = Room::count();
        $coursesCount = Courses::count();
        $professorsCount = Professor::count();
        $classesCount = Classes::count();

        return view('user.teacher', compact('roomsCount','coursesCount','professorsCount','classesCount'));
    }
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
