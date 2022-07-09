
<body>
    <div class="container">
    <form action="{{route('class.update',$class->id)}}" method="post">
        @csrf
        @method('PUT')
        <strong>Name:</strong> <input type="text" name="classname" id="" class="form-control" value="{{$class->name}}">
        <br>
        <strong>Department:</strong> <input type="text" name="department" id="" class="form-control" value="{{$class->department}}">
        <br>
        <strong>Semester:</strong> <input type="text" name="sem" id="" class="form-control" value="{{$class->semester}}">
        <br>
        <strong>Start Time</strong> <input type="text" name="st" id="" class="form-control" value="{{$class->start_time}}">
        <br>
        <strong>End Time</strong> <input type="text" name="et" id="" class="form-control" value="{{$class->end_time}}">
        <br>
        <strong>Meetings per Week</strong> <input type="text" name="meeting" id="" class="form-control" value="{{$class->Meeting_per_week}}">
        <br>
    <button type="submit" class="btn btn-success">Update</button>
    </form>
    </div>

</body>