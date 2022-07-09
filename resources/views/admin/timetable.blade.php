@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="m-1">Time Table</div>
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

                    @php
                    $start_time = DB::table('periods')->get();
                    @endphp
                    @foreach($start_time as $st)
                    <tr height="88">
                        <td width="125" class="bg-dark">
                            {{$st->start_time}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection