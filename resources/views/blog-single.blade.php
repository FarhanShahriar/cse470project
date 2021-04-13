@extends('GuestLayout')
@section('content')
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Blog Single post</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">Blog Single post</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
    	<div class="row">
        	<div class="col-xl-9">
            	<div class="single_post">
                	<h2 class="blog_title">{{$blogitem->title}}</h2>
                    <ul class="list_none blog_meta">
                        <li><a href="#"><i class="ti-calendar"></i> {{$blogitem->created_at}}</a></li>
                        <li><a href="#"><i class="ti-user"></i> {{$blogitem->author}}</a></li>
                    </ul>
                    <div class="blog_img">
                        <img src="{{$blogitem->image}}" alt="blog_img1">
                    </div>
                    <div class="blog_content">
                        <div class="blog_text">
                            <p>{{$blogitem->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->
@endsection
