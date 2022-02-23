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

        </style>
        <link href="{{ asset('css/examresult.css') }}" rel="stylesheet">
    </head>

    <body>

        <div class="header">
            <div>
                <label class="label">Select Semester:</label>
            </div>
            <form action="{{ route('Note.display') }}" method="POST">
                @csrf
                <input type="text" name="semester" value="{{ $semester }}" style="display: none">
                <div style="display: flex; justify-content: space-evenly">
                    <div>
                        <select class="select form-select" name="subjectname">
                            <option hidden>{{ $subjectname }}</option>
                            @foreach ($subjectdetails as $detail)
                                <option value="{{ $detail[$semester] }}">{{ $detail[$semester] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="fas fa-search"
                            style="font-size: 25px; background-color: transparent; border: none; outline:none"></button>
                    </div>
                </div>
            </form>

        </div>
        @if (auth()->user()->status != 'user')

            <div style="margin-left:190px" class="buttonclass">
                <a class="sem fas fa-file-upload" style="float:right; margin-top:-5%" onclick="uploadpage()">Upload</a>
            </div>
        @endif
        <div class="container">
            <div class="floating-form" id="formpage">
                <div class="title">
                    <div class="post-result">
                        Upload Note Folder
                    </div>
                    <div class="close-button">
                        <button class="far fa-times-circle btn-close" onclick="closefun()"></button>
                    </div>

                </div>
                <form method="post" action="{{ route('Note.save') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="semester" value="{{ $semester }}" style="display: none">
                    <div class="title-result">
                        <div class="title-label">
                            <label>Subject:</label>
                        </div>
                        <div class="title-textbox">
                            <select class="form-select" aria-label="Default select example"
                                style="font-size: 15px; color: black;" name="subjectname">
                                <option selected></option>
                                @foreach ($subjectdetails as $subjectdetail)
                                    <option value="{{ $subjectdetail[$semester] }}">{{ $subjectdetail[$semester] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="title-result">
                        <div class="title-label">
                            <label>Title:</label>
                        </div>
                        <div class="title-textbox">
                            <input type="text" class="form-control input-box" name="title" autocomplete="off">
                        </div>
                    </div>
                    <div class="remarks-result">
                        <div class="remarks-label">
                            <label>Remarks:</label>
                        </div>
                        <div class="remarks-textbox">
                            <input type="text" class="form-control input-box" name="remarks" autocomplete="off">
                        </div>
                    </div>
                    <div class="flex-field" style="height:10vh">
                        <div class="result-data">
                            <input id="file_name" type="text" class="form-control input-box" disabled>
                        </div>
                        <div class="button-upload" style="margin-top:5px">
                            <input id="user_documents" type="file" name="filenames[]" style="display: none"
                                class="form-control" placeholder="User Documents" onchange="display()" multiple />

                            <label for="user_documents" class="upload-button fas fa-file-upload"></label>
                        </div>
                    </div>
                    <div class="flex-box">

                        <div class="button-save" style="margin-top: 0px">
                            <button class="btn-save">Save</button>
                        </div>
                    </div>
                </form>

            </div>
            <div>

                @if ($subjectname != null)
                    @foreach ($notematerial as $data)
                        @if ($data->subjectname == $subjectname)
                            <div style="display: flex; justify-content: space-evenly; width:100%; height:10%; padding: 5px;color:black"
                                class="file" onmouseover="displayoption()">
                                <div style="width: 5%;font-size: 30px; padding: 4px;">
                                    <i class="far fa-file"></i>
                                </div>
                                <div style=" width: 75%; display: flex;font-size: 16px;">
                                    <div style="width: 70%;padding: 4px;font-size: 20px;">
                                        <a href="{{ route('Note.edit', [$data->id]) }} " target="_blank"
                                            class="show">
                                            <div>
                                                {{ $data->filenames }}
                                            </div>
                                        </a>
                                    </div>
                                    <div style="text-align: center; width:30%;">
                                        Modified at: {{ $data->updated_at }}
                                    </div>
                                </div>
                                <div style=" width: 15%;  display: flex;justify-content:flex-end; text-align: right;">
                                    <div style="width: 40%; font-size: 20px;padding-top: 10px; " class="option"
                                        id="option">
                                        <form action="{{ route('Note.download') }}" method="POST">
                                            @csrf


                                            <input type="text" name="filename" style="display: none"
                                                value="{{ $data->filenames }}">
                                            <input type="text" name="subjectname" style="display: none"
                                                value="{{ $data->subjectname }}">
                                            <button class="fas fa-download" type="submit"></button>
                                        </form>

                                    </div>
                                    @if (auth()->user()->status != 'user')

                                        <div style="width: 40%; font-size: 20px;padding-top: 10px;" class="option"
                                            id="option">
                                            <form action="{{ route('Note.deletedata') }}" method="POST">
                                                @csrf
                                                <input type="text" name="id" value="{{ $data->id }}"
                                                    style="display: none">
                                                <button class="fas fa-trash-alt"></button>
                                            </form>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                    @endforeach
                @endif
            </div>
        </div>
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
                var fullPath = document.getElementById('user_documents').value;
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
