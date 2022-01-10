@extends('backend.layouts.backmaster')

@section('page-title') Update User Profile @endsection

@section('content')

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">

                           <div class="{{session()->get('color')}}">{{session()->get('messages')}}</div>

                        <div class="card">
                            <div class="card-header">
                                <strong>User Profile</strong>
                            </div>
                            <div class="card-body card-block">

                                <form action="{{ route('users.update',[$userDetails->id]) }}" method="POST" enctype="multipart/form-data">

                                @csrf
                                
                                @method('PUT')    

                                <div class="form-group">

                                 @if($userDetails->avatar && $userDetails->social=="")   

                                 <img src="{{ asset("storage/userimages/$userDetails->avatar") }}" alt="hello" class="rounded mx-auto d-block" height="200px" width="200px">

                                 @elseif($userDetails->avatar && $userDetails->social)   

                                 <img src="{{$userDetails->avatar }}" alt="hello" class="rounded mx-auto d-block" height="200px" width="200px">

                                 @else

                                <img src="{{ asset('storage/default.jpg') }}" alt="hello" class="rounded mx-auto d-block" height="200px" width="200px">

                                @endif


                                    
                                </div>

                                <div class="form-group">
                                    <label class=" form-control-label">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                        <input class="form-control" name="name" value="{{$userDetails->name}}">
                                    </div>

                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                    
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Address</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-address-card"></i></div>
                                        <input class="form-control" name="address" value="{{$userDetails->address}}">
                                    </div>

                                    @error('address') <span class="text-danger">{{$message}}</span> @enderror
                                        
                                </div>
                                <div class="form-group">
                                    <label class=" form-control-label">Contact Number</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                        <input class="form-control" name="contact" value="{{$userDetails->contact}}">
                                    </div>

                                    @error('contact')<span class="text-danger">{{$message}}</span> @enderror
                                    
                                </div>

                                 @if($userDetails->social=="") 

                                <div class="form-group">

                                <label class="form-control-label">User Avatar</label>   

                                 <input type="file" name="avatar" class="form-control">

                                   @error('avatar')<span class="text-danger">{{$message}}</span> @enderror   
                                    
                                </div>

                                @endif



                                <input type="submit" value="Submit" class="btn btn-success">

                            </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

  @endsection      
