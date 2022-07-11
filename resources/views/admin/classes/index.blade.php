@extends('layouts.admin')

@section('content')

<link href="../assets/css/custom.css" rel="stylesheet" />

<div class="container-fluid w-100 bg-dark">
    <a class="navbar-brand px-4 text-light">Classes</a>
</div>
<div class="container my-2 d-flex justify-content-between">
    <div class="w-50">
        <form action="{{route('class.index')}}" method="GET" role="search">
            <input type="search" name="term" class="search_input w-75 bg-light p-2" id="term" placeholder="Enter a keyword to search ">
            <span class="input-group-btn">
                <button class="btn btn-info" type="submit" title="Search projects">
                    <span class="fas fa-search"></span>
                </button>
            </span>
            <a href="{{ route('class.index') }}" class=" mt-1">
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button" title="Refresh page">
                        <span class="fas fa-sync-alt"></span>
                    </button>
                </span>
            </a>
        </form>
    </div>
    <div>
        <button class="openButton" onclick="openForm()"><strong>+ Add new Class</strong></button>
    </div>
</div>
<div class="loginPopup">
    <div class="formPopup" id="popupForm">
        <form action="{{route('class.store')}}" class="formContainer" method="POST">
            @csrf
            <h5>Add New Class</h5>
                <strong>Subject:</strong>
                <select name="classname" id="name" class="form-control drpdwn m-2" required>
                    <option value="">Select Course</option>
                    @php
                    $courses=DB::table('courses')->get();
                    $periods=DB::table('periods')->get();
                    @endphp
                    @foreach ($courses as $course)
                    <option>{{$course->name}}</option>
                    @endforeach
                </select>
                <div class="d-flex align-items-center">
                    <strong>Department:</strong>
                    <select name="department" id="" class="form-control drpdwn m-2" required>
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                        <option>{{$course->department}}</option>
                        @endforeach
                    </select>
                    <strong>Sem: </strong>
                    <select name="sem" id="" class="form-control drpdwn m-2" required>
                        <option value="">Select Sem/Year</option>
                        @foreach ($courses as $course)
                        <option>{{$course->semester}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex align-items-center">
                    <strong class="text-nowrap ">Start-time</strong>
                    <select name="st" id="" class="form-control drpdwn m-2" required>
                        <option value="">Select time</option>
                        @foreach ($periods as $period)
                        <option>{{$period->start_time}}</option>
                        @endforeach
                    </select>

                    <br>

                    <strong class="text-nowrap">End-time</strong>
                    <select name="et" id="" class="form-control drpdwn m-2" required>
                        <option value="">Select time</option>
                        @foreach ($periods as $period)
                        <option>{{$period->end_time}}</option>
                        @endforeach
                    </select>

                </div>
                <label for="meet">
                    <strong>Meetings per Week</strong>
                </label>
                <input type="text" id="meet" placeholder="" name="meeting" required>

                <div class="d-flex">
                    <button type="submit" class="btn btn-info w">Add Class</button>
                    <button type="button" class="btn btn-danger w" onclick="closeForm()">Close</button>
                </div>
        </form>
    </div>
</div>
<br>
<br>
<div class="px-4">
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th style="width: 250px;">Paper Name</th>
            <th>Department</th>
            <th>Semester</th>
            <th>Start time</th>
            <th>End time</th>
            <th>Meetings per week</th>
            <th>Actions</th>
        </tr>

        @php
        $c = 1
        @endphp

        @foreach($classes as $class)
        <tr>
            <td>{{$c++ }}</td>
            <td>{{ $class->name }}</td>
            <td>{{ $class->department }}</td>
            <td>{{ $class->semester }}</td>
            <td>{{ $class->start_time }}</td>
            <td>{{ $class->end_time }}</td>
            <td>{{ $class->Meeting_per_week }}</td>

            <td>
                <form action="{{route('class.destroy',$class->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <a href="{{route('class.edit',$class->id)}}" class="btn btn-success">
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

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        function openForm() {
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
</div>

{{ $classes->links() }}
@endsection