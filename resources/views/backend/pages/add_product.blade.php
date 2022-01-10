@extends('backend.layouts.backmaster')

@section('page-title') Add Product @endsection

@section('content')

			<div class="content mt-3">
            <div class="animated fadeIn">
             <div class="row">

					<div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">

                            <strong>Add Product</strong></div>

                            <div class="card-body card-block">


                            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                            @csrf

                             <div class="form-group">
                             <label for="name" class=" form-control-label">Name</label>
                             <input type="text" id="name" placeholder="Enter your product name" class="form-control" name="name" value="{{old('name')}}">

                             @error('name') <span class="text-danger">{{$message}}</span> @enderror

                         	</div>

                         	

                            <div class="form-group">
                            <label for="type" class=" form-control-label">Category Type</label>
                            <input type="text" id="type" placeholder="Enter the Type" class="form-control" name="type" value="{{old('type')}}">

                            @error('type') <span class="text-danger">{{$message}}</span> @enderror

                        	</div>

                            <div class="form-group">
                            <label for="brand" class=" form-control-label">Brand</label>
                            <input type="text" id="brand" placeholder="Enter the brand" class="form-control" name="brand" value="{{old('brand')}}">

                            @error('brand') <span class="text-danger">{{$message}}</span> @enderror

                        	</div>

                     

                        	<div class="form-group">
                            <label for="price" class=" form-control-label">Price</label>
                            <input type="text" id="price" placeholder="Enter price" class="form-control" name="price" value="{{old('price')}}">

                            @error('price') <span class="text-danger">{{$message}}</span> @enderror

                        	</div>

                        	

                        	<div class="form-group">

 							<label for="photo" class=" form-control-label">Product Image</label>
 							
 							<input type="file" name="photo[]" class="form-control" multiple="true">

 							@error('photo') <span class="text-danger">{{$message}}</span> @enderror	

 							@if($errors->has('photo.*'))

 							<span class="text-danger">{{$errors->first('photo.*')}}</span>
                        
            				@endif

 							</div>                       		
                            
                            <input type="submit" value="Add Product" class="btn btn-success rounded">


                        	</form>
                             </div>
                             </div>
                             </div>


                                        </div>
                                    </div>
                                </div>


@endsection