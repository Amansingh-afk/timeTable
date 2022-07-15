<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $classes = Classes::where([
            ['name', '!=', NULL], ['department', '!=', NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("id", "desc")
            ->paginate(50);
        $courses = DB::table('courses')->get();
        $courseDept = DB::table('courses')
            ->select('department')
            ->distinct()
            ->get();

        $courseSem = DB::table('courses')
            ->select('courses.semester')
            ->distinct()
            ->get();
        $periods = DB::table('periods')->get();



        if (auth()->user()->is_admin == 1) {

            return view('admin.classes.index', compact('classes', 'courses', 'courseDept', 'courseSem', 'periods'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        echo "Sign-in as Admin to access";
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return "Hello";
        return view('classes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassesRequest $request)
    {
        $class = new Classes;
        $class->name = $request->classname;
        $class->department = $request->department;
        $class->semester = $request->sem;
        $class->start_time = $request->st;
        $class->end_time = $request->et;
        $class->Meeting_per_week = $request->meeting;

        $class->save();
        // return "Data Saved Successfully"
        return redirect()->route('class.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show(Classes $classes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit($ct)
    {
        $class = Classes::findorfail($ct);

        return view('admin.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassesRequest  $request
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassesRequest $request,  $c)
    {
        $class = Classes::findorfail($c);
        $class->name = $request->classname;
        $class->department = $request->department;
        $class->semester = $request->sem;
        $class->start_time = $request->st;
        $class->end_time = $request->et;
        $class->Meeting_per_week = $request->meeting;

        $class->update();

        return redirect()->route('class.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy($classes)
    {
        $classes = classes::findorfail($classes);
        $classes->delete();

        return redirect()->route('class.index');
    }
}
