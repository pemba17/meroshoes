@extends('backend.layouts.backmaster')

@section('product-active') active @endsection

@section('page-title') Products Table @endsection

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

                                <strong class="card-title">Products Table</strong>
                                <a href="{{ route('products.create') }}" class="btn btn-success float-right">Add Product</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Brand</th>
                                            <th>Price</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($productDetails as $row)
                                        <tr>

                                          <td>{{$no++}}</td>
                                          <td>{{$row->name}}</td>
                                          <td>{{$row->type}}</td>
                                          <td>{{$row->brand}}</td>
                                          <td>{{$row->price}}</td>
                                          <td>
                                          <a href="{{ route('products.edit',[$row->id]) }}" class="btn btn-primary">Edit</a>

                                         <a class="btn btn-danger text-light" onclick="event.preventDefault(); if(confirm('Are u sure want to delete')){ document.getElementById('form-delete-{{$row->id}}').submit();}">Delete</a>

                                         <form id="form-delete-{{$row->id}}" style="display: none" method="POST" action="{{ route('products.destroy',[$row->id]) }}">

                                         @csrf   
                                         @method('delete')    

                                         </form>
                                         </td>  
                                            
                                        </tr>

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