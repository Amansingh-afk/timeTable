<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index()
    {
        $weekDays = Classes::WEEK_DAYS;

        return view('admin.timetable', compact('weekDays'));
    }
}
