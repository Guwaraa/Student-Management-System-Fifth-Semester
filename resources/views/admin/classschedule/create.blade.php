@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="{{ asset('css/classschedule.css') }}">

    </head>

    <body>
        <div class="flexbox" style="justify-content: space-between" >
            <div class="scheduletable" style="width: 20%">
                <table id="schedule" >

                    <tr>
                        <th style="text-align: center">Day</th>

                    </tr>
                    <tr>
                        <td class="day">Sunday</td>

                    </tr>
                    <tr>
                        <td class="day">Monday</td>

                    </tr>
                    <tr>
                        <td class="day">Tuesday</td>

                    </tr>
                    <tr>
                        <td class="day">Wednesday</td>

                    </tr>
                    <tr>
                        <td class="day">Thursday</td>
                    </tr>
                    <tr>
                        <td class="day">Friday</td>
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

    </body>

    </html>



@endsection
