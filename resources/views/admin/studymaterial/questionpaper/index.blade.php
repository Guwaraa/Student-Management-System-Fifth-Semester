@extends('layout.admin.layout')
@section('content')
<link href="{{ asset('css/studymaterial.css') }}" rel="stylesheet">
<form method="POST" action="{{ route('Questionpaper.store') }}">
    @csrf
    <div class="container-note">
        <div class="firstrow">
            <div class="firstbtn">
                <button class="far fa-folder-open" type="submit"  name="semester" value="First_sem"> First Semester</button>
            </div>
            <div class="secondbtn">
                <button class="far fa-folder-open" type="submit"  name="semester" value="Second_sem"> Second Semester</button>
            </div>
            <div class="thirdbtn">
                <button class="far fa-folder-open"type="submit"  name="semester" value="Third_sem"> Third Semester</button>
            </div>
            <div class="fourthbtn">
                <button class="far fa-folder-open"type="submit"  name="semester" value="Fourth_sem"> Fourth Semester</button>
            </div>
        </div>
        <div class="secondrow">
            <div class="fifthbtn">
                <button class="far fa-folder-open"type="submit"  name="semester" value="Fifth_sem"> Fifth Semester</button>
            </div>
            <div class="sixthbtn">
                <button class="far fa-folder-open"type="submit"  name="semester" value="Sixth_sem"> Sixth Semester</button>
            </div>
            <div class="seventhbtn">
                <button class="far fa-folder-open"type="submit"  name="semester" value="Seventh_sem"> Seventh Semester</button>
            </div>
            <div class="eightbtn">
                <button class="far fa-folder-open"type="submit"  name="semester" value="Eight_sem"> Eight Semester</button>
            </div>
        </div>
    </div>
</form>
@endsection
