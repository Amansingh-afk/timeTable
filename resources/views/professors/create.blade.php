<!DOCTYPE html>
<html>
  <head>
    <title>Title of the document</title>
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
    <br>
    <a href="{{route('room.index')}}">Rooms</a>
    <br>
    <a href="{{route('course.index')}}">Cources</a>
    <br>
    <a href="{{route('professor.index')}}">Professors</a>
    <br>
    <a href="{{route('period.create')}}">Period</a>
    <br>

    {{-- <a href="{{route('professor.index')}}">Professors</a> --}}


    {{-- <h2>Create Rooms</h2> --}}
    <div class="openBtn">
      <button class="openButton" onclick="openForm()"><strong>Add new Professor</strong></button>
    </div>
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="{{route('professor.store')}}" class="formContainer" method="POST">
          @csrf
          <h2>Add New Professor</h2>
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



          <button type="submit" class="btn">Add Professor</button>
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
  </body>
</html>