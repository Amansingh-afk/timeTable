<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <form action="{{route('class.update',$class->id)}}" method="post">
        @csrf
        @method('PUT')
        <strong>Name:</strong> <input type="text" name="classname" id="" class="form-control" value="{{$class->name}}">
        <br>
        <strong>Course:</strong> <input type="text" name="classcourse" id="" class="form-control" value="{{$class->Course}}">
        <br>
        <strong>Academic Period:</strong> <input type="text" name="pre" id="" class="form-control" value="{{$class->Acdemic_period}}">
        <br>
        <strong>Meetings per Week</strong> <input type="text" name="meet" id="" class="form-control" value="{{$class->Meeting_per_week}}">
        <br>
        <strong>Population</strong> <input type="text" name="pop" id="" class="form-control" value="{{$class->Population}}">
        <br>
        <strong>Unavailable Lecture Rkkooms</strong> <input type="text" name="un_rooms" id="" class="form-control" value="{{$class->Unavailable_lecture_rooms}}">
        <br>
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

</body>
</html>