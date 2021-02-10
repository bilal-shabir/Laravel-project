@extends('layout.layout')

@section('content')




	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
		<div class="hs-item set-bg" data-setbg="{{asset('img/bg9.jpg')}}">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="{{route('shop.index') }}" class="site-btn sb-line">SHOP</a>
							<a href="{{route('cart.index') }}" class="site-btn sb-white">GO TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="{{asset('img/bg11.jpg')}}">
				<div class="container">
					<div class="row">
						<div class="col-xl-6 col-lg-7 text-white">
							<span>New Arrivals</span>
							<h2>denim jackets</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
							<a href="{{route('shop.index') }}" class="site-btn sb-line">SHOP</a>
							<a href="{{route('cart.index') }}" class="site-btn sb-white">GO TO CART</a>
						</div>
					</div>
					<div class="offer-card text-white">
						<span>from</span>
						<h2>$29</h2>
						<p>SHOP NOW</p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="slide-num-holder" id="snh-1"></div>
		</div>
	</section>
	<!-- Hero section end -->



	<!-- Features section -->
	<section class="features-section">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
						<img src="{{asset('img/icons/1.png')}}" alt="#">
						</div>
						<h2>Fast Secure Payments</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{asset('img/icons/2.png')}}" alt="#">
						</div>
						<h2>Premium Products</h2>
					</div>
				</div>
				<div class="col-md-4 p-0 feature">
					<div class="feature-inner">
						<div class="feature-icon">
							<img src="{{asset('img/icons/3.png')}}" alt="#">
						</div>
						<h2>Free & fast Delivery</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Features section end -->


	<!-- letest product section -->
	<section class="top-letest-product-section">
		<div class="container">
			<div class="section-title">
				<h2>FEATURED PRODUCTS</h2>
			</div>
			<div class="product-slider owl-carousel">
				@foreach ($FeaturedProducts as $FeaturedProduct)
					<div class="product-item">
						<div class="pi-pic">
							<a href='{{ route('shop.show' , $FeaturedProduct->slug)}}' >
								<img src="{{ asset('img/product/'.$FeaturedProduct->slug.'.jpg')}}" alt="">
							</a>
							<div class="pi-links">
							<form action="{{route('cart.store')}}" method='POST' >
								@csrf
								<input type='hidden' name='id' value='{{$FeaturedProduct->id}}'>
								<input type='hidden' name='name' value='{{$FeaturedProduct->name}}'>
								<input type='hidden' name='price' value='{{$FeaturedProduct->price}}'>
								<button style='cursor:pointer;background-color:white;border-radius:50%; Border:2px solid black;' type='submit' class="add-card"><i class="flaticon-bag"></i></button>
							</form>
							<button style='background-color:white;border-radius:50%; Border:2px solid black;' type='submit' class="add-card mt-1"><i class="flaticon-heart"></i></button>
							
						</div>
					</div>
						<div class="pi-text">
							<h6>${{$FeaturedProduct->price}}</h6>
							<p>{{$FeaturedProduct->name}} </p>
						</div>
					</div>
			@endforeach
			</div>
		</div>
	</section>
	<!-- letest product section end -->



	<!-- Product filter section -->
	<section class="product-filter-section">
		<div class="container">
			<div class="section-title">
				<h2>BROWSE TOP SELLING PRODUCTS</h2>
			</div>
			<div class="row">
				@foreach ($TopSellingProducts as $TopSellingProduct)
				<div class="col-lg-3 col-sm-6">
					<div class="product-item">
						<div class="pi-pic">
							<a href='{{ route('shop.show' , $FeaturedProduct->slug)}}' >
								<img src="{{ asset('img/product/'.$TopSellingProduct->slug.'.jpg')}}" alt="">
							</a>
							<div class="pi-links">
								<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
								<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
							</div>
						</div>
						<div class="pi-text">
						<h6>${{$TopSellingProduct->price}}</h6>
							<p>{{$TopSellingProduct->name}} </p>
						</div>
					</div>
				</div>
				@endforeach
				
			</div>
			<div class="text-center pt-5">
				{{-- <button class="site-btn sb-line sb-dark"> GO TO SHOP</button> --}}
				<a href="{{route('shop.index') }}" ><button class="site-btn sb-line sb-dark"> GO TO SHOP</button></a>
			</div>
		</div>
	</section>
	<!-- Product filter section end -->


	<!-- Banner section -->
	<section class="banner-section">
		<div class="container">
		<div class="banner set-bg" data-setbg="{{asset('img/banner-bg.jpg')}}">
				<div class="tag-new">NEW</div>
				<span>New Arrivals</span>
				<h2>STRIPED SHIRTS</h2>
				<a href="#" class="site-btn">SHOP NOW</a>
			</div>
		</div>
	</section>
	<!-- Banner section end  -->




@endsection
