@extends('layouts.admin')

@section('content')
<style>
    .time {
        font-size: 10px;;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h5 class="mb-0">
                    Time Table for {{$depart}} {{$semester}}
                </h5>
            </div>
            <table class="table table-bordered text-light text-center">
                <thead>
                    <th width="125" class="bg-dark">
                        Time
                    </th>
                    @foreach($time as $st)
                    <th width="100" class="bg-secondary time ">
                        {{$st->start_time}}
                        <!-- {{$st->end_time}} -->
                    </th>
                    @endforeach
                </thead>
                <tbody>
                    @foreach($weekDays as $day)
                    <tr height="88">
                        <td class="bg-dark">
                            {{ $day }}
                        </td>
                        @foreach($classDetails as $i => $class)
                        @if($i == 2)
                        <td class="text-dark">
                            LUNCH
                        </td>
                        @endif
                        <td width="140" class="text-dark">
                            {{$class->name}}
                            <p class="text-danger">{{$class->professor}}</p>
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection