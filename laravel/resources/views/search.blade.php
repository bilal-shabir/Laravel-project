@extends('layout.layout')

@section('content')
	


	<!-- Page info -->
	<div class="page-top-info">
		<div class="container">
			<h4>Category Page</h4>
			<div class="site-pagination">
				<a href="">Home</a> /
				<a href="">Shop</a> /
			</div>
		</div>
	</div>
	<!-- Page info end -->

	<H3 ALIGN="CENTER" class='pt-2'>{{$Categoryname}}</H3>
	<!-- Category section -->
	<section class="category-section spad">
		<div class="container">
			<div class="row">
				
				

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					
					<div class="row ">
						@if($FeaturedProduct) 
							<div class="col-lg-4 col-sm-6">
								<div class="product-item">
									<div class="pi-pic">
										<div class="tag-sale">ON SALE</div>
									<a href='{{ route('shop.show' , $FeaturedProduct->slug)}}' ><img src="{{ asset('img/product/'.$FeaturedProduct->slug.'.jpg')}}" alt=""></a>
										<div class="pi-links">
											<a href="#" class="add-card"><i class="flaticon-bag"></i><span>ADD TO CART</span></a>
											<a href="#" class="wishlist-btn"><i class="flaticon-heart"></i></a>
										</div>
									</div>
									<div class="pi-text">
										<h6>${{$FeaturedProduct->price}}</h6>
										<p>{{$FeaturedProduct->name}}</p>
									</div>
								</div>
							</div>
						@else
							<h3>No Search results found</h3>
						@endif
						{{-- <div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">LOAD MORE</button>
						</div> --}}
					</div>
				</div>
			</div>
				
		</div>
	</section>
	<!-- Category section end -->
	
@endsection
	
</html>
