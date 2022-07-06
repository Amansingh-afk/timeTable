<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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

    <a href="{{ route('course.create')}}">+ Add new Cource</a>
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