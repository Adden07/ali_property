<!DOCTYPE html>
<html>
<head>
	<title>{{ $title ?? 'home' }} - {{ cache()->get('site_settings')['site_name'] ?? config('app.name') }}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- App favicon -->
	<link href="{{ check_file($site_settings['favicon']) }}" sizes="128x128" rel="shortcut icon" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/bootstrap.css') }}">
	<!-- <link rel="stylesheet" href="{{ asset('front_assets/css/owl.carousel.min.css') }}"> -->
	<link rel="stylesheet" href="{{ asset('front_assets/css/slick.css') }}" />
	<link rel="stylesheet" href="{{ asset('front_assets/css/slick-theme.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Inter:wght@300;400;500;600;700;800;900&family=Nunito+Sans:wght@400;600;700&family=Poppins:wght@400;500;600&family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.rateit/1.1.5/rateit.min.css" integrity="sha512-VtezewVucCf4f8ZUJWzF1Pa0kLqPwpbLU/+6ocHmUWaoPqAH9F8gKmPkVYzu2wGWQs6DYuPxijbBfti7B+46FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="{{ asset('front_assets/css/style.css') }}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body>
	<div id="preloader" class="preloader">
		<div id="status">
		  <div class="spinner"></div>
		  <div class="text">Loading...</div>
		</div>
	  </div>
	<section class="nav_main fixed-top">
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg bg-body-tertiary">

				<a class="navbar-brand" href="{{ route('fronts.home') }}">
					<!-- <img src="{{ @check_file($site_settings['header_logo']) }}" alt="Rayymeem"> -->
					<img src="https://incubatist.com/demo/alipropertyadvisor/design/images/logo.png" alt="Ali Property">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar">
					<!-- <ul class="navbar-nav my-2 my-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="{{ route('fronts.home') }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('fronts.travel_tourisam') }}">Travel & Tourism</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('fronts.it_solutions') }}">IT Solutions</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{ route('fronts.support') }}">Support</a>
						</li>
					</ul> -->
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" aria-current="page" href="javascript:void(0)">BUY</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">SELL</a>
						</li>
						
						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">RENT</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="javascript:void(0)">AGENTS</a>
						</li>

						<li class="nav-item">
							<a class="nav-link" href="{{ route('fronts.contact_us') }}">CONTACT</a>
						</li>
					</ul>
					<div class="account d-flex ms-auto">
						@guest('web')
							<a href="{{ route('users.login_form') }}" class="text-white" id="login">Login</a>
							<a href="{{ route('users.registration_form') }}" class="text-white" id="signup">Signup</a>
						@endif
						@auth('web')
							<div class="dropdown">
								<button class="btn dropdown-toggle signup_btn text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									{{ auth('web')->user()->full_name }}
								</button>
								<ul class="dropdown-menu p-0">
									<li><a class="dropdown-item m-0" href="{{ route('users.dashboard') }}">Dashboard</a></li>
									<li>
										<button class="dropdown-item m-0" data-url="{{ route('users.logout') }}" onclick="ajaxRequest(this)">Logout</button>
									</li>
								</ul>
							</div>
						@endauth
					</div>
				</div>
				<button class="btn country-select"><img src="{{ asset('front_assets/imgs/united-states.png') }}" class="me-2">USA</button>
			</nav>
		</div>
	</section>

	@yield('content')

	<section class="footer">
		<div class="container-fluid">
			<div class="row footer-sections pb-5">
				<div class="col-md-3">
					<!-- <h2><img src="{{ @check_file($site_settings['footer_logo']) }}" alt="Rayymeem" /></h2> -->
					<h2><img src="https://incubatist.com/demo/alipropertyadvisor/design/images/logo.png" alt="Ali Property" /></h2>
					<!-- <p>{{ @$site_settings['short_desc'] }}</p> -->
					<p>Committed to delivering a high level of expertise, customer service, and attention to detail to the.</p>

					<h6>Head Office</h6>

					<span class="contact-details d-flex mb-2">
						<div>
							<img src="{{ asset('front_assets/imgs/MapPinLine-2.png')}}" class="me-2">
						</div>
						<div>
							<p>Pearl One, 11-B/I, MM Alam Road, Gulberg III, Lahore, Pakistan</p>
						</div>
					</span>

					<span class="contact-details d-flex mb-2">
						<img src="{{ asset('front_assets/imgs/PhoneCall-2.png') }}" class="me-2">
						<p>{{ @$site_settings['contact_no'] }}</p>
					</span>
					<span class="contact-details d-flex">
						<img src="{{ asset('front_assets/imgs/EnvelopeSimple-2.png') }}" class="me-2">
						<p>{{ @$site_settings['email'] }}</p>
					</span>

				</div>
				<div class="col-md-3">
					<h6>ABOUT</h6>
					<ul>
						<li><a href="javascript:void(0)">Managed IT Services</a></li>
						<li><a href="javascript:void(0)">IT Consulting</a></li>
						<li><a href="javascript:void(0)">Cybersecurity</a></li>
						<li><a href="javascript:void(0)">Cloud Solutions</a></li>
						<li><a href="javascript:void(0)">Software</a></li>
						<!-- <li><a href="javascript:void(0)">Design</a></li> -->
					</ul>
				</div>
				<div class="col-md-3">
					<h6>PARTNERSHIPS</h6>
					<ul>
						<li><a href="{{ route('fronts.vendor_signup_form') }}">Vendor Sign Up</a></li>
						<li><a href="javascript:void(0)">Vendor Log In</a></li>
						<li><a href="{{ route('fronts.affiliate_partnership') }}">Affiliate Partnership</a></li>
						<li><a href="{{ route('users.login_form') }}">User Login</a></li>
						<li><a href="{{ route('users.registration_form') }}">User Sign Up</a></li>
						<!-- <li><a href="javascript:void(0)"></a></li> -->
						<!-- <li><a href="javascript:void(0)">Visiting Friends & Relatives</a></li> -->
					</ul>
				</div>
				<div class="col-md-3">
					<h6>Newsletter</h6>
					<form action="{{ route('fronts.newsletter') }}" class="mb-3 ajaxForm" method="POST">
						@csrf
						<input type="email" name="email" placeholder="Email Address" class="form-control">
						<button type="submit">
							<img src="{{ asset('front_assets/imgs/arrow-form.png') }}">
						</button>
					</form>
					<span class="mt-4">
						<a href="{{ @$site_settings['facebook_link'] }}"><img src="{{ asset('front_assets/imgs/facebook.png') }}" class="mx-3"></a>
						<a href="{{ @$site_settings['instagram_link'] }}"><img src="{{ asset('front_assets/imgs/linkedin.png') }}" class="mx-3"></a>
						<a href="{{ @$site_settings['twitter_link'] }}"><img src="{{ asset('front_assets/imgs/twitter.png') }}" class="mx-3"></a>
						<a href="{{ @$site_settings['youtube_link'] }}"><img src="{{ asset('front_assets/imgs/youtube.png') }}" class="mx-3"></a>
					</span>

					<!-- <h6 class="mt-4">Payment Methods</h6>

					<span>
						<img src="{{ asset('front_assets/imgs/payments.png') }}" class="mt-2 img-fluid">
					</span> -->

				</div>


			</div>


		</div>
		<div class="copyright container-fluid">
			<div class="row">
				<div class="col-md-6 rights">
					<p class="text-white">&copy; <?php echo date('Y'); ?> All Right Reserved | Designed by Gexton Inc</p>
				</div>
				<div class="col-md-6 links">
					<p>
						<a href="{{ route('fronts.term_of_use') }}" class="text-white text-decoration-none">Terms Of Use</a>
						|
						<a href="{{ route('fronts.privacy_policy') }}" class="text-white text-decoration-none">Privacy Policy</a>
					</p>
				</div>
			</div>
		</div>
	</section>
	<script src="{{ asset('front_assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('front_assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('front_assets/js/slick.min.js') }}"></script>
	<script src="{{ asset('front_assets/js/popper.min.js') }}"></script>
	<!-- <script src="{{ asset('front_assets/js/owl.carousel.min.js') }}"></script> -->
	<script src="{{ asset('front_assets/js/main.js') }}"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
	<script src="{{ get_asset('admin_assets') }}/js/custom.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.rateit/1.1.5/jquery.rateit.min.js" integrity="sha512-ttBgr7TNuS+00BFNY+TkWU9chna3buySaRKoA9IMmk+ueesPbUfyEsWdn5mrXB+cG+ziRdEXMHmsJjGmzBZJYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script>
		$(window).on("load", function(){
			page_loader('hide');
		});

		$(document).ready(function(){//set select 2
            $('.select_2_class').select2({
				placeholder: "Select a state",
    			allowClear: true
			});
        });
	</script>
	@yield('script')
</body>

</html>