<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        $weekDays = Classes::WEEK_DAYS;
        $time = DB::table('periods')->get();

        return view('admin.timetable', compact('weekDays', 'time'));
    }
}
