@extends('layout.admin.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/setting.css') }}">
    <div class="container">
        <div class="semester-btn">
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
        </div>
        <hr>
        <div class="main-container">
            <table>
                <tr>
                    <th>Student Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Contact Number</th>
                    <th>Registration Number</th>
                    <th>Parent Name</th>
                    <th>Contact Number</th>
                </tr>
                @foreach ($studentdetails as $details)
                    <form method="POST" action="{{ route('setting.deletedata') }}">
                        @csrf
                        <tr>
                            <input type="text" value="{{ $details->id }}" name="id" style="display: none;">
                            <td>{{ $details->Std_Id }}</td>
                            <td>{{ $details->first_name }} {{ $details->last_name }}</td>
                            <td>{{ $details->email }}</td>
                            <td>{{ $details->address }}</td>
                            <td>{{ $details->contact_number }}</td>
                            <td>{{ $details->registration_no }}</td>
                            <td>{{ $details->parent_fname }} {{ $details->parent_lname }}</td>
                            <td>{{ $details->parent_contact }}</td>
                            <td> <a href="{{ route('setting.editdata', $details['id']) }}" class="fas fa-pen btn-option"></a>
                            </td>
                            <td><button class="fas fa-trash-alt btn-option" type="submit"> </button></td>
                        </tr>
                    </form>
                @endforeach
            </table>
        </div>
        <hr>
        {{-- /////////////////////////////////////////////////////////////////////////////// --}}

        <div class="floating-pannel" id="addpanel">
            <div class="float-header">
                <div class="title-label">
                    <label> Add Student Detail</label>
                </div>
                <div class="cross-pannel">
                    <button onclick="closepanel()"><i class="far fa-times-circle"></i></button>
                </div>
            </div>
            <form method="POST" action="{{ route('setting.updatedetail') }}">
                @csrf
                <div class="float-contain" style="margin-top: -10px">
                    <div class="flex-contain" style="height:10vh">
                        <div class="name-label" style="width:28%;">
                            <label>Student ID:</label>
                        </div>
                        <div class="textbox-name">
                            <input type="text" class="form-control " style="width: 70%;" name="Stdid" value="{{ $data->Std_Id  }}">
                            <input type="text" value="{{ $data->id }}" style="display: none" name="id">
                        </div>
                        <div class="name-label" style="width:17%;">
                            <label>Semester:</label>
                        </div>
                        <div class="textbox-name">
                            <select class="form-select" aria-label="Default select example" name="semester">
                                <option selected>{{ $data->Semester }}</option>
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
                    <div class="flex-contain" style="margin-top: -10px">
                        <div class="name-label" style="width: 30%; ">
                            <label>First Name:</label>
                        </div>
                        <div class="textbox-name">
                            <input type="text" class="form-control " style="width: 70%;" name="fname" value="{{ $data->first_name }}">
                        </div>
                        <div class="name-label" style="width: 30%; ">
                            <label>Last Name:</label>
                        </div>
                        <div class="textbox-name">
                            <input type="text" class="form-control " style="width: 70%;" name="lname" value="{{ $data->last_name }}">
                        </div>
                    </div>
                    <div class="course-contain">
                        <div class="flex-contain">
                            <div>
                                <label class="label-subject">Registration Number:</label>
                            </div>
                            <div class="div-subject">
                                <input type="text" class="form-control " style="width: 70%;" name="registrationnumber" value="{{ $data->registration_no }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-contain">
                    <button type="submit">Update</button>
                </div>
            </form>
        </div>
        {{-- //////////////////////////////////////////////////////////////////////// --}}

        <div class="footer-section">
            <div class="add-btn">
                <button class="far fa-plus-square btn-add" onclick="openpanel()"></button>
            </div>
        </div>
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
