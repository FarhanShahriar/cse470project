@extends('GuestLayout')
@section('content')
<div class="main_content">

  <!-- START SECTION BANNER -->
  <div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
      <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
          <div class="carousel-inner">
              @foreach($sliders as $key=>$item)
              @if($key==0)
              <div class="carousel-item background_bg active" data-img-src = "{{ $item->image }}"></div>
              @else
              <div class="carousel-item background_bg" data-img-src = "{{ $item->image }}"></div>
              @endif
              <div class="carousel-item background_bg" data-img-src="{{ $item->image }}">
                  <div class="banner_slide_content banner_content_inner">
                  	<div class="container">
                      	<div class="row">
                              <div class="col-lg-7 col-10">
                                  <div class="banner_content overflow-hidden">
                                      <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">cse470project</h2>
                                      <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s">Get up to <span class="text_default">50%</span> off Today Only!</h5>
                                      <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                  </div>
                              </div>
                      	</div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><i class="ion-chevron-left"></i></a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><i class="ion-chevron-right"></i></a>
      </div>
  </div>
  <!-- END SECTION BANNER -->

<!-- START SECTION CATEGORIES -->
<div class="section small_pb small_pt">
	<div class="container">
    	<div class="row justify-content-center">
			<div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Top Categories</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
		</div>
        <div class="row align-items-center">
            <div class="col-12">
                <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "5"}, "991":{"items": "6"}, "1199":{"items": "7"}}'>
                    @foreach($categories as $item)
                    <div class="item">
                        <div class="categories_box">
                            <a href="/category/{{ $item->slug }}">
                                <img src="{{asset('images/'.$item->image)}}" style="height:115px;" alt="$item->image)">
                                <span>{{$item->name}}</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CATEGORIES -->

<!-- START SECTION SHOP -->
<div class="section small_pb small_pt">
	<div class="container">
        <div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Exclusive Products</h2>
                </div>
            </div>
		</div>
        <div class="row">
            <div class="col-12">
            	<div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">New Arrival</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                        </li>
                    </ul>
                </div>
                <div class="tab_slider tab-content">
                    <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                              @foreach ($newarrival as $value)
                              <div class="item">
                                  <div class="product_wrap">
                                      <div class="product_img">
                                          <a href="/product/{{ $value->id }}">
                                              <img src="{{asset('images/'.$value->image)}}" style="height: 260px;" alt="newarrival">
                                              <img class="product_hover_img" src="{{asset('images/'.$value->image)}}" style="height: 260px;" alt="newarrival_hover">
                                          </a>
                                          <div class="product_action_box">
                                              <ul class="list_none pr_action_btn">
                                                  <li class="add-to-cart"><a href="/cart/store/{{$value->id}}/{{Auth::id()}}"><i
                                                              class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                  <li><a href="#" class="popup-ajax"><i
                                                              class="icon-shuffle"></i></a></li>
                                                  <li><a href="#" class="popup-ajax"><i
                                                              class="icon-magnifier-add"></i></a></li>
                                                  <li><a href="#"><i class="icon-heart"></i></a></li>
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="product_info">
                                          <h6 class="product_title"><a href="/product/{{ $value->id }}">{{ $value->name }}</a></h6>
                                          <div class="product_price">
                                              <span class="price">{{$value->price}}</span>
                                              <del>$95.00</del>
                                              <div class="on_sale">
                                                  <span>25% Off</span>
                                              </div>
                                          </div>
                                          <div class="rating_wrap">
                                              <div class="rating">
                                                  <div class="product_rate" style="width:70%"></div>
                                              </div>
                                              <span class="rating_num">(22)</span>
                                          </div>
                                          <div class="pr_desc">
                                              <p>{{ $value->description }}</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                        <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                          @foreach ($bestseller as $value)
                          <div class="item">
                              <div class="product_wrap">
                                  <div class="product_img">
                                      <a href="/product/{{ $value->id }}">
                                          <img src="{{asset('images/'.$value->image)}}" style="height: 260px;" alt="bestseller">
                                          <img class="product_hover_img" src="{{asset('images/'.$value->image)}}" style="height: 260px;" alt="bestseller_hover">
                                      </a>
                                      <div class="product_action_box">
                                          <ul class="list_none pr_action_btn">
                                              <li class="add-to-cart"><a href="/cart/store/{{$value->id}}/{{Auth::id()}}"><i
                                                          class="icon-basket-loaded"></i> Add To Cart</a></li>
                                              <li><a href="#" class="popup-ajax"><i
                                                          class="icon-shuffle"></i></a></li>
                                              <li><a href="#" class="popup-ajax"><i
                                                          class="icon-magnifier-add"></i></a></li>
                                              <li><a href="#"><i class="icon-heart"></i></a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="product_info">
                                      <h6 class="product_title"><a href="/product/{{ $value->id }}">{{ $value->name }}</a></h6>
                                      <div class="product_price">
                                          <span class="price">{{$value->price}}</span>
                                          <del>$95.00</del>
                                          <div class="on_sale">
                                              <span>25% Off</span>
                                          </div>
                                      </div>
                                      <div class="rating_wrap">
                                          <div class="rating">
                                              <div class="product_rate" style="width:70%"></div>
                                          </div>
                                          <span class="rating_num">(22)</span>
                                      </div>
                                      <div class="pr_desc">
                                          <p>{{ $value->description }}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION BLOG -->
<div class="section pb_20">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-lg-6 col-md-8">
            	<div class="heading_s1 text-center">
                	<h2>Latest News</h2>
                </div>
                <p class="leads text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
        	@foreach($posts as $value)
          <div class="col-lg-4 col-md-6">
            	<div class="blog_post blog_style2 box_shadow1">
                	<div class="blog_img">
                        <a href="/blog-single/{{$value->id}}">
                            <img src="{{asset('images/'.$value->image)}}" style="height: 350px;" alt="el_blog_img1">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                    	<div class="blog_text">
                            <h5 class="blog_title"><a href="/blog-single/{{$value->id}}">{{ $value->title }}</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> {{ $value->created_at }}</a></li>
                                <li><a href="#"><i class="ti-user"></i> {{ $value->author }}</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything hidden in the text</p>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

</div>
@endsection
