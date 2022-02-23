@extends('layout.admin.layout')
@section('content')
    <link href="{{ asset('css/location.css') }}" rel="stylesheet">
    <form action="{{ route('location.store') }}" method="POST">
        @csrf
        @foreach ($location as $data)
            <div class="container">
                <div class="flex-box">
                    <input type="text" name="id" value="{{ $data->id }}" style="display: none">
                    <div class="detail">
                        <label>College Name:</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" class="form-control" name="collegename" value="{{ $data->college_name }}">
                    </div>
                </div>
                <div class="flex-box">
                    <div class="detail">
                        <label>Location:</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" class="form-control"  name="location" value="{{ $data->location }}">
                    </div>
                </div>
                <div class="flex-box">
                    <div class="detail">
                        <label>Map Source:</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" class="form-control" name="source" oninput="display()" id="mapsrc"
                            value="{{ $data->map_source }}">
                    </div>
                    <div onclick="display()">
                        <a  class="fas fa-map-marked-alt" style="text-decoration: none;font-size: 30px; color: black"></a>
                    </div>
                </div>
            </div>
        @endforeach

        <div>
            <button type="submit">Upload</button>
        </div>
    </form>
    <br>
    <hr>
    <div class="map-container">
        <div id="map-source" class="mapsource">

        </div>
    </div>




@endsection
@section('page-specific-script')
    <script>
        function display() {
            var data = document.getElementById('mapsrc').value;
            document.getElementById('map-source').innerHTML = "";
            document.getElementById('map-source').innerHTML = data;
        }
    </script>
@endsection
