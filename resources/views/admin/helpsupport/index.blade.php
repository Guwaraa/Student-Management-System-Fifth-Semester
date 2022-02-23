@extends('layout.admin.layout')
@section('content')
    <div style="display: flex">
        <div style="width: 40%">
            <div style="box-shadow: 2px 3px gainsboro; height:70%;">
                <label style="font-weight: bold;font-size: 20px;color: slategrey">For Support please contact us:</label>
                <br>
                <br>
                <p style="font-size: 16px;text-align: center;margin-top: 30px">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit error reiciendis perspiciatis officia officiis dignissimos, et eligendi! Recusandae quisquam, debitis nihil reiciendis commodi beatae totam, maxime doloribus quis, quaerat expedita.
                </p>
            </div>
            <div style="text-align: center;">
                <button type="button" class="btn btn-outline-secondary">Contact US</button>

            </div>
        </div>
        <div>
            <img src="{{ asset('image/helpsupport.png') }}" alt="">
        </div>
    </div>
@endsection
