<?php

namespace App\Http\Controllers;

use App\Models\period;
use App\Http\Requests\StoreperiodRequest;
use App\Http\Requests\UpdateperiodRequest;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $period = period::all();

        // echo "<pre>";
        // print_r($data->toArray());

        $data = compact('period');
        return view('admin.Periods.index')->with($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreperiodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreperiodRequest $req)
    {
        $period = new period;
        $period->start_time = $req->start;
        $period->end_time = $req->end;
        $period->AM_PM = $req->time;
        $period->period_number = $req->periodRank;

        // return "Data inserted";

        $period->save();

        return redirect()->route('period.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit( $period)
    {
        $customer=period::findorfail($period);
        return view('admin.periods.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateperiodRequest  $request
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateperiodRequest $req,  $period)
    {
        $period=period::findorfail($period);
        $period->start_time = $req->start;
        $period->end_time = $req->end;
        $period->AM_PM = $req->time;
        $period->period_number = $req->periodRank;
        $period->update();
        return redirect()->route('period.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy( $period)
    {
        $period=period::findorfail($period);
        $period->delete();
        return redirect()->route('period.index');
    }
}
