@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <style>
            .floating-panel {
                position: absolute;
                width: 45%;
                height: 65%;
                background-color: silver;
                margin-top: -10%;
                margin-left: 15%;


            }

            .title {
                display: flex;

            }

            .post-result {
                width: 85%;
                text-align: center;
                padding-top: 10px;
                font-size: 25px;
                color: black;
                font-weight: bold;
            }

            .close-button {
                width: 10%;


            }

            .btn {
                margin-top: 5px;
                font-size: 40px;
                border-radius: 100%
            }

            .btn:hover {
                color: black;
                border: none;
                outline: none;
                background-color: transparent;
            }

            .select {
                font-family: 'FontAwesome', 'Second Font name';
                width: 40%;
                height: 30px;
                background-color: transparent;
                outline: none;
                border: none;
            }

        </style>

    </head>
    <link href="{{ asset('css/mainpage.css') }}" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet" />


    <body>
        @php
            session_start();
            $_SESSION['status'] = auth()->user()->status;
            $_SESSION['semester'] = auth()->user()->Semester;
        @endphp
        @foreach ($studentdetailprofile as $detail)
            @if (auth()->user()->Std_Id == $detail->Std_Id)
                @if (auth()->user()->status != 'user')
                    <div class="container ">
                        <div class="form-control notice-box">
                            <div class="flex-box">
                                <div class="image">
                                    <img src="{{ asset('profileimage/' . $detail->profile_image) }}" alt="profilepic"
                                        class="image-responsive" />
                                </div>
                                <div class="text-label">
                                    <label>Create Post:</label>
                                    <div onclick="displaypanel()">
                                        <input type="text" placeholder="What's on your mind" name="noticebox"
                                            class="textbox-notice" disabled />
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>

                    </div>


                    <div class="floating-panel" id="formpage" style="display: none;">
                        <div class="title">
                            <div class="post-result">
                                Create Post
                            </div>
                            <div class="close-button">
                                <a class="far fa-times-circle btn" onclick="closefun()"></a>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ route('homepagemenu.store') }}" method="POST">
                            @csrf
                            <div class="header">
                                <div style="display: flex">
                                    <div class="image" style="width: 8%; margin-left: 2%">
                                        <img src="{{ asset('profileimage/' . $detail->profile_image) }}" alt=""
                                            class="image-responsive">
                                        <input type="text" value="{{ $detail->profile_image }}" style="display: none;"
                                            name="image">
                                    </div>
                                    <div style="width: 80%; margin-left: 20px;">
                                        <label style="font-size: 16px;color:black;">{{ $detail->first_name }}
                                            {{ $detail->last_name }}</label>
                                        <input type="text" value="{{ $detail->first_name }} {{ $detail->last_name }}"
                                            style="display: none;" name="name">

                                        <div>
                                            <select class="form-select form-select-lg mb-3 select" name="select" id="select"
                                                onchange="change()">
                                                <option value="public"> &#xf0ac; Public</option>
                                                <option value="semester">
                                                    Select Semester
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style=" margin-left: 5%;">
                                <input type="text" style="width: 95%;height: 10%;outline: none;" placeholder="Title"
                                    name="title">
                            </div>
                            <div style=" margin-left: 5%;">
                                <input type="text" style="width: 95%;height: 25%;outline: none;"
                                    placeholder="Write something" name="notice" autocomplete="off">
                            </div>
                            <div style="color: black;padding-top: 10px;display: none;text-align: center; border: 1px solid white"
                                id="checkbox">
                                <input type="checkbox" name="selectsemester[]" value="First_sem">1st sem
                                <input type="checkbox" name="selectsemester[]" value="Second_sem">2nd sem
                                <input type="checkbox" name="selectsemester[]" value="Third_sem">3rd sem
                                <input type="checkbox" name="selectsemester[]" value="Fourth_sem">4rth sem
                                <input type="checkbox" name="selectsemester[]" value="Fifth_sem">5th sem
                                <input type="checkbox" name="selectsemester[]" value="Sixth_sem">6th sem
                                <input type="checkbox" name="selectsemester[]" value="Seventh_sem">7th sem
                                <input type="checkbox" name="selectsemester[]" value="Eight_sem">8th sem
                            </div>
                            <div style="margin-left: 30%;margin-top: 20px">
                                <button type="submit">Post</button>
                            </div>
                        </form>
                    </div>
                @endif
            @endif
        @endforeach


        @if ($_SESSION['status'] != 'user')
            @foreach ($profile as $details)
                <div class="container">
                    <div class="form-control notice-box">
                        <div class="flex-box">
                            <div class="image">
                                <img src="{{ asset('profileimage/' . $details->image) }}" alt="profilepic"
                                    class="image-responsive" />
                            </div>

                            <div class="text-label">
                                <label>{{ $details->name }}</label><br>
                                @if ($details->semester == 'public')
                                    <i class="fas fa-globe-americas"></i> {{ $details->semester }}
                                @else
                                    <i class="fas fa-lock"></i> {{ $details->semester }}

                                @endif
                                <div class="user-content">
                                    <div style="font-size: 20px;font-weight: bold;">
                                        {{ $details->title }}
                                    </div>
                                    <hr>
                                    <div style="font-size: 16px;">
                                        {{ $details->notice }}
                                    </div>
                                </div>
                            </div>
                            <div style="font-size: 14px;font-weight: bold;">
                                {{ $details->created_at }}
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        @else
            @foreach ($profile as $details)

                @if ("public"== $details->semester)
                    <div class="container">
                        <div class="form-control notice-box">
                            <div class="flex-box">
                                <div class="image">
                                    <img src="{{ asset('profileimage/' . $details->image) }}" alt="profilepic"
                                        class="image-responsive" />
                                </div>

                                <div class="text-label">
                                    <label>{{ $details->name }}</label><br>
                                    @if ($details->semester == 'public')
                                        <i class="fas fa-globe-americas"></i> {{ $details->semester }}
                                    @else
                                        <i class="fas fa-lock"></i> {{ $details->semester }}

                                    @endif
                                    <div class="user-content">
                                        <div style="font-size: 20px;font-weight: bold;">
                                            {{ $details->title }}
                                        </div>
                                        <hr>
                                        <div style="font-size: 16px;">
                                            {{ $details->notice }}
                                        </div>
                                    </div>
                                </div>
                                <div style="font-size: 14px;font-weight: bold;">
                                    {{ $details->created_at }}
                                </div>
                            </div>

                        </div>
                    </div>
                @endif

                @if ($_SESSION['semester'] == $details->semester)
                    <div class="container">
                        <div class="form-control notice-box">
                            <div class="flex-box">
                                <div class="image">
                                    <img src="{{ asset('profileimage/' . $details->image) }}" alt="profilepic"
                                        class="image-responsive" />
                                </div>

                                <div class="text-label">
                                    <label>{{ $details->name }}</label><br>
                                    @if ($details->semester == 'public')
                                        <i class="fas fa-globe-americas"></i> {{ $details->semester }}
                                    @else
                                        <i class="fas fa-lock"></i> {{ $details->semester }}

                                    @endif
                                    <div class="user-content">
                                        <div style="font-size: 20px;font-weight: bold;">
                                            {{ $details->title }}
                                        </div>
                                        <hr>
                                        <div style="font-size: 16px;">
                                            {{ $details->notice }}
                                        </div>
                                    </div>
                                </div>
                                <div style="font-size: 14px;font-weight: bold;">
                                    {{ $details->created_at }}
                                </div>
                            </div>

                        </div>
                    </div>
                @endif

            @endforeach
        @endif
        <script>
            function displaypanel() {
                document.getElementById("formpage").style.display = "block";
            }

            function closefun() {
                document.getElementById("formpage").style.display = "none";

            }

            function change() {
                var semester = document.getElementById('select').value;
                if (semester == "public") {
                    document.getElementById('checkbox').style.display = "none";
                }
                if (semester == "semester") {
                    document.getElementById('checkbox').style.display = "block";
                }
            }
        </script>
    </body>

    </html>
@endsection
