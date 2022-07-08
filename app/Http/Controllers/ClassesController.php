<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Http\Requests\StoreClassesRequest;
use App\Http\Requests\UpdateClassesRequest;

use Illuminate\Http\Request;

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
                ['name','!=', NULL],['Course','!=',NULL],
                [function($query) use ($request) {
                    if(($term = $request->term)){
                        $query->orWhere('name','LIKE', '%'. $term . '%')->get();
                    }
                }]
            ])
                ->orderBy("id","desc")
                ->paginate(8);
        return view('admin.classes.index',compact('classes'))
        ->with('i',(request()->input('page',1) - 1 ) * 5);
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
        $class=new Classes;
        $class->name=$request->classname;
        $class->Course=$request->classcourse;
        $class->Acdemic_period=$request->pre;
        $class->Meeting_per_week=$request->meet;
        $class->Population=$request->pop;
        $class->Unavailable_lecture_rooms=$request->un_rooms;
        
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
    public function edit( $ct)
    {
        $class=Classes::findorfail($ct);
        return view('admin.classes.edit',compact('class'));
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
        $class=Classes::findorfail($c);
        $class->name=$request->classname;
        $class->Course=$request->classcourse;
        $class->Acdemic_period=$request->pre;
        $class->Meeting_per_week=$request->meet;
        $class->Population=$request->pop;
        $class->Unavailable_lecture_rooms=$request->un_rooms;
        // $class->update();
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
        $classes=classes::findorfail($classes);
        $classes->delete();
        return redirect()->route('class.index');
    }
}
