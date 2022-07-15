<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index(Request $request)
    {
        $weekDays = Classes::WEEK_DAYS;
        $depart = $request->department;
        $semester = $request->sem;

        $offDay = 2;
        $time = DB::table('periods')->get();

        $classDetails = DB::table('classes')
            ->select('classes.name','classes.Meeting_per_week','courses.professor')
            ->join('courses','classes.name','=','courses.name')
            ->where('classes.department', $depart)
            ->where('classes.semester', $semester)->get();
             
        //    $classDetails= $this->finalAnswer($classDetailsQ);
		// return response()->json($classDetails);

            
        return view('admin.timetable', compact('weekDays', 'time', 'classDetails', 'offDay', 'depart', 'semester'));
    }
    function rowCheck(){
        
    }
}
