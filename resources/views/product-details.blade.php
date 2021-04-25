@extends('GuestLayout')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Product Detail</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
		<div class="row">
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image">
                    <div class="product_img_box">
                        <img id="product_img" src='{{asset('images/'.$details->image)}}' data-zoom-image="{{asset('images/'.$details->image)}}" alt="product_img1" />
                        <!-- <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{$details->name}}</a></h4>
                        <div class="product_price">
                            <span class="price">${{$details->price}}</span>
                            <del>$55.25</del>
                            <div class="on_sale">
                                <span>35% Off</span>
                            </div>
                        </div>
                        <div class="rating_wrap">
                                <div class="rating">
                                    <div class="product_rate" style="width:80%"></div>
                                </div>
                                <span class="rating_num">(21)</span>
                            </div>
                        <div class="pr_desc">
                            <p>{{$details->description}}</p>
                        </div>
                    </div>
                    <hr />
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <button class="btn btn-fill-out btn-addtocart" type="button"><i class="icon-basket-loaded"></i> Add to cart</button>
                            <a class="add_compare" href="#"><i class="icon-shuffle"></i></a>
                            <a class="add_wishlist" href="#"><i class="icon-heart"></i></a>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-sm-6">
                        <ul class="product-meta">
                            <li>SKU: <a href="#">{{$details->SKU}}</a></li>
                            <li>Gender: <a href="#">{{$details->gender}}</a></li>
                            <li>Height: <a href="#">{{$details->height}}</a></li>
                            <li>Width: <a href="#">{{$details->width}}</a></li>
                            <li>Weight: <a href="#">{{$details->weight}}</a></li>
                        </ul>
                      </div>
                      <div class="col-sm-6">
                        <ul class="product-meta">
                          <li>Gold Weight: <a href="#">{{$details->gold_weight}}</a></li>
                          <li>Gold Purity: <a href="#">{{$details->gold_purity}}</a></li>
                          <li>Diamond Weight: <a href="#">{{$details->diamond_weight}}</a></li>
                          <li>Diamond Purity: <a href="#">{{$details->diamond_purity}}</a></li>
                          <li>Caret: <a href="#">{{$details->caret}}</a></li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection
