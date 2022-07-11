@extends('layouts.admin')

@section('content')
<link href="../assets/css/custom.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>       


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<div class="container-fluid w-100 bg-dark">
  <a class="navbar-brand px-4 text-light">
    Rooms
  </a>
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
    <button class="openButton mt-1" onclick="openForm()">
      <strong>+ Add new Room</strong>
    </button>
  </div>
</div>
<div class="loginPopup">
  <div class="formPopup" id="popupForm">
    <form action="{{route('room.store')}}" class="formContainer" method="POST">
      @csrf
      <h5>
        Add New Lecture Room
      </h5>
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
        <button type="submit" class="btn btn-info w">
          Add Lecture Room
        </button>
        <button type="button" class="btn btn-danger w" onclick="closeForm()">
          Close
        </button>
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
  @csrf
  <table id="editable" class="table table-striped">
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

          <a href="{{route('room.edit',$room->id)}}" class="btn btn-success">
            <i class="fa-solid fa-marker"></i>
          </a>
          <button type="submit" class="btn btn-danger">
            <i class="fa-solid fa-trash-can"></i>
          </button>
        </form>
      </td>
    </tr>

    @endforeach

  </table>
</div>
<script src="assets/js/tableedit.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    console.log('working');

    $.ajaxSetup({
      headers: {
        'X-CSRF-Token': $("input[name=_token]").val()
      }
    });

    $('#editable').Tabledit({
      url: '{{ route("room.action") }}',
      dataType: "json",
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'name'],
          [2, 'capacity'],
          [3, 'type'],
          [4, 'isActive'],
        ]
      },
      restoreButton: false,
      onSuccess: function(data, textStatus, jqXHR) {
        console.log(data);
        if (data.action == 'delete') {
          $('#' + data.id).remove();
        }
      }
    });

  });
</script>


{{ $rooms->links() }}
     
@endsection