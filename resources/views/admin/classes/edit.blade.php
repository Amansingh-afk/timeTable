
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
        <strong>Unavailable Lecture Rooms</strong> <input type="text" name="un_rooms" id="" class="form-control" value="{{$class->Unavailable_lecture_rooms}}">
        <br>
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

</body>