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
				<div class="col-lg-3 order-2 order-lg-1">
					<div class="filter-widget">
						<h2 class="fw-title">Categories</h2>
						<ul class="category-menu">
							@foreach( $Categories as $category)
							<li class="active"><a href="{{route('shop.index' , ['category' => $category->slug])}}">{{$category->name}}</a></li>
							@endforeach
						</ul>
					</div>
					<div class="filter-widget mb-0">
						<h2 class="fw-title">Sort by</h2>
						<div class="price-range-wrap">
							<h4><a href="{{route('shop.index', ['category' => request()->category,'sort' => 'low_high'])}}" ><small>Price: Low to High</small></a></h4>
							<h4><a href="{{route('shop.index', ['category' => request()->category,'sort' => 'high_low'])}}" ><small>Price: High to Low</small></a></h4>
							
							
                            {{-- <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="10" data-max="270">
								<div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;">
								</span>
								<span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;">
								</span>
							</div>
							<div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
							</div> --}}
						
                        </div>
					</div>
				</div>
				

				<div class="col-lg-9  order-1 order-lg-2 mb-5 mb-lg-0">
					
					<div class="row">
						@foreach ($FeaturedProducts as $FeaturedProduct)
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
						@endforeach
						
						{{-- <div class="text-center w-100 pt-3">
							<button class="site-btn sb-line sb-dark">LOAD MORE</button>
						</div> --}}
					</div>
				</div>
			</div>
			<div class=" d-flex justify-content-center pt-2" >
				{{-- {{$FeaturedProducts->links()}} --}}
				 {{$FeaturedProducts->appends(request()->input())->links()}} 
				 
			</div>	
		</div>
	</section>
	<!-- Category section end -->
	
@endsection
	
</html>
