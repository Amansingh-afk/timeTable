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
    <form action="{{route('course.update',$customer->id)}}" method="post">
        @csrf
        @method('PUT')
    Name: <input type="text" name="name" id="" class="form-control" value="{{$customer->name}}">
    <br>

    Course Code: <input type="text" name="cap" id="" class="form-control" value="{{$customer->course_code}}">
    <br>

    Professor: <input type="text" name="pro" id="" class="form-control" value="{{$customer->professor}}">
    <br>
    
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>