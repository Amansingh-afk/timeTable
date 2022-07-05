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
    <form action="{{route('period.update',$customer->id)}}" method="post">
        @csrf
        @method('PUT')
    Name: <input type="text" name="start" id="" class="form-control" value="{{$customer->start_time}}">
    <br>

    Course Code: <input type="text" name="end" id="" class="form-control" value="{{$customer->end_time}}">
    <br>

    Professor: <input type="text" name="time" id="" class="form-control" value="{{$customer->AM_PM}}">
    <br>
    
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>