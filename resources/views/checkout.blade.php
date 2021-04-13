@extends('GuestLayout')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
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
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>Billing Details</h4>
                </div>
                <form action="/address/{{Auth::id()}}/{{$cart->sum('price')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" required class="form-control" name="house_no" placeholder="House No *">
                    </div>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="thana" placeholder="Thana *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="postal_code" placeholder="Postcode / ZIP *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="city" placeholder="City / Town *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="country" placeholder="State / County *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" required type="text" name="phone_number" placeholder="Phone *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="submit" value="Submit">
                    </div>
                    <!-- <a type="submit" class="btn btn-fill-out btn-block">Place Order</a> -->
                </form>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            @foreach($cart as $value)
                              @if($value->user_id==Auth::id())
                              <tr>
                                  <td class="product-name" data-title="Product">{{$value->name}}</a></td>
                                  <td class="product-price" data-title="Price">${{$value->price}}</td>
                              </tr>
                              @endif
                            @endforeach
                            <tfoot>
                                <tr>
                                    <th>SubTotal</th>
                                    <td class="product-subtotal">${{$cart->sum('price')}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>$50</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td class="product-subtotal">${{$cart->sum('price')+50}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment_method">
                        <div class="heading_s1">
                            <h4>Payment</h4>
                        </div>
                        <div class="payment_option">
                            <div class="custome-radio">
                                <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="option3" checked="">
                                <label class="form-check-label" for="exampleRadios3">Direct Bank Transfer</label>
                                <p data-method="option3" class="payment-text">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration. </p>
                            </div>
                            <div class="custome-radio">
                                <input class="form-check-input" type="radio" name="payment_option" id="exampleRadios5" value="option5">
                                <label class="form-check-label" for="exampleRadios5">Bkash</label>
                                <p data-method="option5" class="payment-text">Pay via Bkash; you can pay with your bkash account very easily.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->
@endsection
