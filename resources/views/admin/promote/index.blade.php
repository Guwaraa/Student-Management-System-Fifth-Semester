@extends('layout.admin.layout')
@section('content')
    <style>
        .announcement-container {
            width: 70%;
            height: 70%;
            margin: auto;
            box-shadow: 4px 5px silver;
        }

        .label {
            font-size: 30px;
        }

    </style>
    <form action="{{ route('promote.store') }}" method="POST">
        @csrf
        <div class="announcement-container">
            <div style="height: 20%; text-align: center">
                <label class="label">Promote Student <i class="fas fa-level-up-alt"></i></label>
            </div>
            <hr>
            <div style="height: 50%; border: 3px dotted silver">
                <div style="display: flex; justify-content: space-evenly;margin-top: 80px;">
                    <div>
                        <select class="form-select" aria-label="Default select example" name="semester">
                            <option hidden>Choose semester</option>
                            <option value="First_sem">First Semester</option>
                            <option value="Second_sem">Second Semester</option>
                            <option value="Fourth_sem">Fourth Semester</option>
                            <option value="Fifth_sem">Fifth Semester</option>
                            <option value="Sixth_sem">Sixth Semester</option>
                            <option value="Seventh_sem">Seventh Semester</option>
                            <option value="Eight_sem">Eight Semester</option>

                        </select>
                    </div>
                    <div>
                        <i class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i> Promote To <i
                            class="fas fa-angle-double-right"></i><i class="fas fa-angle-double-right"></i>
                    </div>
                    <div>
                        <select class="form-select" aria-label="Default select example" name="changesemester">
                            <option hidden>Choose semester</option>
                            <option value="First_sem">First Semester</option>
                            <option value="Second_sem">Second Semester</option>
                            <option value="Fourth_sem">Fourth Semester</option>
                            <option value="Fifth_sem">Fifth Semester</option>
                            <option value="Sixth_sem">Sixth Semester</option>
                            <option value="Seventh_sem">Seventh Semester</option>
                            <option value="Eight_sem">Eight Semester</option>
                            <option value="Passout">Passout</option>

                        </select>
                    </div>
                </div>
            </div>
            <div style="text-align: center;padding-top: 10px;">
                <Button type="submit"
                    style="width: 20%; height: 15%; outline: none;border: none;background-color: slategrey;color: white;font-size: 25px;"
                    class="btn">Post</Button>
            </div>
        </div>
    </form>
@endsection
