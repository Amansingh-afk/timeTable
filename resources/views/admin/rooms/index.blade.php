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
    left: 50%;
    top: 10%;
    border-radius: 10px;
    transform: translate(-50%, 8%);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    z-index: 9;
  }

  h5 {
    font-weight: 600;
  }

  .formContainer {
    max-width: 400px;
    padding: 10px;
    border-radius: 10px;
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
  <a class="navbar-brand px-4 text-light">Rooms</a>
</div>
<div class="container my-2 d-flex justify-content-between">
  <div class="w-50">
    <form action="{{route('room.index')}}" method="GET" role="search">
      <input type="search" name="term" class="search_input w-75 bg-light p-2" id="term" placeholder="Enter a keyword to search ">
      <span class="input-group-btn">
        <button class="btn btn-info" type="submit" title="Search Rooms">
          <span class="fas fa-search"></span>
        </button>
      </span>
      <a href="{{ route('room.index') }}" class=" mt-1">
        <span class="input-group-btn">
          <button class="btn btn-danger" type="button" title="Refresh page">
            <span class="fas fa-sync-alt"></span>
          </button>
        </span>
      </a>
    </form>
  </div>
  <div>
    <button class="openButton mt-1" onclick="openForm()"><strong>+ Add new Room</strong></button>
  </div>
</div>
<div class="loginPopup">
  <div class="formPopup" id="popupForm">
    <form action="{{route('room.store')}}" class="formContainer" method="POST">
      @csrf
      <h5>Add New Lecture Room</h5>
      <label for="name">
        <strong>Room Name</strong>
      </label>
      <input type="text" id="name" placeholder="Room Name" name="name" required>


      <label for="psw">
        <strong>Capacity</strong>
      </label>
      <input type="text" id="cap" placeholder=" Capacity" name="cap" required>

      <label for="psw">
        <strong>Room Type</strong>
      </label>
      <input type="text" id="cap" placeholder=" Room Type" name="cType" required>

      <label for="psw">
        <strong>Status</strong>
      </label>
      <input type="text" id="cap" placeholder=" Status" name="status" required>

      <div class="d-flex">
        <button type="submit" class="btn btn-info w">Add Lecture Room</button>
        <button type="button" class="btn btn-danger w" onclick="closeForm()">Close</button>
      </div>
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
  <table class="table table-striped">
    <tr>
      <th>ID</th>
      <th>Room Code</th>
      <th>Capacity</th>
      <th>Room Type</th>
      <th>Status</th>
      <!-- <th>Remark</th> -->
      <th>Actions</th>
    </tr>

    @php
    $c = 1
    @endphp

    @foreach($rooms as $room)
    <tr>
      <td>{{ $c++ }}</td>
      <td>{{ $room->name }}</td>
      <td>{{ $room->capacity }}</td>
      <td>{{ $room->type }}</td>
      <td>{{ $room->isActive }}</td>
      <!-- <td>{{ $room->remarks }}</td> -->
      <td>
        <form action="{{route('room.destroy',$room->id)}}" method="post">
          @csrf
          @method('DELETE')

          <a href="{{route('room.edit',$room->id)}}" class="btn btn-success">Edit</a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>

    @endforeach

  </table>
</div>
<!-- {{-- {!! $teachers->links() !!} --}} -->

{{ $rooms->links() }}

@endsection