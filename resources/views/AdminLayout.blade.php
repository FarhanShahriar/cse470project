<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title>cse470project</title>
  <style media="screen">
  /* The sidebar menu */
      .sidenav {
      height: 100%; /* Full-height: remove this if you want "auto" height */
      width: 160px; /* Set the width of the sidebar */
      position: fixed; /* Fixed Sidebar (stay in place on scroll) */
      z-index: 1; /* Stay on top */
      top: 0; /* Stay at the top */
      left: 0;
      background-color: #111; /* Black */
      overflow-x: hidden; /* Disable horizontal scroll */
      padding-top: 20px;
      }

      /* The navigation menu links */
      .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
      }

      /* When you mouse over the navigation links, change their color */
      .sidenav a:hover {
      color: #f1f1f1;
      }

      /* Style page content */
      .main {
      margin-left: 160px; /* Same as the width of the sidebar */
      padding: 0px 10px;
      }

      /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
      @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
      }
  </style>
</head>

<body>

<section id="container" >
    <div class="sidenav">
      <a href="/">Home</a>
      <a href="/admin/products">Products</a>
      <a href="/admin/categories">Categories</a>
      <a href="/admin/users">Users</a>
      <a href="/admin/orders">Orders</a>
      <a href="/admin/blogs">Blogs</a>
      <form method="POST" action="{{ route('logout') }}">
          @csrf
          <a class="logout" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                          this.closest('form').submit();">
              {{ __('Logout') }}
          </a>
      </form>
    </div>

    <div class="main">
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  @yield('content')
              </div>
          </section>
      </section>

      <!--main content end-->
    </div>

</section>

</body>
