@extends('layout.admin.layout')
@section('content')
    <!DOCTYPE html>
    <html>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <body>

        <div class="w3-container" style="margin-top: 70px">
            <div class="w3-card-4">
                <div class="w3-container" style="background-color: slategrey">
                    <h2>Change password</h2>
                </div>

                <form class="w3-container">
                    <p>
                        <input class="w3-input" type="text">
                        <label>Old password</label>
                    </p>
                    <p>
                        <input class="w3-input" type="text">
                        <label>New Password</label>
                    </p>
                    <div>
                        <button type="button" class="btn btn-secondary" style="margin-left: 40%;margin-top:10px">Change</button>
                    </div>
                    <div style="height: 2%">

                    </div>
                </form>
            </div>
        </div>

    </body>

    </html>
@endsection
