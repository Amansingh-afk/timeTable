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
    <br>

    <br>
    <a href="{{route('room.index')}}">Rooms</a>
    <br>
    <a href="{{route('course.index')}}">Cources</a>
    <br>
    <a href="{{route('professor.index')}}">Professors</a>
    <br>
    <a href="{{route('period.create')}}">Period</a>
    <br>

    {{-- <a href="{{ route('course.create')}}">Add new Cource</a> --}}


    <div class="openBtn">
        <button class="openButton" onclick="openForm()"><strong>Add new Course</strong></button>
      </div>
      <div class="loginPopup">
        <div class="formPopup" id="popupForm">
          <form action="{{route('course.store')}}" class="formContainer" method="POST">
            @csrf
            <h2>Add New Course</h2>
            <label for="name">
              <strong>Name</strong>
            </label>
            <input type="text" id="name" placeholder=" Name" name="name" required>
  
  
            <label for="psw">
              <strong>Course Code</strong>
            </label>
            <input type="text" id="course" placeholder=" Course Code" name="course" required>
  
            <label for="psw">
              <strong>Professor</strong>
            </label>
            <input type="text" id="pro" placeholder=" Professor Name" name="pro" required>
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
            <th>Name</th>
            <th>course_code</th>
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
        <td>{{ $course->professor }}</td>
        <td>
            <form action="{{route('course.destroy',$course->id)}}" method="post">
                @csrf
                @method('DELETE')
            
            <a href="{{route('course.edit',$course->id)}}" class="btn btn-primary">Edit</a>     
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