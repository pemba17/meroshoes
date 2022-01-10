@extends('backend.layouts.backmaster')

@section('page-title') Add Product Image @endsection

@section('content')

        <div class="content mt-3">
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-xs-12 col-sm-12">

                           <div class="{{session()->get('color')}}">{{session()->get('messages')}}</div>

                        <div class="card">
                            <div class="card-header">
                                <strong>Add Product Images</strong>
                            </div>
                            <div class="card-body card-block">

                                <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">

                                @csrf   

                                 <div class="row form-group">
                                 <div class="col col-md-12"><label for="select" class=" form-control-label">Product Name</label></div>

                                <div class="col-12 col-md-12">

                                <select name="product_id" id="product_id" class="form-control">
                                <option value="">Select...</option>

                                @foreach($productDetails as $row)

                                <option value="{{$row->id}}" {{(old('product_id')==$row->id)? 'selected':''}}>{{$row->name}}</option>

                                @endforeach

                                </select>

                                @error('product_id')

                                <span class="text text-danger">{{$message}}</span>

                                @enderror           

                                </div>
                                </div>

                                <div class="form-group">

                                <label class="form-control-label">Product Images</label>   

                                 <input type="file" name="photo[]" class="form-control" multiple="true">
                                  

                                 @error('photo')

                                 <span class="text text-danger">{{$message}}</span>
                                 
                                 @enderror

                                 @error('photo.*')

                                 <span class="text text-danger">{{$message}}</span>

                                 @enderror   


                                </div>

                                <input type="submit" value="Submit" class="btn btn-success">

                            </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>

  @endsection      
