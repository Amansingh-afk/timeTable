@extends('layouts.admin')

@section('content')

<link href="../assets/css/custom.css" rel="stylesheet" />
<div class="container-fluid w-100 bg-dark">
  <a class="navbar-brand px-4 text-light">Periods</a>
</div>
<div class="container my-2 ">
  <button class="openButton" onclick="openForm()"><strong>+ Add new Period</strong></button>
</div>
<div class="loginPopup">
  <div class="formPopup" id="popupForm">
    <form action="{{route('period.store')}}" class="formContainer" method="POST">
      @csrf
      <h5>Add New Time Slot</h5>
      <label for="start">
        <strong>Start Time</strong>
      </label>
      <input type="text" id="start" placeholder=" Start Time" name="start" required>


      <label for="end">
        <strong>End Time</strong>
      </label>
      <input type="text" id="end" placeholder=" End Time" name="end" required>

      <label for="time">
        <strong>Time</strong>
      </label>
      <input type="text" id="time" placeholder=" Time" name="time" required>

      <label for="rank">
        <strong>Period No.</strong>
      </label>
      <input type="text" id="rank" name="periodRank" required>

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
  <table class="table table-striped mt-2 ">
    <tr>
      <th>ID</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>AM/PM</th>
      <th>Period No.</th>
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
      <td>{{$period1->period_number}}</td>
      <td>
        <form action="{{route('period.destroy',$period1->id)}}" method="post">
          @csrf
          @method('DELETE')

          <a href="{{route('period.edit',$period1->id)}}" class="btn btn-success">
            <i class="fa-solid fa-marker" aria-hidden="true"></i>
          </a>
          <button type="submit" class="btn btn-danger">
            <i class="fa-solid fa-trash-can" aria-hidden="true"></i>
          </button>
        </form>
      </td>
    </tr>

    @endforeach

  </table>
  { $period->links() }}
</div>
@endsection