@extends('frontend.layouts.frontmaster')

@section('content')

<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col">
						<p class="bread"><span><a href="index.html">Home</a></span> / <span>Checkout</span></p>
					</div>
				</div>
			</div>
		</div>


		<div class="colorlib-product">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-sm-10 offset-md-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
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

				<div class="row">

					

					<div class="col-lg-8">
							<h2>Billing Details</h2>

						  
						<form method="POST" action="{{route('checkout.store') }}">

						@csrf
								
		              	<div class="row">

			               {{-- <div class="col-md-12">
			                  <div class="form-group">
			                  	<label for="country">Select Country</label>
			                     <div class="form-field">
			                     	<i class="icon icon-arrow-down3"></i>
			                        <select name="people" id="people" class="form-control">
				                      	<option value="">Select country</option>
				                        <option value="#">Alaska</option>
				                        <option value="#">China</option>
				                        <option value="#">Japan</option>
				                        <option value="#">Korea</option>
				                        <option value="#">Philippines</option>
			                        </select>
			                     </div>
			                  </div>
			               </div> --}}

			             

								<div class="col-md-6">
									<div class="form-group">
										<label for="fname">First Name 
											<span class=" text-danger">*</span></label>
										<input type="text" id="fname" class="form-control" value="{{auth()->user()->name}}" name="firstname">

										@error('firstname')		
										<span class="text text-danger">{{$message}}</span>
										@enderror

									</div>

								</div>



								<div class="col-md-6">
									<div class="form-group">
										<label for="lname">Last Name</label>
										<input type="text" id="lname" class="form-control" placeholder="Your lastname" name="lastname">
									</div>
								</div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="companyname">Company Name</label>
			                    	<input type="text" id="companyname" class="form-control" placeholder="Company Name" name="company_name">


			                  </div>
			               </div>

			               <div class="col-md-12">
									<div class="form-group">
										<label for="fname">Address <span class=" text-danger">*</span></label>
			                    	<input type="text" id="address" class="form-control" value="{{auth()->user()->address}}" name="first_address">

			                    	@error('first_address')

			                    	<span class="text text-danger">{{$message}}</span>

			                    	@enderror
			                  </div>
			                  <div class="form-group">
			                    	<input type="text" id="address2" class="form-control" placeholder="Second Address" name="second_address">
			                  </div>
			               </div>
			            
			               <div class="col-md-12">
									<div class="form-group">
										<label for="companyname">Town/City <span class=" text-danger">*</span></label>
			                    	<input type="text" id="towncity" class="form-control" placeholder="Town or City" name="city">

			                    	@error('city')

			                    	<span class="text text-danger">{{$message}}</span>

			                    	@enderror


			                  </div>
			               </div>
			            
								<div class="col-md-6">
									<div class="form-group">
										<label for="stateprovince">State/Province <span class=" text-danger">*</span></label>
										<input type="text" id="fname" class="form-control" placeholder="State Province" name="state">

										@error('state')

			                    		<span class="text text-danger">{{$message}}</span>

			                    		@enderror

									</div>

								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="lname">Zip/Postal Code <span class=" text-danger">*</span></label>
										<input type="text" id="zippostalcode" class="form-control" placeholder="Zip / Postal" name="zip">

										@error('zip')

			                    		<span class="text text-danger">{{$message}}</span>

			                    		@enderror

									</div>
								</div>
							
								<div class="col-md-6">
									<div class="form-group">
										<label for="email">E-mail Address <span class=" text-danger">*</span></label>
										<input type="text" id="email" class="form-control" value="{{auth()->user()->email}}" name="user_email">

										@error('user_email')

			                    		<span class="text text-danger">{{$message}}</span>

			                    		@enderror
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="Phone">Phone Number <span class=" text-danger">*</span></label>
										<input type="number" id="zippostalcode" class="form-control" value="{{auth()->user()->contact}}" name="user_phone" min="1">

										@error('user_phone')

			                    		<span class="text text-danger">{{$message}}</span>

			                    		@enderror
									</div>
								</div>


		               </div>
		      
					</div>

					<div class="col-lg-4">
						<div class="row">
							<div class="col-md-12">
								<div class="cart-detail">
									<h2>Cart Total</h2>
									<ul>
										<li>
											<?php $sum=0;?>	
											@for($i=0; $i<count($details);$i++)

											 <?php $sum=$sum+$details[$i]->quantity*$details[$i]->price;?>

											@endfor
											<span>Subtotal</span> <span>{{$sum}}</span>
											<ul>
												

												@foreach($details as $row)

												<li><span>{{$row->quantity}} x {{$row->name}}</span> <span><?=$row->quantity * $row->price?></span></li>

												<input type="hidden" name="product_id[]" value="{{$row->product_id}}">


								<input type="hidden" name="photo_id[]" value="{{$row->photo_id}}">

								<input type="hidden" name="user_id[]" value="{{$row->cart_by}}">

								<input type="hidden" name="product_quantity[]" value="{{$row->quantity}}">

								<input type="hidden" name="cart_id[]" value="{{$row->id}}">

												@endforeach
											</ul>
										</li>
										<li><span>Shipping</span> <span>{{5/100*$sum}}</span></li>
										<li><span>Order Total</span> <span>{{$sum+5/100*$sum}}</span></li>

										<input type="hidden" name="final_cost" value="{{$sum+5/100*$sum}}">	

									</ul>
								</div>
						   </div>

						   <div class="w-100"></div>

						  {{--  <div class="col-md-12">
								<div class="cart-detail">
									<h2>Payment Method</h2>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio"> Direct Bank Tranfer</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio"> Check Payment</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" name="optradio"> Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											   <label><input type="checkbox" value=""> I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
								</div>
							</div> --}}
							
						</div>
						<div class="row">
							<div class="col-md-12 text-center">
								
								<input type="submit" value="Place an order" class="btn btn-primary">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

@endsection
