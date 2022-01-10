@extends('layouts.authmaster')

@section('content')

  <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="py-5 text-center">
                            <a href="https://tripkhata.com"><img class="d-block mx-auto mb-4 img-fluid" src="https://tripkhata.com/images/logo.svg" alt="logo" width="400" ></a>
                        </div>

                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror " placeholder="Email" id="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>


                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password"  autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>

                                    <label class="pull-right">
                                <a href="{{ route('password.request') }}">Forgotten Password?</a>
                            </label>


                                </div>
                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                                <div class="social-login-content">
                                    <div class="social-button">

                                        <button type="button" class="btn social facebook btn-flat btn-addon mb-3" onclick="window.location='{{ url("login/facebook") }}'"><i class="ti-facebook"></i>Sign in with facebook</button>

                                        <button type="button" class="btn social twitter btn-flat btn-addon mt-2" onclick="window.location='{{ url("login/google") }}'"><i class="ti-google"></i>Sign in with gmail</button>

                                        
                                    </div>
                                </div>
                                <div class="register-link m-t-15 text-center">
                                    <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                                </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
