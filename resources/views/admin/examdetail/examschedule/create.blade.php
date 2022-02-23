@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="{{ asset('css/table.css') }}">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                font-weight: 150;
            }

            #schedule tr:hover {
                background-color: gainsboro;
            }

            .header-container {
                width: 100%;
                height: 20%;
            }

            .header-menu {
                width: 100%;
                height: 70%;
                display: flex;
                justify-content: space-evenly;
            }

            .header-menu div {
                width: 50%;
                height: 100%;
            }

            .header-button {
                text-align: center;
            }

            .button {
                height: 30%;
                width: 10%;
            }

            label {
                font-size: 20px;
                font-weight: bold;
                display: block;
                width: 100%;
                color: slategray;

            }

            .display-center {
                text-align: center;
            }

            .date {
                width: 10%;
                border: 1px solid white;
                background: whitesmoke;
                text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
                outline: none;
            }

            .interval {
                border: 2px solid #dadada;
                border-radius: 4px;
                box-sizing: border-box;
                padding: 2px;
            }

            .interval:focus {
                outline: none;
                border-color: slategray;
                box-shadow: 0 0 10px slategray;
            }

        </style>
    </head>

    <body>
        <div class="header-container">
            <form  action="{{ route('examschedule.calculatedate')}}" method="POST">
                @csrf
                <div class="header-menu">
                    <div class="starting-date display-center" style=" background-color: white;">
                        <label> Choose starting date of exam:</label>
                        {{ $date }} /
                        <select name="month" class="date">
                            <option selected></option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option>{{ $i }} </option>
                            @endfor
                        </select>
                        / <select name="day" class=" date">
                            <option selected></option>
                            @for ($i = 1; $i <= 32; $i++)
                                <option>{{ $i }}</option>
                            @endfor

                        </select>
                    </div>
                    <div class="exam-interval display-center" style=" background-color: white;">
                        <label>Enter the exam interval:</label>
                        <input type="text" placeholder="number of days" class="interval" name="interval"><span> Days</span>
                    </div>

                </div>
                <div class="header-button ">
                <input type="text" value="{{ $sem }}" name="sem" style="display: none">

                    <button type="submit" class="button">Done</button>
                </div>
            </form>
        </div>

        <div class="container" style="margin: 20px auto;">
            <table id="schedule">
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Subject</th>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>












            </table>
        </div>
        <script>
            function datechange() {
                var i = document.getElementById("month").value;
                alert(i);
            }
        </script>
    </body>

    </html>

@endsection
