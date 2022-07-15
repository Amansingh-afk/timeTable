<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $rooms = Room::all();
        $rooms = Room::where([
            ['name', '!=', NULL],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy("id", "desc")
            ->paginate(50);

        if (auth()->user()->is_admin == 1) {

            return view('admin.rooms.index', compact('rooms'))
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
        return view('rooms.create');
        // return "hello";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $req)
    {
        $rooms = new Room;
        $rooms->name = $req->name;
        $rooms->capacity = $req->cap;
        $rooms->type = $req->cType;
        $rooms->isActive = $req->status;
        // $rooms->remarks=$req->remark;

        $rooms->save();

        return redirect()->route('room.index');
        // return "Data inserted";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($room)
    {
        $customer = Room::findorfail($room);
        return view('admin.rooms.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoomRequest  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, $c)
    {
        $room = Room::findorfail($c);
        $room->name = $request->name;
        $room->capacity = $request->cap;
        $room->type = $request->cType;
        $room->isActive = $request->status;
        // $room->remarks=$request->remark;
        $room->update();
        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($room)
    {
        $rooms = Room::findorfail($room);
        $rooms->delete();
        return redirect()->route('room.index');
    }

    function action(Request $request)
    {
        return $request->all();
        if ($request->ajax()) {
            if ($request->action == 'edit') {
                $data = array(
                    'name'    =>    $request->name,
                    'capacity'        =>    $request->cap,
                    'type'        =>    $request->cType,
                    'isActive' => $request->status,
                );
                DB::table('rooms')
                    ->where('id', $request->id)
                    ->update($data);
            }
            if ($request->action == 'delete') {
                DB::table('rooms')
                    ->where('id', $request->id)
                    ->delete();
            }
            return response()->json($request);
        }
    }
}
