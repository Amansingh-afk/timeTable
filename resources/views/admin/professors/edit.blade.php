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
    <form action="{{route('professor.update',$customer->id)}}" method="post">
        @csrf
        @method('PUT')
    Name: <input type="text" name="name" id="" class="form-control" value="{{$customer->name}}">
    <br>
    Email: <input type="text" name="email" id="" class="form-control" value="{{$customer->emali}}">
    <br>
    Course: <input type="text" name="course" id="" class="form-control" value="{{$customer->courses}}">
    <br>
    Unavailable Periods: <input type="text" name="Un_prid" id="" class="form-control" value="{{$customer->unavailable_periods}}">
    <br>
    
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

<script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>