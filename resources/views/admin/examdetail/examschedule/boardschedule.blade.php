@extends('layout.admin.layout')
@section('content')
    <html>

    <head>
        <title>Terminal</title>
        <style>
            .body {
                margin-top: 20px;
                background-color: gainsboro;
            }

            .file:hover {
                background-color: gainsboro;
            }

            .option button {
                border: none;
                outline: none;
                background-color: transparent;
            }

            .show {
                color: black;
            }

            .show:hover {
                text-decoration: none;
                color: black;
            }

            .header {
                margin-top: 30px;
                display: flex;
            }

            .select {
                width: 300px;
                margin-left: 30px;
                font-size: large;
            }

            .label {
                font-size: x-large;
                font-weight: 500;
                font-family: Georgia, 'Times New Roman', Times, serif;
            }

            .sem:hover,
            .sembut:hover {
                box-shadow: 0px 3px orange;
                color: white;
                text-decoration: none;
            }

            .sem {
                background-color: slategray;
                border: none;
                padding: 10px 100px;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }

            .buttonclass {
                display: flex;
            }

            .sembut {
                padding: 10px 10px;
                background-color: slategray;
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                font-size: 16px;
            }

            .floating-form {}

        </style>
        <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
        <link href="{{ asset('css/examresult.css') }}" rel="stylesheet">

    </head>

    <body>
        @if (auth()->user()->status != 'user')

            <div class="header">
                <div>
                    <label class="label">Select Semester:</label>
                </div>
                <form action="{{ route('examschedule.boardscheduledisplay') }}" method="POST">
                    @csrf
                    <div style="display: flex; justify-content: space-evenly">
                        <div>
                            <select class="select form-select" name="semester">
                                <option selected hidden>{{ $semester }}</option>
                                <option value="First_sem">First Semester</option>
                                <option value="Second_sem">Second Semester</option>
                                <option value="Third_sem">Third Semester</option>
                                <option value="Fourth_sem">Fourth Semester</option>
                                <option value="Fifth_sem">Fifth Semester</option>
                                <option value="Sixth_sem">Sixth Semester</option>
                                <option value="Seventh_sem">Seventh Semester</option>
                                <option value="Eight_sem">Eight Semester</option>
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="fas fa-search"
                                style="font-size: 25px; background-color: transparent; border: none; outline:none"></button>
                        </div>
                    </div>
                </form>
                <div style="margin-left:190px" class="buttonclass">
                    <a class="sembut fas fa-file-upload" style="margin-right:10px;" onclick="uploadpage()">Upload</a>
                    <a class="sembut fas fa-globe " style="float:right" target="_blank"
                        href="https://www.puexam.edu.np/index.php/find-results"> Brower</a>

                </div>
            </div>
        @endif


        <div class="container">
            <div class="floating-form" id="formpage">
                <div class="title">
                    <div class="post-result">
                        Post Exam Schedule
                    </div>
                    <div class="close-button">
                        <button class="far fa-times-circle btn-close" onclick="closefun()"></button>
                    </div>

                </div>
                <form action="{{ route('examschedule.boardschedulestore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="title-result">
                        <div class="title-label">
                            <label>Title:</label>
                        </div>
                        <div class="title-textbox">
                            <input type="text" class="form-control input-box" name="title">
                        </div>
                    </div>
                    <div class="remarks-result">
                        <div class="remarks-label">
                            <label>Remarks:</label>
                        </div>
                        <div class="remarks-textbox">
                            <input type="text" class="form-control input-box" name="remarks">
                        </div>
                    </div>
                    <div class="flex-field">
                        <div class="result-data">
                            <input id="file_name" type="text" class="form-control input-box">
                        </div>
                        <div class="button-upload">
                            <input type="file" name="uploadfile[]" id="img" style="display:none;" onchange="display()" />
                            <label for="img" class="upload-button fas fa-file-upload"></label>
                        </div>
                    </div>
                    <div class="flex-box">
                        <div class="semester-combobox">
                            <select class="form-select select-box" name="semester">
                                <option selected>Select Semester</option>
                                <option value="First_sem">First Semester</option>
                                <option value="Second_sem">Second Semester</option>
                                <option value="Third_sem">Third Semester</option>
                                <option value="Fourth_sem">Fourth Semester</option>
                                <option value="Fifth_sem">Fifth Semester</option>
                                <option value="Sixth_sem">Sixth Semester</option>
                                <option value="Seventh_sem">Seventh Semester</option>
                                <option value="Eight_sem">Eight Semester</option>

                            </select>
                        </div>
                        <div class="button-save">
                            <button class="btn-save">Save</button>
                        </div>
                    </div>
                </form>

            </div>

            <div>

                @if ($semester != null)
                    @foreach ($result as $data)
                        @if ($data->examtype == 'board')
                            @if ($data->semester == $semester)
                                <div style="display: flex; justify-content: space-evenly; width:100%; height:10%; padding: 5px;color:black"
                                    class="file" onmouseover="displayoption()">
                                    <div style="width: 5%;font-size: 30px; padding: 4px;">
                                        <i class="far fa-file"></i>
                                    </div>
                                    <div style=" width: 75%; display: flex;font-size: 16px;">
                                        <div style="width: 70%;padding: 4px;font-size: 20px;">
                                            <a href="{{ route('examschedule.edit', [$data->id]) }} " target="_blank"
                                                class="show">
                                                <div>
                                                    {{ $data->title }}
                                                </div>
                                            </a>
                                        </div>
                                        <div style="text-align: center; width:30%;">
                                            Modified at: {{ $data->updated_at }}
                                        </div>
                                    </div>
                                    <div style=" width: 15%;  display: flex;justify-content:flex-end; text-align: right;">
                                        <div style="width: 40%; font-size: 20px;padding-top: 10px; ">
                                            <form action="{{ route('examschedule.boarddownload') }}" method="POST">
                                                @csrf

                                                <input type="text" name="filename" style="display: none"
                                                    value="{{ $data->filename }}">
                                                <input type="text" name="semester" style="display: none"
                                                    value="{{ $data->semester }}">
                                                <button class="fas fa-download" type="submit"
                                                    style="border: none;outline: none;background-color: transparent;"></button>
                                            </form>

                                        </div>
                                        @if (auth()->user()->status != 'user')
                                            <div style="width: 40%; font-size: 20px;padding-top: 10px;">
                                                <form action="{{ route('examschedule.boarddeletedata') }}" method="POST">
                                                    @csrf
                                                    <input type="text" name="id" value="{{ $data->id }}"
                                                        style="display: none">
                                                    <button class="fas fa-trash-alt"
                                                        style="border: none;outline: none;background-color: transparent;"></button>
                                                </form>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endif

                    @endforeach
                @endif
            </div>
        </div>
        @if (auth()->user()->status != 'user')
            <div class="footer-section">
                <div class="add-btn">
                    <a href="{{ route('examschedule.index') }}">
                        <button class="far fa-plus-square btn-add"></button>
                    </a>
                </div>
            </div>
        @endif
        <script>
            function uploadpage() {
                document.getElementById("formpage").style.display = "block";
            }

            function closefun() {
                document.getElementById("formpage").style.display = "none";

            }

            function display() {
                //  var name=document.getElementById("img");
                //  console.log(name);
                var fullPath = document.getElementById('img').value;
                if (fullPath) {
                    var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                    var filename = fullPath.substring(startIndex);
                    if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                        filename = filename.substring(1);
                    }
                    document.getElementById('file_name').value = filename
                }
            }
        </script>
    </body>

    </html>

@endsection
