<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <style>

    </style>
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h1 class="bg-danger"> SMS</h1>
                {{-- ------------------------------------------------------------------ --}}

                <a href="{{route('room.index')}}">Rooms</a>
                <br>
                <a href="{{route('course.index')}}">Cources</a>
                <br>
                <a href="{{route('professor.index')}}">Professors</a>
                <br>
                <a href="{{route('period.index')}}">Periods</a>
                <br>
                <a href="{{route('class.index')}}">Classes</a>
                <br>

                {{-- ------------------------------------------------------------------ --}}
            </div>
            <div class="col-md-10">
                @yield('content')
            </div>
        </div>
    </div>
<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>