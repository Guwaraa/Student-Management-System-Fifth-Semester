@extends('layout.admin.layout')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/setting.css') }}">
    <div class="container">
        {{-- <div class="semester-btn">
            <div class="first">
                <button>First</button>
            </div>
            <div class="Second">
                <button>Second</button>
            </div>
            <div class="Third">
                <button>Third</button>
            </div>
            <div class="fourth">
                <button>Fourth</button>
            </div>
            <div class="fifth">
                <button>Fifth</button>
            </div>
            <div class="sixth">
                <button>Sixth</button>
            </div>
            <div class="seventh">
                <button>Seventh</button>
            </div>
            <div class="eight">
                <button>Eight</button>
            </div>
        </div> --}}
        <hr>
        <div class="main-container">
            <table>
                <tr>
                    <th>Subject Code</th>
                    <th>Subject Name</th>
                    <th>Profile</th>
                    <th>Subject Teacher</th>
                </tr>
                @foreach ($studentdetails as $details)
                    <form method="POST" action="{{ route('setting.delete') }}">
                        @csrf

                        <tr>

                            <td style="display: none"><input type="text" name="subjectid" value="{{ $details['id'] }}">
                            </td>
                            <td>{{ $details->Subject_Code }}</td>

                            <td>{{ $details['Subject_Name'] }}</td>
                            <td class="profile-table"><img src="{{ asset('image/' . $details->Teacher_profile) }}"
                                    alt="Profile pic" class="image-responsive"></td>
                            <td>{{ $details['Subject_teacher'] }}</td>
                            @if (auth()->user()->status != 'user')

                                <td> <a href="{{ route('Setting.edit', $details['id']) }}"
                                        class="fas fa-pen btn-option"></a>
                                </td>
                                <td><button class="fas fa-trash-alt btn-option" type="submit"> </button></td>
                            @endif
                        </tr>
                    </form>

                @endforeach


            </table>
        </div>
        <hr>

        {{-- /////////////////////////////////////////////////////////////////////////////// --}}
        <div class="floating-pannel" id="addpanel" style="display: none">
            <div class="float-header">
                <div class="title-label">
                    <label>Add Course Detail</label>
                </div>
                <div class="cross-pannel">
                    <button onclick="closepanel()"><i class="far fa-times-circle"></i></button>
                </div>
            </div>
            <form method="POST" action="{{ route('Setting.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="float-contain">
                    <div class="flex-contain">
                        <div class="name-label">
                            <label>Teacher's Name:</label>
                        </div>
                        <div class="textbox-name">
                            <input type="text" class="form-control " style="width: 70%;" name="teachername">
                        </div>

                        <div class="profile-image">

                            <input type="file" name="imagefile" id="img" accept=".png, .jpg, .jpeg" style="display: none"
                                onchange="showImage()" />
                            <label for="img" style="width:100%;height: 100%"><img
                                    src="{{ asset('assets/img/avatars/adduser.png') }}" alt="Profile pic"
                                    class="image-responsive-image" id="image-file"></label>
                            <input type="text" name="image" id="image" style="display: none">
                        </div>
                    </div>
                    <div class="course-contain">
                        <div class="flex-contain">
                            <div style="width:20%;">
                                <label class="label-subject">Subject Code:</label>
                            </div>
                            <div class="div-subject">
                                <input type="text" class="form-control " style="width: 70%;" name="subjectcode">
                            </div>
                            <div>
                                <select name="semseter" class="form-select">
                                    <option>Select Semester</option>
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
                        </div>
                    </div>
                    <div class="course-contain">
                        <div class="flex-contain">
                            <div>
                                <label class="label-subject">Subject Name:</label>
                            </div>
                            <div class="div-subject">
                                <input type="text" class="form-control " style="width: 70%;" name="subjectname">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-contain">
                    <button type="submit">Save</button>
                </div>
            </form>
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}
        @if (auth()->user()->status != 'user')

            <div class="footer-section">
                <div class="add-btn">
                    <button class="far fa-plus-square btn-add" onclick="openpanel()"></button>
                </div>
            </div>
        @endif
    </div>
    <script>
        function closepanel() {
            document.getElementById("addpanel").style.display = "none";
        }

        function openpanel() {
            document.getElementById("addpanel").style.display = "block";
        }

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
@endsection
