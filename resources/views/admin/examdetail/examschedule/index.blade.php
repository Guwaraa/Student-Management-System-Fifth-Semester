@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/styleschedule.css') }}" rel="stylesheet">
    </head>

    <body>

        <div style="background-color:slategray">
            <a href="{{ route('examschedule.boardschedule') }}" ><button class="board">Board
                    Exam</button></a>
        </div>

        <div class="clearfix"></div>
        <div class="container-fluid">
            <form method="POST" action="{{ route('examschedule.display') }}">
                @csrf

                <div class="buttonfirst" style="margin-top:10% ;">
                    <div>
                        <button class="button" type="submit" name="sem" value="First_sem">1<sup
                                value="First_sem">st</sup> sem</button>
                    </div>
                    <div>
                        <button class="button" type="submit" name="sem" value="Third_sem">3<sup>rd</sup> sem</button>

                    </div>
                    <div>
                        <button class="button" type="submit" name="sem" value="Fifth_sem">5<sup>th</sup> sem</button>

                    </div>
                    <div>
                        <button class="button" type="submit" name="sem" value="Seventh_sem">7<sup>th</sup> sem</button>

                    </div>
                </div>
                <div class="buttonsecond" style="margin-top:15% ;">
                    <div>
                        <button class="button" type="submit" name="sem"value="Second_sem">2<sup>nd</sup> sem</button>

                    </div>
                    <div>
                        <button class="button" type="submit" name="sem"value="Fourth_sem">4<sup>th</sup> sem</button>

                    </div>
                    <div>
                        <button class="button" type="submit" name="sem"value="Sixth_sem">6<sup>th</sup> sem</button>

                    </div>
                    <div>
                        <button class="button" type="submit" name="sem"value="Eight_sem">8<sup>th</sup> sem</button>

                    </div>
                </div>
            </form>
        </div>
    </body>

    </html>
@endsection
