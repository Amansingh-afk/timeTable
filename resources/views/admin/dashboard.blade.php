@extends('layouts.admin')

@section('content')

<script src="https://kit.fontawesome.com/6e98be7892.js" crossorigin="anonymous"></script>
<style>
  .w-40 {
    width: 240px;
  }

  .genTT {
    width: fit-content;
  }

  .tt-by-dept {
    display: none;
    width: fit-content;
    border-radius: 10px;
    left: 50%;
    top: 10%;
    transform: translate(-5%, 10%);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    z-index: 9;
  }

  .tt-by-prof {
    display: none;
    width: fit-content;
    text-align: justify;
    border-radius: 10px;
    left: 50%;
    top: 10%;
    transform: translate(-5%, 10%);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    z-index: 9;

  }

  .drpdwn {
    border-radius: 5px;
    background-color: #eee;
    padding: 12px;
  }

  .tableBtn {
    color: #fff;
    background: teal;
    outline: none;
    border: 0;
  }

  .topright {
    position: absolute;
    right: 0;
    top: 0;
    /* background: #aaaaaa;  */
  }

  a {
    text-decoration: none;
    color: #000;
  }

  a:hover {
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

      <i class="fa-solid fa-school" style="float: right;"></i>
    </h5>
    <h3>{{$roomsCount}}</h3>
  </div>
  <div class="room_card bg-warning rounded rounded-5 text-left text-light p-3 w-40">
    <h5 class="">Courses

      <i class="fa-solid fa-book-open-reader" style="float: right;"></i>
    </h5>
    <h3>{{$coursesCount}}</h3>
  </div>
  <div class="room_card bg-success rounded rounded-5 text-left text-light p-3 w-40">
    <h5 class="">Professors
      <i class="fa-solid fa-graduation-cap" style="float: right;"></i>
    </h5>
    <h3>{{$professorsCount}}</h3>
  </div>
  <div class="room_card bg-info rounded rounded-5 text-left text-light p-3 w-40">
    <h5 class="">Classes

      <i class="fa-solid fa-users-between-lines" style="float: right;"></i>
    </h5>
    <h3>{{$classesCount}}</h3>
  </div>
</div>
<div class="text-center mt-5">
  <div class="container genTT">
    <h4>Generate New Timetable</h4>
    <div class="d-flex">
      <button class="btn btn-primary" onclick="openForm()">BY DEPARTMENT</button>
      <button class="btn btn-primary" onclick="openFormTwo()">BY PROFESSOR</button>
    </div>
  </div>
  <div class="tt-by-dept  bg-light p-3 mx-auto" id="popupForm">
    <span class="topright bg-primary rounded-circle px-1" onclick="closeForm()">
      <i class="fa-solid fa-x text-light" aria-label="close"></i>
    </span>
    <form action="{{route('timetable.index')}}" method="GET">
      <div class="d-flex align-items-center">
        <strong>Department</strong>
        <select name="department" id="" class="form-control drpdwn m-2" required>
          <option value="">Select Course</option>
          @foreach ($courses as $course)
          <option>{{$course->department}}</option>
          @endforeach
        </select>
        <strong>Sem/Year: </strong>
        <select name="sem" id="" class="form-control drpdwn m-2" required>
          <option value="">Select Sem/Year</option>
          @foreach ($courseSem as $course)
          <option>{{$course->semester}}</option>
          @endforeach
        </select>
      </div>
      <button type="submit" class="btn btn-default btn-block">Generate</button>
    </form>
  </div>
  <div class="tt-by-prof bg-light p-3 mx-auto" id="popupFormTwo">
    <span class="topright bg-primary rounded-circle px-1" onclick="closeForm()">
      <i class="fa-solid fa-x text-light"></i>
    </span>
    <form action="{{route('timetable.index')}}" method="GET">
      <strong>Name : </strong>
      <select name="prof" class="form-control drpdwn m-2" required>
        <option value="">Please Select</option>
        @foreach($professors as $prof)
        <option>{{$prof->name}}</option>
        @endforeach
      </select>
      <button type="submit" class="btn btn-default btn-block">Generate</button>
    </form>
  </div>
  <p class="tt">
    No Timetable generated yet
  </p>
</div>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  function openForm() {
    document.getElementById("popupForm").style.display = "block";
    document.getElementById("popupFormTwo").style.display = "none";
  }

  function openFormTwo() {
    document.getElementById("popupFormTwo").style.display = "block";
    document.getElementById("popupForm").style.display = "none";
  }

  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
    document.getElementById("popupFormTwo").style.display = "none";
  }
</script>

@endsection