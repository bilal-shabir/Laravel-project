@extends('layout.layout')

@section('content')

@if(session()->has('success_message'))
    <div class="alert alert-success mt-3">
        {{ session()->get('success_message') }}
    </div>
@endif


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Your cart</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Your cart</a>
			</div>
		</div>
	</div>
	<!-- Page info end -->


	<!-- cart section end -->
	<section class="cart-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-table">
						<h3>Your Cart</h3>
						@if (Cart::count() > 0)
							<div class="cart-table-warp">
								<table>
								<thead>
									<tr>
										<th class="product-th">Product</th>
										<th class="quy-th">Quantity</th>
										<th class="size-th">price</th>
										<th class="total-th"></th>
									</tr>
								</thead>
								<tbody>
									@foreach(Cart::content() as $CartItem)
										<tr>
											<td class="product-col">
												<a href='{{ route('shop.show' , $CartItem->model->slug)}}' >
													<img src="{{asset('img/product/'.$CartItem->model->slug.'.jpg')}}" alt="">
												</a>
												<div class="pc-title">
													<a href='{{ route('shop.show' , $CartItem->model->slug)}}' >		
														<h4>{{$CartItem->model->name}}</h4>
													</a>
													<p></p>
												</div>
											</td>
											
											<td class="quy-col">
												<div class="quantity">
													<div class="pro-qty">
													<input type="text" value="{{$CartItem->qty}}" abc='{{$CartItem->rowId}}' id='cartId'>
													</div>
												</div>
											</td>
											<td class="size-col"><h4>${{$CartItem->model->price}}</h4></td>
											<td class="total-col">
												<form action="{{route('cart.destroy', $CartItem->rowId ) }}"  method='POST'>
													@csrf
													<input type="hidden" name="_method" value="DELETE">
													<button class='btn' type=submit >remove from cart</button>
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
							</div>
							<div class="total-cost">
								
							<h6 >Total <span>{{Cart::subtotal()}}</span></h6>
							
							
							</div>
						@else
							<h4 class='mb-3'>No Items in your cart</h4>
							<div class="total-cost">
								<h6> <span></span></h6>
							</div>
						@endif
					</div>
				</div>
				<div class="col-lg-4 card-right">
					<form class="promo-code-form">
						<input type="text" placeholder="Enter promo code">
						<button>Submit</button>
					</form>
					<a href="{{route('checkout.index')}}" class="site-btn">Proceed to checkout</a>
				<a href="{{route('shop.index')}}" class="site-btn sb-dark">Continue shopping</a>
				</div>
			</div>
		</div>
	</section>
	<!-- cart section end -->

	<!-- Related product section -->
	<section class="related-product-section">
		<div class="container">
			<div class="section-title text-uppercase">
				<h2>Continue Shopping</h2>
			</div>
			<div class="row">
				@foreach ($FeaturedProducts as $FeaturedProduct)
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<a href='{{ route('shop.show' , $FeaturedProduct->slug)}}' >
								<img src="{{ asset('img/product/'.$FeaturedProduct->slug.'.jpg')}}" alt="">
							</a>
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
							<h6>${{$FeaturedProduct->price}}</h6>
							<p>{{$FeaturedProduct->name}} </p>
						</div>
					</div>
				</div>
			@endforeach
				
				
				
			
		</div>
	</section>
	<!-- Related product section end -->

@endsection
<script src="{{asset('js/app.js')}}"></script>


