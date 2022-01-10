@extends('layouts.authmaster')

@section('content')

<div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('storage/backimages/images/logo.png') }}" alt="">
                    </a>
                </div>

                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif


                <div class="login-form">
                    <form method="POST" action="{{ route('password.email') }}">

                        @csrf

                        <div class="form-group">
                            <label>Email address</label>
                            

                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>


                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                        </div>
                            <button type="submit" class="btn btn-primary btn-flat m-b-15"> {{ __('Send Password Reset Link') }}</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

 @endsection   