<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

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
          padding: 14px 20px;
          cursor: pointer;
          position: fixed;
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
    <input type="search" name="" class = "w-25 bg-light" id="" placeholder="Search ">

    {{-- links --}}
{{-- ------------------------------------------------------------------ --}}
    <br>
    <a href="{{route('room.index')}}">Rooms</a>
    <br>
    <a href="{{route('course.index')}}">Cources</a>
    <br>
    <a href="{{route('professor.index')}}">Professors</a>
    <br>
    <a href="{{route('period.create')}}">Period</a>
    <br>
{{-- ------------------------------------------------------------------ --}}



    {{-- <a href="{{ route('room.create')}}">Add new Room</a> --}}
    <div class="openBtn">
        <button class="openButton" onclick="openForm()"><strong>Add new Room</strong></button>
      </div>
      <div class="loginPopup">
        <div class="formPopup" id="popupForm">
          <form action="{{route('room.store')}}" class="formContainer" method="POST">
            @csrf
            <h2>Please enter the details</h2>
            <label for="name">
              <strong>Name</strong>
            </label>
            <input type="text" id="name" placeholder=" Name" name="name" required>
  
  
            <label for="psw">
              <strong>Capacity</strong>
            </label>
            <input type="text" id="cap" placeholder=" Capacity" name="cap" required>
  
            <label for="psw">
              <strong>Class Type</strong>
            </label>
            <input type="text" id="cap" placeholder=" Class Type" name="cType" required>
  
            <label for="psw">
              <strong>Status</strong>
            </label>
            <input type="text" id="cap" placeholder=" Status" name="status" required>
  
            <label for="psw">
              <strong>Remark</strong>
            </label>
            <input type="text" id="cap" placeholder=" Remark" name="remark" required>
  
  
  
            
            <button type="submit" class="btn">Add Lecture Room</button>
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
            <th>Name</th>
            <th>Capacity</th>
            <th>Class Type</th>
            <th>Status</th>
            <th>Remark</th>
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
        <td>{{ $room->remarks }}</td>
        <td>
            <form action="{{route('room.destroy',$room->id)}}" method="post">
                @csrf
                @method('DELETE')
            
            <a href="{{route('room.edit',$room->id)}}" class="btn btn-primary">Edit</a>     
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>

    @endforeach

    </table>
    {{-- {!! $teachers->links() !!} --}}

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>