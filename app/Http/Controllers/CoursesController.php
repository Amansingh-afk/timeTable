<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // return "We in index";
    //     $courses = Courses::all();
    //     $data = compact('courses');
    //     return view('admin.courses.index')->with($data);


    //     // return view('courses.index')->with($data);

    // }
    public function index(Request $request)
    {
        // $rooms = Room::all();
            $courses = Courses::where([
                ['name','!=', NULL],['course_code','!=',NULL],
                [function($query) use ($request) {
                    if(($term = $request->term)){
                        $query->orWhere('name','LIKE', '%'. $term . '%')->get();
                    }
                    if(($term = $request->term)){
                        $query->orWhere('course_code','LIKE', '%'. $term . '%')->get();
                    }
                }]
            ])
                ->orderBy("id","desc")
                ->paginate(5);
        // $data = compact('rooms');
        return view('admin.courses.index',compact('courses'))
        ->with('i',(request()->input('page',1) - 1 ) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
        // return "Hellp";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCoursesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoursesRequest $req)
    {
        $courses = new Courses;
        $courses->name = $req->name;
        $courses->course_code = $req->course;
        $courses->department = $req->department;
        $courses->semester = $req->year;
        $courses->professor = $req->pro;

        $courses->save();
        return redirect()->route('course.index');

        // return "Data inserted";


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function show(Courses $courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function edit($courses)
    {
        $customer=Courses::findorfail($courses);
        return view('admin.courses.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoursesRequest  $request
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoursesRequest $request,  $courses)
    {
        $course=Courses::findorfail($courses);
        $course->name=$request->name;
        $course->course_code=$request->cap;
        $course->department = $request->department;
        $course->semester = $request->year;
        $course->professor=$request->pro;
        $course->update();
        return redirect()->route('course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Courses  $courses
     * @return \Illuminate\Http\Response
     */
    public function destroy($courses)
    {
        $course=Courses::findorfail($courses);
        $course->delete();
        return redirect()->route('course.index');
    }
}
