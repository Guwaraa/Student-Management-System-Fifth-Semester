@extends('auth.layout.layout')
@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Create Account</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('register_user') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputFirstName" type="text"
                                                placeholder="Enter your first name" name="first_name"
                                                value="{{ old('first_name') }}" />
                                            <label for="inputFirstName">First name</label>
                                            <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input class="form-control" id="inputLastName" type="text"
                                                placeholder="Enter your last name" name="last_name"
                                                value="{{ old('last_name') }}" />
                                            <label for="inputLastName">Last name</label>
                                            <span class="text-danger">{{ $errors->first('last_name') }}</span>

                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="id" type="text" placeholder="Student ID" name="id"
                                        value="{{ old('id') }}" />
                                    <label for="ID">Student ID</label>
                                    <span class="text-danger">{{ $errors->first('id') }}</span>

                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" id="inputEmail" type="email"
                                        placeholder="name@example.com" name="email" value="{{ old('email') }}" />
                                    <label for="inputEmail">Email address</label>
                                    <span class="text-danger">{{ $errors->first('email') }}</span>

                                </div>
                                <div>
                                    <select class="form-select" style="width: 30%" name="semester">
                                        <option selected>Semester</option>
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
                                <br>
                                <div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPassword" type="password"
                                                    placeholder="Create a password" name="password" />
                                                <label for="inputPassword">Password</label>
                                                <span class="text-danger">{{ $errors->first('password') }}</span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputPasswordConfirm" type="password"
                                                    placeholder="Confirm password" name="password-confirmation" />
                                                <label for="inputPasswordConfirm">Confirm Password</label>
                                                <span
                                                    class="text-danger">{{ $errors->first('password-confirmation') }}</span>
                                            </div>

                                        </div>

                                    </div>
                                    @if (session('msg'))
                                        <div class="row">
                                            <div class="col">
                                                <span class="alert alert-success">{{ session('msg') }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button class="btn btn-primary btn-block" type="submit">Create Account</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="card-footer text-center py-3">
                            <div class="small"><a href="{{ route('login') }}">Have an account? Go to
                                    login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
