@extends('backend.layouts.backmaster')

@section('product-active') active @endsection

@section('page-title') Product Image Table @endsection

@section('content')


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">      
                            <div class="card-header">

                            @if(session()->has('messages'))

                            <div class="{{session()->get('color')}}">

                                   {{session()->get('messages')}}
                            </div>       

                             @endif 

                                <strong class="card-title">Products Image Table</strong>

                                 <a href="{{ route('photos.create') }}" class="btn btn-success float-right">Add Product Image</a>
                    
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Photo</th>
                                            <th>Product Name</th>
                                            <th>Product Id</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($photo as $row)

                                        @if($row->product->inserted_by==auth()->user()->id && auth()->user()->role=='seller')
                                        <tr>

                                          <td>{{$no++}}</td>
                                          <td><img src="{{ asset("storage/productimages/$row->photo") }}" style="height: 60px; width: 60px;"></td>
                                          <td>{{$row->product->name}}</td>
                                          <td>{{$row->product->id}}</td>
                                          <td>
                                         
                                         <a href="{{ route('photos.edit',[$row->id]) }}" class="btn btn-primary">Edit</a>


                                         <button class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are u sure want to delete'))
                                         {document.getElementById('form-delete-{{$row->id}}').submit();}">Delete</button>

                                         <form action="{{ route('photos.destroy',[$row->id]) }}" id="form-delete-{{$row->id}}" style="display: none" method="POST">
                                          
                                         @csrf
                                         
                                         @method('delete')

                                         </form>

                                         </td>  
                                            
                                        </tr>

                                        @elseif(auth()->user()->role=='admin')
                                        
                                        <tr>

                                          <td>{{$no++}}</td>
                                          <td><img src="{{ asset("storage/productimages/$row->photo") }}" style="height: 60px; width: 60px;"></td>
                                          <td>{{$row->product->name}}</td>
                                          <td>{{$row->product->id}}</td>
                                          <td>
                                         
                                         <a href="{{ route('photos.edit',[$row->id]) }}" class="btn btn-primary">Edit</a>


                                         <button class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are u sure want to delete'))
                                         {document.getElementById('form-delete-{{$row->id}}').submit();}">Delete</button>

                                         <form action="{{ route('photos.destroy',[$row->id]) }}" id="form-delete-{{$row->id}}" style="display: none" method="POST">
                                          
                                         @csrf
                                         
                                         @method('delete')

                                         </form>

                                         </td>  
                                            
                                        </tr>

                                        @endif





                                        @empty

                                        <tr><td colspan="6">No Records Found</td>

                                        @endforelse    
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->


@endsection