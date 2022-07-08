
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