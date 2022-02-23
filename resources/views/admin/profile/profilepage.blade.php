@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="{{ asset('css/profilestyle.css') }}">
        <style>
            .record-panel {
                box-shadow: 5px 3px white;
                padding: 10px;
            }

            .box-flex {
                display: flex;
                justify-content: space-between;
            }

            HTML CSSResult Skip Results Iframe EDIT ON .custom-file-input {
                color: transparent;
            }

            .custom-file-input::-webkit-file-upload-button {
                visibility: hidden;
            }

            .custom-file-input::before {
                content: 'Upload';
                color: black;
                display: inline-block;
                background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
                border: 1px solid #999;
                border-radius: 3px;
                padding: 5px 8px;
                outline: none;
                white-space: nowrap;
                -webkit-user-select: none;
                cursor: pointer;
                text-shadow: 1px 1px #fff;
                font-weight: 700;
                font-size: 10pt;
            }

            .custom-file-input:hover::before {
                border-color: black;
            }

            .custom-file-input:active {
                outline: 0;
            }

            .custom-file-input:active::before {
                background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
            }

            .upload-button {
                width: 100%;
                height: 100%;
                text-align: center;
                padding: 15px;
                font-size: 20px;
                font-weight: bold;
                background-color: slategray;
                color: white;
                cursor: pointer;
            }

            .upload-button:hover {
                background-color: steelblue;
            }

        </style>
    </head>

    <body>
        @foreach ($studentdetail as $detail)
            @if (auth()->user()->Std_Id == $detail->Std_Id)
                <form action="{{ route('Profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" value="{{ $detail->id }}" name="id" style="display: none">
                    <div class="container">
                        <div class="photo-container">
                            <div class="image-box">
                                <img src="{{ asset('profileimage/'.$detail->profile_image) }}" alt="profile"
                                    class="image-responsive image-curve" id="image-file">
                            </div>
                            <div class="button-upload">
                                <input type="file" name="uploadfile" id="img" style="display:none;"
                                    accept=".png, .jpg, .jpeg" onchange="showImage()" />
                                <label for="img" class="upload-button fas fa-file-upload"> Upload</label>
                            </div>
                        </div>
                        <div class="form-container record-panel">
                            <div class="form-floating md-4">
                                <input class="form-control" id="Stdid" type="text" placeholder="Student Id"
                                    style="margin-left: 25px; width:20%; " value="{{ $detail->Std_Id }}" readonly />
                                <label for="inputId" style="margin-left: 30px;" class="textlabel-up">Student ID</label>
                            </div>
                            <br>
                            <div class="box-flex">
                                <div class="form-floating md-4">
                                    <input class="form-control" id="fname" type="text" placeholder="First Name"
                                        style="margin-left: 25px; width:90%;" value="{{ $detail->first_name }}" name="first_name" />
                                    <label for="inputfname" style="margin-left: 30px;" class="textlabel-up">First
                                        Name</label>
                                </div>
                                <br>
                                <div class="form-floating md-4">
                                    <input class="form-control" id="fname" type="text" placeholder="Last Name"
                                        style="margin-left: 25px; width:80%;" value="{{ $detail->last_name }}" name="last_name" />
                                    <label for="inputfname" style="margin-left: 30px;" class="textlabel-up">Last
                                        Name</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-floating mb-4 ">
                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com"
                                    style="margin-left: 25px; width:90%;" value="{{ $detail->email }}" name="email"/>
                                <label for="inputEmail" style="margin-left: 30px;" class="textlabel-up">Email
                                    address</label>
                            </div>
                            <div class="form-floating mb-4 ">
                                <input class="form-control" id="inputaddress" type="text" placeholder="Address"
                                    style="margin-left: 25px; width:90%;" value="{{ $detail->address }}"name="address" />
                                <label for="inputaddress" style="margin-left: 30px;" class="textlabel-up">Address</label>
                            </div>
                            <div class="form-floating mb-4 ">
                                <input class="form-control" id="inputregistration" type="text" placeholder="Contact No"
                                    style="margin-left: 25px; width:90%;" value="{{ $detail->contact_number }}" name="contact_number"/>
                                <label for="inputregistration" style="margin-left: 30px;" class="textlabel-up">Contact
                                    Number</label>
                            </div>
                            <div class="form-floating mb-4 ">
                                <input class="form-control" id="inputsemester" type="text" placeholder="Semster"
                                    style="margin-left: 25px; width:40%;" value="{{ $detail->Semester }}" readonly />
                                <label for="inputsemester" style="margin-left: 30px;"
                                    class="textlabel-up">Semester</label>
                            </div>
                            <div class="form-floating mb-4 ">
                                <input class="form-control" id="inputregistration" type="text"
                                    placeholder="Registration No" style="margin-left: 25px; width:90%;"
                                    value="{{ $detail->registration_no }}" name="registration_no"/>
                                <label for="inputregistration" style="margin-left: 30px;"
                                    class="textlabel-up">Registration
                                    No</label>
                            </div>
                            <div class="box-flex">
                                <div class="form-floating md-4">
                                    <input class="form-control" id="fname" type="text" placeholder="First Name"
                                        style="margin-left: 25px; width:90%;" value="{{ $detail->parent_fname }} " name="parent_fname"/>
                                    <label for="inputfname" style="margin-left: 30px;" class="textlabel-up">Parent's First
                                        Name</label>
                                </div>
                                <br>
                                <div class="form-floating md-4">
                                    <input class="form-control" id="fname" type="text" placeholder="Last Name"
                                        style="margin-left: 25px; width:80%;" value="{{ $detail->parent_lname }}" name="parent_lname"/>
                                    <label for="inputfname" style="margin-left: 30px;" class="textlabel-up">Last
                                        Name</label>
                                </div>
                            </div>
                            <br>
                            <div class="form-floating mb-4 ">
                                <input class="form-control" id="inputregistration" type="text" placeholder="Contact No"
                                    style="margin-left: 25px; width:90%;" value="{{ $detail->parent_contact }}" name="parent_contact" />
                                <label for="inputregistration" style="margin-left: 30px;" class="textlabel-up">Contact
                                    Number</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit">Save</button>
                    </div>
                </form>
            @endif
        @endforeach
        <script>
            function showImage() {
            var fr = new FileReader();
            fr.onload = function(e) {
                target.src = this.result;
            };
            src.addEventListener("change", function() {
                fr.readAsDataURL(src.files[0]);
            });
        }
        var src = document.getElementById("img");
        var target = document.getElementById("image-file");
        showImage(src, target);
        </script>

    </body>

    </html>
@endsection
