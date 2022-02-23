@extends('auth.layout.layout')
@section('content')
<main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Login</h3>
                    </div>
                    <div class="card-body">
                        <form  action="{{ route('login_user') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputEmail" type="text" placeholder="name@example.com"  name="id"/>
                                <label for="inputEmail">Student ID</label>
                                <span class="text-danger">{{$errors->first('id')}}</span>

                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password"/>
                                <label for="inputPassword">Password</label>
                                <span class="text-danger">{{$errors->first('password')}}</span>

                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="{{ route('forgetpassword') }}">Forgot Password?</a>
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>
                        </form>


                    </div>
                    <div class="card-footer text-center py-3">
                        <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
