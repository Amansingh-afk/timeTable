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

  h5{
    font-weight: 600;
  }
  .formPopup {
    display: none;
    position: fixed;
    left: 50%;
    top: 14%;
    border-radius: 10px;
    transform: translate(-50%, 5%);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    z-index: 9;
  }

  .formContainer {
    max-width: 400px;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
  }

  .formContainer input[type=text],
  .formContainer input[type=password] {
    width: 100%;
    padding: 10px;
    margin: 3px 0 10px 0;
    border: none;
    background: #eee;
  }

  .formContainer input[type=text]:focus,
  .formContainer input[type=password]:focus {
    background-color: #ddd;
    outline: none;
  }
  .w{
    width: 48%;
  }
  .formContainer .btn:hover,
  .openButton:hover {
    opacity: 1;
  }
</style>
<div class="container-fluid w-100 bg-dark">
  <a class="navbar-brand px-4 text-light">Professors</a>
</div>
<div class="container my-2 d-flex justify-content-between">
  <div class="w-50">
    <form action="{{route('professor.index')}}" method="GET" role="search">
      <input type="search" name="term" class="search_input w-75 bg-light p-2" id="term" placeholder="Enter a keyword to search ">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit" title="Search projects">
          <span class="fas fa-search"></span>
        </button>
      </span>
      <a href="{{ route('professor.index') }}" class=" mt-1">
        <span class="input-group-btn">
          <button class="btn btn-danger" type="button" title="Refresh page">
            <span class="fas fa-sync-alt"></span>
          </button>
        </span>
      </a>
    </form>
  </div>
  <div>
    <button class="openButton" onclick="openForm()"><strong>+ Add new Professor</strong></button>
  </div>
</div>
<div class="loginPopup">
  <div class="formPopup" id="popupForm">
    <form action="{{route('professor.store')}}" class="formContainer" method="POST">
      @csrf
      <h5>Add New Professor</h5>
      <label for="name">
        <strong>Name</strong>
      </label>
      <input type="text" id="name" placeholder=" Name" name="name" required>


      <label for="psw">
        <strong>Email</strong>
      </label>
      <input type="text" id="email" placeholder=" Email" name="email" required>

      <label for="psw">
        <strong>Courses</strong>
      </label>
      <input type="text" id="course" placeholder=" Course Name" name="course" required>

      <label for="psw">
        <strong>Unavailable Periods</strong>
      </label>
      <input type="text" id="Un_prid" placeholder=" Unavailable Periods" name="Un_prid" required>
      <button type="submit" class="btn btn-info w">Add Professor</button>
      <button type="button" class="btn btn-danger w" onclick="closeForm()">Close</button>
    </form>
  </div>
</div>
<script>
  function openForm() {
    document.getElementById("popupForm").style.display = "block";
  }

  function closeForm() {
    document.getElementById("popupForm").style.display = "none";
  }
</script>
<br>
<br>
<div class="px-4">
  <table class="table table- table-striped">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Course</th>
      <th>Unavailable Periods</th>
      <th>Actions</th>
    </tr>

    @php
    $c = 1
    @endphp

    @foreach($professor as $professor1)
    <tr>
      <td>{{ $c++ }}</td>
      <td>{{ $professor1->name }}</td>
      <td>{{ $professor1->emali }}</td>
      <td>{{ $professor1->courses }}</td>
      <td>{{ $professor1->unavailable_periods }}</td>
      <td>
        <form action="{{route('professor.destroy',$professor1->id)}}" method="post">
          @csrf
          @method('DELETE')

          <a href="{{route('professor.edit',$professor1->id)}}" class="btn btn-success">Edit</a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>

    @endforeach

  </table>
  {{-- {!! $teachers->links() !!} --}}
</div>
@endsection