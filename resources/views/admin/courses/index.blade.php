@extends('layouts.admin')

@section('content')

<style>
  .openButton {
    border: none;
    border-radius: 5px;
    background-color: #1c87c9;
    color: white;
    padding: 10px 20px;
    cursor: pointer;
    /* position: fixed; */
  }

  .search_input {
    border-radius: 5px;
    border: 1px solid teal;
  }


  .loginPopup {
    position: relative;
    text-align: start;
    width: 100%;
  }

  .formPopup {
    display: none;
    position: fixed;
    left: 45%;
    top: 5%;
    transform: translate(-50%, 5%);
    border: 3px solid #999999;
    z-index: 9;
  }

  .formContainer {
    width: 500px;
    padding: 10px;
    background-color: #fff;
  }

  .formContainer input[type=text],
  .formContainer input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px 0;
    border: none;
    background: #eee;
  }

  .formContainer input[type=text]:focus,
  .formContainer input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }

  .w {
    width: 48%;
  }

  .formContainer .btn:hover,
  .openButton:hover {
    opacity: 1;
  }
</style>
<div class="container-fluid w-100 bg-dark">
  <a class="navbar-brand px-4 text-light">Courses</a>
</div>
<div class="container my-2 d-flex justify-content-between">
  <div class="w-50">
    <form action="{{route('course.index')}}" method="GET" role="search">
      <input type="search" name="term" class="search_input w-75 bg-light p-2" id="term" placeholder="Enter a keyword to search ">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit" title="Search projects">
          <span class="fas fa-search"></span>
        </button>
      </span>
      <a href="{{ route('course.index') }}" class=" mt-1">
        <span class="input-group-btn">
          <button class="btn btn-danger" type="button" title="Refresh page">
            <span class="fas fa-sync-alt"></span>
          </button>
        </span>
      </a>
    </form>
  </div>
  <div>
    <button class="openButton" onclick="openForm()"><strong>+ Add new Course</strong></button>
  </div>
</div>
<div class="loginPopup">
  <div class="formPopup" id="popupForm">
    <form action="{{route('course.store')}}" class="formContainer" method="POST">
      @csrf
      <h2 class="w-100">Add New Course</h2>
      <label for="name">
        <strong>Name</strong>
      </label>
      <input type="text" id="name" placeholder=" Name" name="name" required>
      <label for="course">
        <strong>Course Code</strong>
      </label>
      <input type="text" id="course" placeholder=" Course Code" name="course" required>
      <div class="d-flex align-items-center">
        <label for="dept">
          <strong>Department: </strong>
        </label>
        <input type="text" id="dept" class="me-1" placeholder=" Department" name="department" required>
        <label for="yr">
          <strong>Sem/Year: </strong>
        </label>
        <input type="text" id="yr" placeholder="Semester/Year" name="year" required>
      </div>
      <label for="prof">
        <strong>Professor</strong>
      </label>
      <input type="text" id="prof" placeholder="Professor Name" name="pro" required>
      <button type="submit" class="btn btn-info w">Add Course</button>
      <button type="button" class="btn btn-danger w" onclick="closeForm()">Close</button>
    </form>
  </div>
</div>
<br>
<br>
<script>
  function openForm() {
    document.getElementById("popupForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
  }
</script>
<div class="px-4">
  <table class="table table-striped ">
    <tr>
      <th>ID</th>
      <th>Paper Name</th>
      <th>paper code</th>
      <th>Department</th>
      <th>Sem/Year</th>
      <th>professor</th>
      <th>Actions</th>
    </tr>

    @php
    $c = 1
    @endphp

    @foreach($courses as $course)
    <tr>
      <td>{{$c++ }}</td>
      <td>{{ $course->name }}</td>
      <td>{{ $course->course_code }}</td>
      <td>{{ $course->department }}</td>
      <td>{{ $course->semester }}</td>
      <td>{{ $course->professor }}</td>
      <td>
        <form action="{{route('course.destroy',$course->id)}}" method="post">
          @csrf
          @method('DELETE')

          <a href="{{route('course.edit',$course->id)}}" class="btn btn-success">Edit</a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>

    @endforeach

  </table>
  {{-- {!! $teachers->links() !!} --}}
</div>
@endsection