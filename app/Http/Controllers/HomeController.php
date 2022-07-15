<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Courses;
use App\Models\Professor;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        // $this->middleware('Auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('auth.login');
    }
    public function isStudent()
    {


        $roomsCount = Room::count();
        $coursesCount = Courses::count();
        $professorsCount = Professor::count();
        $classesCount = Classes::count();


        if (auth()->user()->is_admin == 3) {
            return view('user.student', compact('roomsCount', 'coursesCount', 'professorsCount', 'classesCount'));
        }
        echo "Sign-in as Student ..";
    }
    public function dashboard(Request $request)
    {
        $roomsCount = Room::count();
        $coursesCount = Courses::count();
        $professorsCount = Professor::count();
        $classesCount = Classes::count();


        $courses = DB::table('courses')
            ->select('courses.department')
            ->distinct()
            ->get();

        // $depart = $request->department;

        $courseSem = DB::table('courses')
            ->select('courses.semester')
            ->distinct()
            ->get();

        $professors = DB::table('professors')->get();

        return view('admin.dashboard', compact(
            'roomsCount',
            'coursesCount',
            'professorsCount',
            'classesCount',
            'courses',
            'courseSem',
            'professors'
        ));
    }
    public function isTeacher()
    {

        $roomsCount = Room::count();
        $coursesCount = Courses::count();
        $professorsCount = Professor::count();
        $classesCount = Classes::count();


        if (auth()->user()->is_admin == 2) {

            return view('user.teacher', compact('roomsCount', 'coursesCount', 'professorsCount', 'classesCount'));
        }
            echo "Sign_in as Teacher..";
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
