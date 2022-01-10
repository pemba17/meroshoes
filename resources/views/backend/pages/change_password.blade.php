@extends('backend.layouts.backmaster')

@section('page-title') Change Password @endsection

@section('content')

			<div class="content mt-3">
            <div class="animated fadeIn">
             <div class="row">

					<div class="col-lg-12">
                        <div class="card">

                           @if(session('error'))

                           <div class="alert alert-danger">

                            {{session()->get('error')}}

                           </div>

                           @endif

                           @if(session('success'))

                           <div class="alert alert-success">

                            {{session()->get('success')}}

                           </div>

                           @endif

                            <div class="card-header">

                            <strong>Change Password</strong></div>

                            <div class="card-body card-block">


                            <form method="POST" action="{{ route('userpassword.update',[$users->id]) }}">

                            @csrf

                            @method('PUT')

                             <div class="form-group">
                             <label for="name" class=" form-control-label">Current Password</label>
                             <input type="password" id="current_pass" class="form-control" name="current_pass" >

                             @error('current_pass') <span class="text-danger">{{$message}}</span> @enderror

                         	</div>

                            <div class="form-group">
                            <label for="type" class=" form-control-label">New Password</label>
                            <input type="password" id="password" class="form-control" name="password">

                            @error('password') <span class="text-danger">{{$message}}</span> @enderror

                        	</div>

                            <div class="form-group">
                            <label for="brand" class=" form-control-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">


                        	</div>

                     
                            <input type="submit" value="Change Password" class="btn btn-success rounded">


                        	</form>
                             </div>
                             </div>
                             </div>


                                        </div>
                                    </div>
                                </div>


@endsection