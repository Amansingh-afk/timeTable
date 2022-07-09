@extends('layouts.admin')

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
  a{
    text-decoration: none;
    color: #000;
  }
  a:hover{
    color: #000;
  }

  .tt {
    font-size: 36px;
  }

  .btn:hover {
    background: teal;
  }
</style>
<div class="container-fluid w-100 bg-dark">
  <a class="navbar-brand px-4 text-light">Dashboard</a>
</div>

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
  <button type="button" class="tableBtn rounded text-dark py-2 px-4">
    
  <a href="{{route('timetable.index')}}">
    <i class="fa fa-calendar" aria-hidden="true"></i>
    Generate New Timetable
  </a>
  </button>
  <p class="tt">
      No Timetable generated yet

  </p>
</div>

@endsection