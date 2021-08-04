<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Saigon Bakery</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ ('assets/images/favicon.ico') }}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/flexslider.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ ('assets/css/color-01.css') }}">

	@livewireStyles
</head>

<body class="home-page home-01">

	<!-- mobile menu -->
	<div class="mercado-clone-wrap">
		<div class="mercado-panels-actions-wrap">
			<a class="mercado-close-btn mercado-close-panels" href="#">x</a>
		</div>
		<div class="mercado-panels"></div>
	</div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item">
									<a title="Food with heart. Made with care." href="#"><i class="fa fa-quote-left" aria-hidden="true"></i> Food With Heart. Made With Care.</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								
								@if(Route::has('login'))
									@auth
										@if(Auth::user()->utype === 'ADM')
											<li class="menu-item menu-item-has-children parent">
												<a title="My Acount" href="#"><i class="fa fa-user-secret" aria-hidden="true"></i> {{Auth::user()->name}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency">
													<li class="menu-item">
														<a title="Dashboard" href="{{route('admin.dashboard')}}">Dashboard</a>
													</li>
													<li class="menu-item">
														<a title="All Order" href="/orders">All Order</a>
													</li>
													<li class="menu-item">
														<a title="All Coupon" href="{{url('coupons')}}">All Coupon</a>
													</li>
													<li class="menu-item">
														<a title="All Product" href="{{url('admin/product/view')}}">All Product</a>
													</li>
													<li class="menu-item">
														<a title="All Category" href="{{url('admin/category/view')}}">All Category</a>
													</li>
													<li class="menu-item">
														<a title="All User" href="{{url('admin/user/list')}}">All User</a>
													</li>
													<li class="menu-item">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}">
														@csrf
													</form>
												</ul>
											</li>
										@else
											<li class="menu-item menu-item-has-children parent">
												<a title="My Acount" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> {{Auth::user()->name}} <i class="fa fa-angle-down" aria-hidden="true"></i></a>
												<ul class="submenu curency">
													<li class="menu-item">
														<a title="My Profile" href="{{url('user/profile/view')}}">My Profile</a>
													</li>
													<li class="menu-item">
														<a title="My Orders" href="userorder">My Orders</a>
													</li>
													<li class="menu-item">
														<a title="Change Password" href="{{route('userchangepassword')}}">Change Password</a>
													</li>
													<li class="menu-item">
														<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
													</li>
													<form id="logout-form" method="POST" action="{{route('logout')}}">
														@csrf
													</form>
												</ul>
											</li>
										@endif
									@else
										<li class="menu-item"><a title="Register or Login" href="{{route('login')}}">Login</a></li>
										<li class="menu-item"><a title="Register or Login" href="{{route('register')}}">Register</a></li>
									@endif
								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="/" class="link-to-home"><img src="{{ asset('assets/images/bakerysg.png') }}" alt="mercado"></a>
						</div>

						<div class="wrap-search center-section">
							{{-- <div class="wrap-search-form">
								<form action="#" id="form-search-top" name="form-search-top">
									<input type="text" name="search" value="" placeholder="Search here...">
									<button form="form-search-top" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
									<div class="wrap-list-cate">
										<input type="hidden" name="product-cate" value="0" id="product-cate">
										<a href="#" class="link-control">All Category</a>
										<ul class="list-category">
												@foreach ($categories as $category)                    
												<li class="category-item">
													<a href="{{ route('product.category',['category_slug'=>$category->slug]) }}" class="cate-link">{{ $category ->name }}</a>
												</li>
												@endforeach
											</ul>
									</div>
								</form>
							</div> --}}
						</div>

						<div class="wrap-icon right-section">
							@livewire('wishlist-count-component')

							@livewire('cart-count-component')
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					{{-- <div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div> --}}

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								{{-- <li class="menu-item">
									<a href="about-us.html" class="link-term mercado-item-title">About Us</a>
								</li> --}}
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Checkout</a>
								</li>
								{{-- <li class="menu-item">
									<a href="contact-us.html" class="link-term mercado-item-title">Contact Us</a>
								</li>																	 --}}
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	{{ $slot }}

	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">
			<!--Function info-->
			<div class="wrap-function-info">
				<div class="container">
					<ul>
						<li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over $99</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-cutlery" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Delivery</h4>
								<p class="fc-desc">30 Days Money Back</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Safe Payment</h4>
								<p class="fc-desc">Safe your online payment</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Online Suport</h4>
								<p class="fc-desc">We Have Support 24/7</p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			<div class="main-footer-content">

				<div class="container">

					<div class="row">
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<a href="/" class="link-to-home"><img src="{{ asset('assets/images/bakerysg.png') }}" alt="mercado"></a>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Contact Details</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">590 Cach Mang Thang 8 TpHCM</p>
											</li>
											<li>
												<p class="contact-txt"><i class="fa fa-phone-square" aria-hidden="true"></i> 0650 123 456</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">SaigonBakery@gmail.com</p>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Opening Times</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li class="menu-item"><a href="#" class="link-term"><i class="fa fa-clock-o" aria-hidden="true"></i> From 8:00 AM</a></li>
												<li class="menu-item"><a href="#" class="link-term"><i class="fa fa-clock-o" aria-hidden="true"></i> To 20:00 PM</a></li>
											</ul>
										</div>
									</div>
								</div>

								{{-- <div class="wrap-footer-item twin-item">
									<h3 class="item-header">Follow our's work</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav">
											<ul>
												<li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<span class="menu-item"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></span>
											</ul>
										</div>
									</div>
								</div> --}}

								<div class="wrap-footer-item twin-item">
									<h3 class="item-header">Social network</h3>
									<div class="item-content">
										<div class="wrap-list-item social-network">
											<ul>
												<li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#" class="link-to-item" title="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>

							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</footer>


	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>
	<!-- <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script> -->
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.autoplay.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	@livewireScripts
</body>

</html>