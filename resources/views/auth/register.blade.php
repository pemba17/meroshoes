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
                    <form method="POST" action="{{ route('register') }}">
                        <div class="py-5 text-center">
                            <a href="https://tripkhata.com"><img class="d-block mx-auto mb-4 img-fluid" src="https://tripkhata.com/images/logo.svg" alt="logo" width="400" ></a>
                        
                        </div>
                        
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name" name="name" value="{{ old('name') }}">

                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror   

                        </div>

                         <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" id="address" name="address" value="{{ old('address') }}">

                            @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror   

                        </div>

                         <div class="form-group">
                            <label>Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" placeholder="Contact" id="contact" name="contact" value="{{ old('contact') }}">

                            @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror   

                        </div>

                        <div class="row form-group">
                        <div class="col col-md-12"><label for="select" class=" form-control-label">User Type</label></div>

                        <div class="col-12 col-md-12">

                        <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                        <option value="">Select...</option>

                         <option value="customer"  {{ old('role') == 'customer' ? 'selected' : '' }}>
                          
                         Customer  

                        </option>


                         <option value="seller"  {{ old('role') == 'seller' ? 'selected' : '' }}>
                          
                         Seller

                        </option>

                        </select>

                        @error('role')

                         <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                         @enderror           

                        </div>
                        </div>

                            <div class="form-group">
                                <label>Email address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}">

                                 @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Password" id="password-confirm" name="password_confirmation">
                        </div>


                                    <div class="checkbox">
                                        <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                                    
                                    <div class="register-link m-t-15 text-center">
                                        <p>Already have account ? <a href="#"> Sign in</a></p>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection