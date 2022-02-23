@extends('layout.admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
    <style>
        .a-tag {
            color: rgb(90, 86, 86);
        }

        .a-tag:hover {
            color: rgb(90, 86, 86);
        }

    </style>
    <div class="container">
        <div class="setting-Menu">
            <div class="header-section">
                <label class="title">Setting Menu<label>
            </div>
            <hr>
            <div class="menu-option">
                <div class="setting-option">
                    <div class="flex">
                        <div class="arrow-display">
                            <i class="fas fa-angle-double-right"></i>
                        </div>
                        <div class="menu-header">
                            <ul>
                                <label><a href="{{ route('changepassword.index') }}" class="a-tag">Account Setting</a><label>
                            </ul>
                        </div>

                    </div>

                </div>
                @if (auth()->user()->status != 'user')

                    <div class="setting-option">
                        <div class="flex">
                            <div class="arrow-display">
                                <i class="fas fa-angle-double-right" id="right"></i>
                                <i class="fas fa-angle-double-down" style="display: none;" id="down"></i>
                            </div>
                            <div class="menu-header" onclick="dropdown(1)">
                                <ul>
                                    <label>Subject Detail<label>
                                </ul>
                            </div>
                        </div>
                        <div class="option" id="option">
                            <div class="flex">
                                <div class="arrow-display">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <div class="list">
                                    <li><a href="{{ route('setting.modify') }}">Modify Course Detail</a></li>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="setting-option">
                        <div class="flex">
                            <div class="arrow-display">
                                <i class="fas fa-angle-double-right"></i>

                            </div>
                            <div class="menu-header" class="list">
                                <ul>
                                    <label><a href="{{ route('promote.index') }}" class="a-tag">Promote
                                            Student</a><label>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="setting-option">
                        <div class="flex">
                            <div class="arrow-display">
                                <i class="fas fa-angle-double-right" id="right2"></i>
                                <i class="fas fa-angle-double-down" style="display: none;" id="down2"></i>
                            </div>
                            <div class="menu-header" onclick="dropdown(2)">
                                <ul>
                                    <label>Student Detail<label>
                                </ul>
                            </div>
                        </div>
                        <div class="option" id="option2">
                            <div class="flex">
                                <div class="arrow-display">
                                    <i class="fas fa-angle-right"></i>
                                </div>
                                <div class="list">
                                    <li><a href="{{ route('setting.update') }}">Modify Student Detail</a></li>
                                </div>
                            </div>

                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
    <script>
        var flag = 1;

        function dropdown(num) {
            if (num == 1) {
                switch (flag) {
                    case 1: {

                        document.getElementById("option").style.display = "block";
                        document.getElementById("right").style.display = "none";
                        document.getElementById("down").style.display = "block";
                        flag = 2;
                        break;
                    }

                    case 2: {

                        document.getElementById("option").style.display = "none";
                        document.getElementById("right").style.display = "block";
                        document.getElementById("down").style.display = "none";
                        flag = 1;
                        break;
                    }
                }
            }
            if (num == 2) {
                switch (flag) {
                    case 1: {

                        document.getElementById("option2").style.display = "block";
                        document.getElementById("right2").style.display = "none";
                        document.getElementById("down2").style.display = "block";
                        flag = 2;
                        break;
                    }

                    case 2: {

                        document.getElementById("option2").style.display = "none";
                        document.getElementById("right2").style.display = "block";
                        document.getElementById("down2").style.display = "none";
                        flag = 1;
                        break;
                    }
                }
            }


        }
    </script>
@endsection
