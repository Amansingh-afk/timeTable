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
    <form action="{{route('room.update',$customer->id)}}" method="post">
        @csrf
        @method('PUT')
    Name: <input type="text" name="name" id="" class="form-control" value="{{$customer->name}}">
    <br>
    Capacity: <input type="text" name="cap" id="" class="form-control" value="{{$customer->capacity}}">
    <br>
    Class Type: <input type="text" name="cType" id="" class="form-control" value="{{$customer->type}}">
    <br>
    Status: <input type="text" name="status" id="" class="form-control" value="{{$customer->isActive}}">
    <br>
    Remark: <input type="text" name="remark" id="" class="form-control" value="{{$customer->remarks}}">
    <br>
    
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>