@extends('layout.layout')

@section('content')



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


	<!-- Display messages -->
	@if(session()->has('success_message'))
    <div class="alert alert-success mt-3">
        {{ session()->get('success_message') }}
    </div>
@endif


	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Display messages end -->

	<!-- checkout section  -->
	<section class="checkout-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 order-2 order-lg-1">
					<form class="checkout-form" action='{{route('test.store')}}' method='POST'>
						@csrf
						<div class="cf-title">Billing Address</div>
						<div class="row">
							<div class="col-md-7">
								<p>*Billing Information</p>
							</div>
							<div class="col-md-5">
								<div class="cf-radio-btns address-rb">
									<div class="cfr-item">
										<input type="radio" name="pm" id="one">
										<label for="one">Use my regular address</label>
									</div>
									<div class="cfr-item">
										<input type="radio" name="pm" id="two">
										<label for="two">Use a different address</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row address-inputs">
							<div class="col-md-12">
								<input type="text" placeholder="Name" name='name' id='name' >
								<input type="text" placeholder="Email" name='email' id='email' >
								<input type="text" placeholder="Address" name='address' id='address' >
								
								
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="City" name='city' id='city'>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Province." name='province' id='province'>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Zip code" name='zcode' id='zcode'>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Phone no." name='phone' id='phone'>
							</div>
						</div>
						<div class="cf-title">Delievery Info</div>
						<div class="row shipping-btns">
							<div class="col-6">
								<h4>Standard</h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-1">
										<label for="ship-1">Free</label>
									</div>
								</div>
							</div>
							<div class="col-6">
								<h4>Next day delievery  </h4>
							</div>
							<div class="col-6">
								<div class="cf-radio-btns">
									<div class="cfr-item">
										<input type="radio" name="shipping" id="ship-2">
										<label for="ship-2">$3.45</label>
									</div>
								</div>
							</div>
						</div>
						<div class="cf-title">Payment</div>
						<ul class="payment-list">
							<li>Paypal<a href="#"><img src="img/paypal.png" alt=""></a></li>
							<li>Credit / Debit card<a href="#"><img src="img/mastercart.png" alt=""></a></li>
							<li>Pay when you get the package</li>
						</ul>
						<button class="site-btn submit-order-btn">Place Order</button>
					</form>
				</div>
				<div class="col-lg-4 order-1 order-lg-2">
					<div class="checkout-cart">
						<h3>Your Order</h3>
						<ul class="product-list">
							@foreach(Cart::content() as $CartItems)
								<li>
									<div class="pl-thumb"><img src="{{asset('img/product/'.$CartItems->model->slug.'.jpg')}}" alt=""></div>
									<h6>{{$CartItems->name}}</h6>
									<p>${{$CartItems->price}}</p>
								</li>
							@endforeach
						</ul>
						<ul class="price-list">
							<li class='pr-3'>Sub Total<span>${{$subtotal}}</span></li>
							@if(session('coupen'))
								<li class='pr-3'>Coupen:<span>{{session()->get('coupen')['name']}}</span>
								<form method='POST' action ="{{route('coupen.delete')}}">
									@csrf
									<input type="hidden" name="_method" value="delete" />
									<button type='submit'>remove</button>
								</form>
								</li>
								<li class='pr-3'>Discount:<span>{{$discount}}</span></li>
							@endif
							<li class='pr-3'>Tax (2.5%)<span>{{$taxAmount}}</span></li>
							<li class="total pr-3">Total<span>${{$total}}</span></li>
						</ul>
					</div>
					<form action="{{route('coupen.store')}}" method='POST' class="promo-code-form PT-3">
						@csrf
						
						<input name='code' id='code' type="text" placeholder="Enter promo code">
						<button type=submit class='pt-4'>Submit</button>
					</form>
					
				</div>
			</div>
		</div>
	</section>
	<!-- checkout section end -->

	@endsection
</html>
