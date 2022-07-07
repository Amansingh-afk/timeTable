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
        <a class="navbar-brand px-4 text-light">Classes</a>
    </div>
    <div class="container my-2 d-flex justify-content-between">
        <input type="search" name="" class="search_input w-50 bg-light px-2" id="" placeholder="Enter a keyword to search ">

        <div class="openBtn">
            <button class="openButton" onclick="openForm()"><strong>+ Add new Classes</strong></button>
        </div>
    </div>
    <div class="loginPopup">
        <div class="formPopup" id="popupForm">
            <form action="{{route('class.store')}}" class="formContainer" method="POST">
                @csrf
                <h5>Add New Class</h5>
                <label for="name">
                    <strong>Name</strong>
                </label>
                <input type="text" id="name" placeholder=" " name="classname" required>

                <strong>Course:</strong> <select name="classcourse" id="" class="form-control">
                    <option value="">Select Course</option>
                    @php
                    $courses=DB::table('courses')->get();
                    $periods=DB::table('periods')->get();
                    @endphp
                    @foreach ($courses as $course)
                    <option>{{$course->name}}</option>
                    @endforeach

                </select>
                <br>
                <strong>Academic Period:</strong> <select name="pre" id="" class="form-control">
                    <option value="">Select time</option>
                    @foreach ($periods as $period)
                    <option>{{$period->start_time}}</option>
                    @endforeach
                    @foreach ($periods as $period)
                    <option>{{$period->end_time}}</option>
                    @endforeach
                </select>

                <br>

                <label for="psw">
                    <strong>Meetings per Week</strong>
                </label>
                <input type="text" id="course" placeholder="" name="meet" required>

                <label for="psw">
                    <strong>Population</strong>
                </label>
                <input type="text" id="pro" placeholder="" name="pop" required>

                <label for="psw">
                    <strong>Unavailable Lecture Rooms</strong>
                </label>
                <input type="text" id="pro" placeholder=" " name="un_rooms" required>
                <button type="submit" class="btn">Add Class</button>
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
        </div>
    </div>
    <br>
    <br>
    <table class="table table-striped mx-2">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Academic Period</th>
            <th>Meetings per Week</th>
            <th>Population</th>
            <th>Unavailable Lecture Rooms</th>
            <th>Actions</th>
        </tr>

        @php
        $c = 1
        @endphp

        @foreach($classes as $class)
        <tr>
            <td>{{$c++ }}</td>
            <td>{{ $class->name }}</td>
            <td>{{ $class->Course }}</td>
            <td>{{ $class->Acdemic_period }}</td>
            <td>{{ $class->Meeting_per_week }}</td>
            <td>{{ $class->Population }}</td>
            <td>{{ $class->Unavailable_lecture_rooms }}</td>
            <td>
                <form action="{{route('class.destroy',$class->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{route('class.edit',$class->id)}}" class="btn btn-success">Edit</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>

        @endforeach

    </table>
    {{-- {!! $teachers->links() !!} --}}

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function openForm() {
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
</body>
@endsection