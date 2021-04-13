<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="Anil z" name="author">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
<meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

<!-- SITE TITLE -->
<title>cse470project</title>
<!-- Favicon Icon -->
<link rel="shortcut icon" type="image/x-icon" href="/res/images/favicon.png">
<!-- Animation CSS -->
<link rel="stylesheet" href="/res/css/animate.css">
<!-- Latest Bootstrap min CSS -->
<link rel="stylesheet" href="/res/bootstrap/css/bootstrap.min.css">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<!-- Icon Font CSS -->
<link rel="stylesheet" href="/res/css/all.min.css">
<link rel="stylesheet" href="/res/css/ionicons.min.css">
<link rel="stylesheet" href="/res/css/themify-icons.css">
<link rel="stylesheet" href="/res/css/linearicons.css">
<link rel="stylesheet" href="/res/css/flaticon.css">
<link rel="stylesheet" href="/res/css/simple-line-icons.css">
<!--- owl carousel CSS-->
<link rel="stylesheet" href="/res/owlcarousel/css/owl.carousel.min.css">
<link rel="stylesheet" href="/res/owlcarousel/css/owl.theme.css">
<link rel="stylesheet" href="/res/owlcarousel/css/owl.theme.default.min.css">
<!-- Magnific Popup CSS -->
<link rel="stylesheet" href="/res/css/magnific-popup.css">
<!-- Slick CSS -->
<link rel="stylesheet" href="/res/css/slick.css">
<link rel="stylesheet" href="/res/css/slick-theme.css">
<!-- Style CSS -->
<link rel="stylesheet" href="/res/css/style.css">
<link rel="stylesheet" href="/res/css/responsive.css">

</head>

<body>

<!-- START HEADER -->
<header class="header_wrap">
    <div class="middle-header dark_skin">
    	<div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="/">
                    <img class="logo_light" src="/res/images/logo_light.png" alt="logo">
                    <img class="logo_dark" src="/res/images/logo_dark.png" alt="logo">
                </a>
                <!-- <div class="product_search_form radius_input search_form_btn">
                    <form>
                        <div class="input-group">
                            @csrf
                            <input class="form-control" placeholder="Search Product..." required="" type="text">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div> -->
                <ul class="navbar-nav attr-nav align-items-center">
                  @if (Route::has('login'))
                      @auth
                          @if(Auth::user()->Role === 'ADM')
                              <li><a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></li>
                          @elseif(Auth::user()->Role === 'USR')
                              <li><a href="{{ route('user.dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></li>
                          @endif
                      @else
                          <li><a href="{{ route('login') }}" class="nav-link"><i class="linearicons-user"></i></a></li>
                          <li><a href="{{ route('register') }}" class="nav-link"><i class="linearicons-users-plus"></i></a></li>
                      @endif
                  @endif
                    <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-toggle="dropdown"><span class="amount"><span class="currency_symbol">$</span>Cart</span></a>
                        <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                            <div class="cart_footer">
                                <p class="cart_buttons"><a href="/cart" class="btn btn-fill-line view-cart">View Cart</a><a href="/checkout" class="btn btn-fill-out checkout">Checkout</a></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <?php $categories1 = App\Models\Category::where('parent_id',1)->get(); ?>
    <?php $categories2 = App\Models\Category::where('parent_id',2)->get(); ?>

    <div class="bottom_header dark_skin main_menu_uppercase border-top">
    	<div class="container">
            <div class="row align-items-center">
            	<div class="col-lg-3 col-md-4 col-sm-6 col-3">
                	<div class="categories_wrap">
                        <button type="button" data-toggle="collapse" data-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                            <span>All Categories </span><i class="linearicons-menu"></i>
                        </button>
                        <div id="navCatContent" class="navbar collapse">
                            <ul>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-responsive"></i> <span>Gold</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                            @foreach($categories1 as $value)
                                                              <li><a class="dropdown-item nav-link nav_item" href="#">{{$value->name}}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="dropdown dropdown-mega-menu">
                                    <a class="dropdown-item nav-link dropdown-toggler" href="#" data-toggle="dropdown"><i class="flaticon-camera"></i> <span>Diamond</span></a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    <li class="mega-menu-col col-lg-6">
                                                        <ul>
                                                          @foreach($categories2 as $value)
                                                            <li><a class="dropdown-item nav-link nav_item" href="#">{{$value->name}}</a></li>
                                                          @endforeach
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                	<nav class="navbar navbar-expand-lg">
                    	<button class="navbar-toggler side_navbar_toggler" type="button" data-toggle="collapse" data-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:void(0);" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li><a class="nav-link nav_item" href="/">Home</a></li>
                                <li><a class="nav-link nav_item" href="/shop">Shop</a></li>
                                <li><a class="nav-link nav_item" href="/blog">Blog</a></li>
                                <li><a class="nav-link nav_item" href="/contact">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="contact_phone contact_support">
                            <i class="linearicons-phone-wave"></i>
                            <span>123-456-7689</span>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->

<!-- END MAIN CONTENT -->
<div class="main_content">
  @yield('content')
</div>
<!-- END MAIN CONTENT -->

<!-- START FOOTER -->
<footer class="bg_gray">
	<div class="footer_top small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="/res/images/logo_dark.png" alt="logo"/></a>
                        </div>
                        <p class="mb-3">If you are going to use of Lorem Ipsum need to be sure there isn't anything hidden of text</p>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>123 Street, Old Trafford, NewYork, USA</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">info@sitename.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>+ 457 789 789 65</p>
                            </li>
                        </ul>
                    </div>
        		</div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Location</a></li>
                            <li><a href="#">Affiliates</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                	<div class="widget">
                    	<h6 class="widget_title">Download App</h6>
                        <ul class="app_list">
                            <li><a href="#"><img src="/res/images/f1.png" alt="f1"/></a></li>
                            <li><a href="#"><img src="/res/images/f2.png" alt="f2"/></a></li>
                        </ul>
                    </div>
                	<div class="widget">
                    	<h6 class="widget_title">Social</h6>
                        <ul class="social_icons">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<!-- Latest jQuery -->
<script src="/res/js/jquery-1.12.4.min.js"></script>
<!-- popper min js -->
<script src="/res/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="/res/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="/res/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="/res/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="/res/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="/res/js/parallax.js"></script>
<!-- countdown js  -->
<script src="/res/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="/res/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="/res/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="/res/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="/res/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="/res/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="/res/js/scripts.js"></script>

</body>
</html>
