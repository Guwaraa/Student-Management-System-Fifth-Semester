@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/classschedule.css') }}">

    </head>

    <body>
        <div class="flexbox" style="justify-content: space-between">
            <div class="scheduletable">
                <table id="schedule">

                    <tr>
                        <th style="text-align: center">Day</th>
                        @foreach ($time as $data)
                            @if ($data != '')
                                    <th style="text-align: center">{{ date('h:i ', strtotime($data)) }}</th>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td class="day">Sunday</td>
                        @foreach ($time as $data)
                            @if ($data != '')
                                @php
                                    $temp = 0;
                                @endphp
                                @foreach ($classschedules as $dataday)
                                    @if (strcmp($dataday->Time, $data) == 0)
                                        @if (strcmp($dataday->Day, 'Sunday') == 0)
                                            <td>{{ $dataday->Subject }}</td>
                                            @php
                                                $temp = 1;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if ($temp == 0)
                                    <td></td>
                                @endif
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td class="day">Monday</td>
                        @foreach ($time as $data)
                            @if ($data != '')
                                @php
                                    $temp = 0;
                                @endphp
                                @foreach ($classschedules as $dataday)
                                    @if (strcmp($dataday->Time, $data) == 0)
                                        @if (strcmp($dataday->Day, 'Monday') == 0)
                                            <td>{{ $dataday->Subject }}</td>
                                            @php
                                                $temp = 1;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if ($temp == 0)
                                    <td></td>
                                @endif
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td class="day">Tuesday</td>
                        @foreach ($time as $data)
                            @if ($data != '')
                                @php
                                    $temp = 0;
                                @endphp
                                @foreach ($classschedules as $dataday)
                                    @if (strcmp($dataday->Time, $data) == 0)
                                        @if (strcmp($dataday->Day, 'Tuesday') == 0)
                                            <td>{{ $dataday->Subject }}</td>
                                            @php
                                                $temp = 1;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if ($temp == 0)
                                    <td></td>
                                @endif
                            @endif
                        @endforeach

                    </tr>
                    <tr>
                        <td class="day">Wednesday</td>
                        @foreach ($time as $data)
                            @if ($data != '')
                                @php
                                    $temp = 0;
                                @endphp
                                @foreach ($classschedules as $dataday)
                                    @if (strcmp($dataday->Time, $data) == 0)
                                        @if (strcmp($dataday->Day, 'Wednesday') == 0)
                                            <td>{{ $dataday->Subject }}</td>
                                            @php
                                                $temp = 1;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if ($temp == 0)
                                    <td></td>
                                @endif
                            @endif
                        @endforeach

                    </tr>
                    <tr>
                        <td class="day">Thursday</td>
                        @foreach ($time as $data)
                            @if ($data != '')
                                @php
                                    $temp = 0;
                                @endphp
                                @foreach ($classschedules as $dataday)
                                    @if (strcmp($dataday->Time, $data) == 0)
                                        @if (strcmp($dataday->Day, 'Thursday') == 0)
                                            <td>{{ $dataday->Subject }}</td>
                                            @php
                                                $temp = 1;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if ($temp == 0)
                                    <td></td>
                                @endif
                            @endif
                        @endforeach

                    </tr>
                    <tr>
                        <td class="day">Friday</td>
                        @foreach ($time as $data)
                            @if ($data != '')
                                @php
                                    $temp = 0;
                                @endphp
                                @foreach ($classschedules as $dataday)
                                    @if (strcmp($dataday->Time, $data) == 0)
                                        @if (strcmp($dataday->Day, 'Friday') == 0)
                                            <td>{{ $dataday->Subject }}</td>
                                            @php
                                                $temp = 1;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                @if ($temp == 0)
                                    <td></td>
                                @endif
                            @endif
                        @endforeach

                    </tr>


                </table>
            </div>
            <form action="{{ route('classsSchedule.store') }}" method="POST">
                @csrf
                <div class="schedule-create">
                    <div>
                        <label>Time:</label>
                        <input type="time" name="time" autocomplete="off">
                    </div>
                    <div>
                        <label>Subject:</label>
                        <input type="text" name="subject" autocomplete="off">
                    </div>
                    <div class="checkbox-option">
                        <div>
                            <input type="checkbox" name="days[]" value="Sunday">
                            <label>Sunday</label>
                        </div>
                        <div>
                            <input type="checkbox" name="days[]" value="Monday">
                            <label>Monday</label>
                        </div>
                        <div>
                            <input type="checkbox" name="days[]" value="Tuesday">
                            <label>Tuesday</label>
                        </div>
                        <div>
                            <input type="checkbox" name="days[]" value="Wednesday">
                            <label>Wednesday</label>
                        </div>
                        <div>
                            <input type="checkbox" name="days[]" value="Thursday">
                            <label>Thursday</label>
                        </div>
                        <div>
                            <input type="checkbox" name="days[]" value="Friday">
                            <label>Friday</label>
                        </div>
                    </div>
                    <div class="create-option">
                        <button>Create</button>
                    </div>



                </div>
            </form>
        </div>
        <div>
            <a href="{{ route('classsSchedule.display') }}"  target="_blank">
            <button>Preview</button></a>
        </div>

    </body>

    </html>



@endsection
