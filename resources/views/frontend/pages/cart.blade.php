@extends('frontend.layouts.frontmaster')
{{-- @section('home-active') "active" @endsection --}}
@section('content')

<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Shopping Cart</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>

				<div class="{{session()->get('color')}}">

				{{session()->get('messages')}}
				</div>

				@error('quantity')
				<span class="text text-danger">{{$message}}</span>

				@enderror
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="product-name d-flex">
							<div class="one-forth text-left px-4">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center px-4">
								<span>Remove</span>
							</div>
						</div>

						@foreach($details as $key=>$row)

						<div class="product-cart d-flex">
							<div class="one-forth">
								<div class="product-img" style="background-image: url({{ asset("storage/productimages/$row->photo") }});">
								</div>
								<div class="display-tc">
									<h3>{{$row->name}}</h3>
								</div>
							</div>
							<div class="one-eight text-center">
								<div class="display-tc">
									<span class="price">{{$row->price}}</span>
								</div>
							</div>

							<form method="POST" action="{{ route('updateCart',[$row->id]) }}" id="form-cartupdate-{{$row->id}}">
							@csrf	
							@method('PUT')

							<div class="one-eight text-center">
								<div class="display-tc">
									<input type="number" id="quantity-{{$row->id}}" name="quantity" class="form-control input-number text-center" value="{{$row->quantity}}" min="1" required>

							</div>


							</div>

							</form>


							<div class="one-eight text-center">
								<div class="display-tc">
									<span id="cart-total-{{$key}}"><?= $row->price * $row->quantity ?> </span>
								</div>
							</div>

							

							<div class="one-eight text-center">
								<div class="display-tc">
									
									<div class="row">

									<div class="col-lg-6">	


									<button class="btn btn-warning" onclick="event.preventDefault(); document.getElementById('form-cartupdate-{{$row->id}}').submit();"><i class="icon-edit"></i></button>


                                    </div>

                                    <div class="col-lg-6">			
									<button class="btn btn-danger" onclick="event.preventDefault(); if(confirm('Are u sure want to remove?'))
                                         {document.getElementById('form-delete-{{$row->id}}').submit();}"><i class="icon-trash"></i></button>
                                    </div>
                                    


                                         <form action="{{ route('deleteCart',[$row->id]) }}" id="form-delete-{{$row->id}}" style="display: none" method="POST">
                                          
                                         @csrf
                                         
                                         @method('delete')

                                         </form>


								</div>

							</div>

							</div>


						</div>

							<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

							<script  type="text/javascript">
							$(document).ready(function() {
    						$('#quantity-{{$row->id}}').keyup(function(ev){
        
        					var total = $(this).val() * {{$row->price}};

        					$("#cart-total-{{$key}}").html((total));

        					var abc={{count($details)}};

        					var sum=0;

        					for(var i=0; i<abc;i++)

        					{

        						sum=sum+parseInt(document.getElementById("cart-total-"+i).innerText);

        						console.log(i);

        						


        					}

        					$('#final-total').html((sum).toFixed(2));

        				

        					

		
    						});
							});



							</script>		


					@endforeach	


			


						
				<div class="row row-pb-lg">
					<div class="col-md-12">
						<div class="total-wrap">
							<div class="row">
								<div class="col-sm-8">
									<form action="#">
										<div class="row form-group">
											<div class="col-sm-9">
												<input type="text" name="quantity" class="form-control input-number" placeholder="Your Coupon Number...">
											</div>
											<div class="col-sm-3">
												<input type="submit" value="Apply Coupon" class="btn btn-primary">
											</div>
										</div>
									</form>
								</div>
								<div class="col-sm-4 text-center">
									<div class="total">
										<div class="sub">
											<p><span>Subtotal:</span> <span class="cart-total">0.00</span></p>
											<p><span>Delivery:</span> <span>0.00</span></p>
											<p><span>Discount:</span> <span>0.00</span></p>
										</div>
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span id="final-total">
											
											<script type="text/javascript">
													
												var abc={{count($details)}};

        										var sum=0;

        										for(var i=0; i<abc;i++)

        										{

        										sum=sum+parseInt(document.getElementById("cart-total-"+i).innerText);


        										}

        									$('#final-total').html((sum).toFixed(2));		



											</script>		




											</span></p>
										</div>

										<div>	
										<a href="{{ route('checkout.index') }}" class="btn btn-success">Proceed To Checkout</a>

										</div>


									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				
@endsection


