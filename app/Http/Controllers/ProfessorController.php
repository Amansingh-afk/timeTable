<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $rooms = Room::all();
        $professor = professor::where([
            ['name', '!=', NULL], ['courses', '!=', NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
                if (($term = $request->term)) {
                    $query->orWhere('courses', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("id", "desc")
            ->paginate(8);

        if (auth()->user()->is_admin == 1) {

            return view('admin.professors.index', compact('professor'))
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
        return view('professors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfessorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessorRequest $req)
    {
        $professor = new Professor;
        $professor->name = $req->name;
        $professor->emali = $req->email;
        $professor->courses = $req->course;
        $professor->unavailable_periods = $req->Un_prid;

        $professor->save();

        return redirect()->route('professor.index');
        // return "Data inserted";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function show(Professor $professor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function edit($professor)
    {
        $customer = Professor::findorfail($professor);
        return view('admin.professors.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfessorRequest  $request
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfessorRequest $request,  $professor)
    {
        $professor1 = Professor::findorfail($professor);
        $professor1->name = $request->name;
        $professor1->emali = $request->email;
        $professor1->courses = $request->course;
        $professor1->unavailable_periods = $request->Un_prid;
        $professor1->update();
        return redirect()->route('professor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professor  $professor
     * @return \Illuminate\Http\Response
     */
    public function destroy($professor)
    {
        $professor1 = Professor::findorfail($professor);
        $professor1->delete();
        return redirect()->route('professor.index');
    }
}
