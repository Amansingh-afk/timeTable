<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SplSubject;

class TimetableController extends Controller
{
    public function index(Request $request)
    {
        $teacher = array();
        // $objT =  array();
        $weekDays = Classes::WEEK_DAYS;
        $depart = $request->department;
        $semester = $request->sem;

        $time = DB::table('periods')->get();

        $classDetails = DB::table('classes')
            ->where('department', $depart)
            ->where('semester', $semester)->get();

        foreach ($classDetails as $key) {
            $courseDetails = $key->name;

            $courseProfName = DB::table('courses')
                ->where('name', $courseDetails)->get();

            // $teacher = (object) $teacher;
            // $objT[] = $courseProfName;
            $objT = json_decode($courseProfName);
            // return response()->json($objT);
        }

        // return response()->json($professorName);
        // return response()->json($courseProfName);
        // return response()->json($classDetails);
        // return response()->json($objT);

        return view('admin.timetable', compact('weekDays', 'time', 'classDetails', 'objT'));
    }
}
