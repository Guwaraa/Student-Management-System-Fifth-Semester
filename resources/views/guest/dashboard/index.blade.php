@extends('layout.guest.layout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link href="{{ asset('css/mainpage.css') }}" rel="stylesheet" />
    </head>
    {{-- <body style="width:92%; margin: 0 auto;"> --}}

    <body>
        @foreach ($profile as $details)
            @if ($details->semester == 'public')

                <div class="container">
                    <div class="form-control notice-box">
                        <div class="flex-box">
                            <div class="image">
                                <img src="{{ asset('profileimage/' . $details->image) }}" alt="profilepic"
                                    class="image-responsive" />
                            </div>

                            <div class="text-label">
                                <label>{{ $details->name }}</label><br>
                                @if ($details->semester == 'public')
                                    <i class="fas fa-globe-americas"></i> {{ $details->semester }}
                                @else
                                    <i class="fas fa-lock"></i> {{ $details->semester }}

                                @endif
                                <div class="user-content">
                                    <div style="font-size: 20px;font-weight: bold;">
                                        {{ $details->title }}
                                    </div>
                                    <hr>
                                    <div style="font-size: 16px;">
                                        {{ $details->notice }}
                                    </div>
                                </div>
                            </div>
                            <div style="font-size: 14px;font-weight: bold;">
                                {{ $details->created_at }}
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach
    </body>

    </html>
@endsection
