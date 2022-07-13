@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h5 class="mb-0">
                    Time Table
                </h5>
            </div>
            <table class="table table-bordered text-light text-center">
                <thead>
                    <th width="125" class="bg-dark">
                        Time
                    </th>
                    @foreach($weekDays as $day)
                    <th class="bg-secondary">
                        {{ $day }}
                    </th>
                    @endforeach
                </thead>
                <tbody>
                    @foreach($time as $st)
                    <tr height="88">
                        <td width="110" class="bg-dark text-nowrap">
                            {{$st->start_time}}-
                            {{$st->end_time}}
                        </td>
                        @foreach($classDetails as $i => $class)
                        @if($i == 1)
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