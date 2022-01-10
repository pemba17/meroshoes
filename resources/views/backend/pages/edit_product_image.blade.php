@extends('backend.layouts.backmaster')

@section('page-title') Edit Product Image @endsection

@section('content')


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">


                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3">Product Image</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="mx-auto d-block" src="{{ asset("storage/productimages/$photo->photo") }}" alt="Card image cap" style="height: 500px; width: 400px;">
                                    <h5 class="text-sm-center mt-2 mb-1">{{$photo->product->name}}</h5>
                                    
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                  
                                  <form method="POST" action="{{ route('photos.update',[$photo->id]) }}" enctype="multipart/form-data">

                                  @csrf  

                                  @method('PUT')

                                  <div class="form-group">

                                   <label class="form-control-label font-weight-bold">Select Image</label> 
                                     
                                   <input type="file" name="photo" class="form-control"> 

                                   @error('photo') <span class="text-danger">{{$message}}</span> 


                                   @enderror  

                                  </div>

                                   <input type="submit" value="Change" class="btn btn-success"> 

                                   <a href="{{ route('photos.index') }}" class="btn btn-danger">Cancel</a>

                                </form>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

@endsection