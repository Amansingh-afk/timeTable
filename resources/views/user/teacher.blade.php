@extends('layouts.userLayout')

@section('content')
<style>
    .w-40 {
        width: 240px;
    }

    .tableBtn {
        color: #fff;
        background: teal;
        outline: none;
        border: 0;
    }

    .btn:hover {
        background: teal;
    }
</style>

<div class="container d-flex justify-content-between my-4">
    <div class="room_card bg-primary rounded rounded-5 text-left p-3 text-light w-40">
        <h5 class="">Lecture Rooms
            <i class="fa fa-home" style="float: right;" aria-hidden="true"></i>
        </h5>
        <h3>{{$roomsCount}}</h3>
    </div>
    <div class="room_card bg-warning rounded rounded-5 text-left text-light p-3 w-40">
        <h5 class="">Courses
            <i class="fa fa-book" style="float: right;" aria-hidden="true"></i>
        </h5>
        <h3>{{$coursesCount}}</h3>
    </div>
    <div class="room_card bg-success rounded rounded-5 text-left text-light p-3 w-40">
        <h5 class="">Professors
            <i class="fa fa-graduation-cap" style="float: right;" aria-hidden="true"></i>
        </h5>
        <h3>{{$professorsCount}}</h3>
    </div>
    <div class="room_card bg-info rounded rounded-5 text-left text-light p-3 w-40">
        <h5 class="">Classes
            <i class="fa fa-users" style="float: right;" aria-hidden="true"></i>
        </h5>
        <h3>{{$classesCount}}</h3>
    </div>
</div>
<div class="text-center mt-5">
    <button type="button" class="tableBtn rounded py-2 px-4">
        <i class="fa fa-calendar" aria-hidden="true"></i>
        Generate New Timetable
    </button>
<p class="para">
    No Timetable generated yet
</p>
</div>

@endsection