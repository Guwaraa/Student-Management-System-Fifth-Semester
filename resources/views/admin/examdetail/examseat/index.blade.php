@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="{{ asset('css/seatstyle.css') }}" rel="stylesheet">
        <link href="{{ asset('css/table.css') }}" rel="stylesheet">

    </head>

    <body>
        <div class="roompanel">
            <div class="room-pannel" onclick="display(1)">
                <a class="room-btn">Room I</a>
            </div>
            <div class="room-pannel" onclick="display(2)">
                <a class="room-btn">Room II</a>

            </div>
            <div class="room-pannel" onclick="display(3)">
                <a class="room-btn">Room III</a>

            </div>
            <div class="room-pannel" onclick="display(4)">
                <a class="room-btn">Room IV</a>

            </div>
        </div>
        <hr>
        {{-- <div class="seatplan">
            <div class="leftside">
                <table class="schedule">
                    <tr>
                        <th>
                            <select class="select-box form-select" name="roomI1" id="roomI1"
                                onchange="displayseat('I' , 1)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI2" id="roomI2"
                                onchange="displayseat('I' , 2)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI3" id="roomI3"
                                onchange="displayseat('I' , 3)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI4" id="roomI4"
                                onchange="displayseat('I' , 4)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                    </tr>
                    <tr>
                        <td id="roomI1a"></td>
                        <td id="roomI2a"></td>
                        <td id="roomI3a"></td>
                        <td id="roomI4a"></td>
                    </tr>
                    <tr>
                        <td id="roomI1b"></td>
                        <td id="roomI2b"></td>
                        <td id="roomI3b"></td>
                        <td id="roomI4b"></td>
                    </tr>
                    <tr>
                        <td id="roomI1c"></td>
                        <td id="roomI2c"></td>
                        <td id="roomI3c"></td>
                        <td id="roomI4c"></td>
                    </tr>
                    <tr>
                        <td id="roomI1d"></td>
                        <td id="roomI2d"></td>
                        <td id="roomI3d"></td>
                        <td id="roomI4d"></td>
                    </tr>
                    <tr>
                        <td id="roomI1e"></td>
                        <td id="roomI2e"></td>
                        <td id="roomI3e"></td>
                        <td id="roomI4e"></td>
                    </tr>
                </table>
            </div>
            <div class="rightside">
                <table class="schedule">
                    <tr>
                        <th>
                            <select class="select-box form-select" name="roomI5" id="roomI5"
                                onchange="displayseat('I' , 5)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI6" id="roomI6"
                                onchange="displayseat('I' , 6)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI7" id="roomI7"
                                onchange="displayseat('I' , 7)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI8" id="roomI8"
                                onchange="displayseat('I' , 8)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                    </tr>
                    <tr>
                        <td id="roomI5a"></td>
                        <td id="roomI6a"></td>
                        <td id="roomI7a"></td>
                        <td id="roomI8a"></td>
                    </tr>
                    <tr>
                        <td id="roomI5b"></td>
                        <td id="roomI6b"></td>
                        <td id="roomI7b"></td>
                        <td id="roomI8b"></td>
                    </tr>
                    <tr>
                        <td id="roomI5c"></td>
                        <td id="roomI6c"></td>
                        <td id="roomI7c"></td>
                        <td id="roomI8c"></td>
                    </tr>
                    <tr>
                        <td id="roomI5d"></td>
                        <td id="roomI6d"></td>
                        <td id="roomI7d"></td>
                        <td id="roomI8d"></td>
                    </tr>
                    <tr>
                        <td id="roomI5e"></td>
                        <td id="roomI6e"></td>
                        <td id="roomI7e"></td>
                        <td id="roomI8e"></td>
                    </tr>
                </table>
            </div>
        </div> --}}
        {{-- <div class="seatplan">
            <div class="leftside">
                <table class="schedule">
                    <tr>
                        <th>
                            <select class="select-box form-select" name="roomI1" id="roomI1"
                                onchange="displayseat('II' , 1)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI2" id="roomI2"
                                onchange="displayseat('II' , 2)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI3" id="roomI3"
                                onchange="displayseat('II' , 3)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI4" id="roomI4"
                                onchange="displayseat('II' , 4)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                    </tr>
                    <tr>
                        <td id="roomII1a"></td>
                        <td id="roomII2a"></td>
                        <td id="roomII3a"></td>
                        <td id="roomII4a"></td>
                    </tr>
                    <tr>
                        <td id="roomII1b"></td>
                        <td id="roomII2b"></td>
                        <td id="roomII3b"></td>
                        <td id="roomII4b"></td>
                    </tr>
                    <tr>
                        <td id="roomII1c"></td>
                        <td id="roomII2c"></td>
                        <td id="roomII3c"></td>
                        <td id="roomII4c"></td>
                    </tr>
                    <tr>
                        <td id="roomII1d"></td>
                        <td id="roomII2d"></td>
                        <td id="roomII3d"></td>
                        <td id="roomII4d"></td>
                    </tr>
                    <tr>
                        <td id="roomII1e"></td>
                        <td id="roomII2e"></td>
                        <td id="roomII3e"></td>
                        <td id="roomII4e"></td>
                    </tr>
                </table>
            </div>
            <div class="rightside">
                <table class="schedule">
                    <tr>
                        <th>
                            <select class="select-box form-select" name="roomI5" id="roomI5"
                                onchange="displayseat('I' , 5)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI6" id="roomI6"
                                onchange="displayseat('I' , 6)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI7" id="roomI7"
                                onchange="displayseat('I' , 7)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                        <th>
                            <select class="select-box form-select" name="roomI8" id="roomI8"
                                onchange="displayseat('I' , 8)">
                                <option selected></option>
                                <option value="first">1st sem</option>
                                <option value="second">3rd sem</option>
                                <option value="third">5th sem</option>
                                <option value="fourth">7th sem</option>

                                <select>
                        </th>
                    </tr>
                    <tr>
                        <td id="roomI5a"></td>
                        <td id="roomI6a"></td>
                        <td id="roomI7a"></td>
                        <td id="roomI8a"></td>
                    </tr>
                    <tr>
                        <td id="roomI5b"></td>
                        <td id="roomI6b"></td>
                        <td id="roomI7b"></td>
                        <td id="roomI8b"></td>
                    </tr>
                    <tr>
                        <td id="roomI5c"></td>
                        <td id="roomI6c"></td>
                        <td id="roomI7c"></td>
                        <td id="roomI8c"></td>
                    </tr>
                    <tr>
                        <td id="roomI5d"></td>
                        <td id="roomI6d"></td>
                        <td id="roomI7d"></td>
                        <td id="roomI8d"></td>
                    </tr>
                    <tr>
                        <td id="roomI5e"></td>
                        <td id="roomI6e"></td>
                        <td id="roomI7e"></td>
                        <td id="roomI8e"></td>
                    </tr>
                </table>
            </div>
        </div> --}}



        <div class="seatplan" id="1">
            <div class="leftside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>

                    </tr>
                    @for ($j = 0; $j < 5; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor

                </table>
            </div>
            <div class="rightside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>
                    </tr>
                    @for ($j = 5; $j < 10; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor
                </table>
            </div>

        </div>
        <div class="seatplan" style="display: none" id="2">
            <div class="leftside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>

                    </tr>
                    @for ($j = 10; $j < 15; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor

                </table>
            </div>
            <div class="rightside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>
                    </tr>
                    @for ($j = 15; $j < 20; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor
                </table>
            </div>

        </div>
        <div class="seatplan" style="display: none" id="3">
            <div class="leftside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>

                    </tr>
                    @for ($j = 20; $j < 25; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor

                </table>
            </div>
            <div class="rightside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>
                    </tr>
                    @for ($j = 25; $j < 30; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor
                </table>
            </div>

        </div>
        <div class="seatplan" style="display: none" id="4">
            <div class="leftside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>

                    </tr>
                    @for ($j = 30; $j < 35; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor

                </table>
            </div>
            <div class="rightside">
                <table class="schedule">
                    <tr>
                        <th>First year</th>
                        <th>Second year</th>
                        <th>Third year</th>
                        <th>Fourth year</th>
                    </tr>
                    @for ($j = 35; $j < 40; $j++)

                        <tr>
                            <td>{{ $firstyear[$j] }}</td>
                            <td>{{ $secondyear[$j] }}</td>
                            <td>{{ $thirdyear[$j] }}</td>
                            <td>{{ $fourthyear[$j] }}</td>

                        </tr>
                    @endfor
                </table>
            </div>

        </div>


        <div class="footer-menu">

        </div>
        <script>
            function display(num) {
                switch (num) {
                    case 1: {
                        document.getElementById("1").style.display="flex";
                        document.getElementById("2").style.display="none";
                        document.getElementById("3").style.display="none";
                        document.getElementById("4").style.display="none";

                        break;
                    }
                    case 2: {
                        document.getElementById("1").style.display="none";
                        document.getElementById("2").style.display="flex";
                        document.getElementById("3").style.display="none";
                        document.getElementById("4").style.display="none";
                        break;
                    }
                    case 3: {
                        document.getElementById("1").style.display="none";
                        document.getElementById("2").style.display="none";
                        document.getElementById("3").style.display="flex";
                        document.getElementById("4").style.display="none";
                        break;
                    }
                    case 4: {
                        document.getElementById("1").style.display="none";
                        document.getElementById("2").style.display="none";
                        document.getElementById("3").style.display="none";
                        document.getElementById("4").style.display="flex";
                        break;
                    }
                }
            }
        </script>

    </body>

    </html>
@endsection
