@extends('layouts.admin')

@section('content')

<head>

  <style>
    * {
      box-sizing: border-box;
    }

    .openBtn {
      display: flex;
      justify-content: left;
    }

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
      text-align: center;
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
      max-width: 300px;
      padding: 20px;
      background-color: #fff;
    }

    .formContainer input[type=text],
    .formContainer input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 20px 0;
      border: none;
      background: #eee;
    }

    .formContainer input[type=text]:focus,
    .formContainer input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    .formContainer .btn {
      padding: 12px 20px;
      border: none;
      background-color: #8ebf42;
      color: #fff;
      cursor: pointer;
      width: 100%;
      margin-bottom: 15px;
      opacity: 0.8;
    }

    .formContainer .cancel {
      background-color: #cc0000;
    }

    .formContainer .btn:hover,
    .openButton:hover {
      opacity: 1;
    }
  </style>
</head>

<body>
  <div class="container-fluid w-100 bg-dark">
    <a class="navbar-brand px-4 text-light">Periods</a>
  </div>
  <div class="container my-2 d-flex justify-content-between">
    <input type="search" name="" class="search_input w-50 bg-light px-2" id="" placeholder="Enter a keyword to search ">
    <!-- {{-- <a href="{{ route('room.create')}}">Add new Room</a> --}} -->

    <div class="openBtn">
      <button class="openButton" onclick="openForm()"><strong>Add new Room</strong></button>
    </div>
  </div>
  <div class="loginPopup">
    <div class="formPopup" id="popupForm">
      <form action="{{route('period.store')}}" class="formContainer" method="POST">
        @csrf
        <h2>Add New Time Slot</h2>
        <label for="name">
          <strong>Start Time</strong>
        </label>
        <input type="text" id="start" placeholder=" Start Time" name="name" required>


        <label for="psw">
          <strong>End Time</strong>
        </label>
        <input type="text" id="end" placeholder=" End Time" name="end" required>

        <label for="psw">
          <strong>Time</strong>
        </label>
        <input type="text" id="time" placeholder=" Time" name="Time" required>
        <button type="submit" class="btn">Add Course</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      </form>
    </div>
  </div>
  <br>
  <br>
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

  <table class="table table-bordered table-striped">
    <tr>
      <th>ID</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>AM/PM</th>
      <th>Actions</th>
    </tr>

    @php
    $c = 1
    @endphp

    @foreach($period as $period1)
    <tr>
      <td>{{$c++ }}</td>
      <td>{{ $period1->start_time }}</td>
      <td>{{ $period1->end_time }}</td>
      <td>{{ $period1->AM_PM }}</td>
      <td>
        <form action="{{route('period.destroy',$period1->id)}}" method="post">
          @csrf
          @method('DELETE')

          <a href="{{route('period.edit',$period1->id)}}" class="btn btn-primary">Edit</a>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>

    @endforeach

  </table>
  {{-- {!! $teachers->links() !!} --}}

</body>
@endsection