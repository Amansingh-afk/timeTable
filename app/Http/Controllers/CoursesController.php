<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Http\Requests\StoreCoursesRequest;
use App\Http\Requests\UpdateCoursesRequest;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return "We in index";
        $courses = Courses::all();
        $data = compact('courses');
        return view('admin.courses.index')->with($data);


        // return view('courses.index')->with($data);

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
        $courses->professor = $req->pro;

        // $courses->save();
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
        return view('courses.edit',compact('customer'));
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
        $course->course_code=$request->course;
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
