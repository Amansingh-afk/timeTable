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
                        <td width="125" class="bg-dark text-nowrap">
                            {{$st->start_time}}-
                            {{$st->end_time}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection