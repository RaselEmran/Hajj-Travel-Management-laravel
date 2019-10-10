<nav class="navbar top-navbar navbar-expand-md navbar-dark">
	<!-- ============================================================== -->
	<!-- Logo -->
	<!-- ============================================================== -->
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ route('admin.dashboard') }}">
			<!-- Logo icon -->
			<b>
				<!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
				<!-- Dark Logo icon -->

				{{-- <img src="{{asset('assets/images/logo-icon.png')}}" alt="homepage" class="dark-logo" /> --}}
				<!-- Light Logo icon -->
				{{-- <img src="{{asset('assets/images/logo-light-icon.png')}}" alt="homepage" class="light-logo" /> --}}
			</b>
			<!--End Logo icon -->
			<!-- Logo text --><span>
				<!-- dark Logo text -->
				{{-- <img src="{{asset('assets/images/logo-text.png')}}" alt="homepage" class="dark-logo" /> --}}
				<!-- Light Logo text -->    
				{!! getLogo() !!} 
			</a>
		</div>
		<!-- ============================================================== -->
		<!-- End Logo -->
		<!-- ============================================================== -->
		<div class="navbar-collapse">
			<!-- ============================================================== -->
			<!-- toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav mr-auto">
				<!-- This is  -->
				<li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light" href="javascript:void(0)"><i class="ti-menu"></i></a></li>

				<div class="digital-clock">00:00:00</div>
				<!-- ============================================================== -->
				<!-- Comment -->
				<!-- ============================================================== -->

				<!-- ============================================================== -->
				<!-- End Comment -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Messages -->
				<!-- ============================================================== -->

				<!-- ============================================================== -->
				<!-- End Messages -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Search -->
				<!-- ============================================================== -->

			</ul>
			<ul class="navbar-nav my-lg-0">
				<!-- ============================================================== -->
				<!-- mega menu -->
				<!-- ============================================================== -->
				<li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle waves-effect waves-dark" href="{{ route('home') }}" target="_blank"><i class="ti-layout-width-default"></i></a>
					
				</li>
				<!-- ============================================================== -->
				<!-- End mega menu -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- User profile and search -->
				<!-- ============================================================== -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{auth()->user()->image ?asset('/storage/user/photo/' . auth()->user()->image):asset('assets/images/users/1.jpg')}}" alt="user" class="img-circle" width="30"></a>
					<div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
						<span class="with-arrow"><span class="bg-primary"></span></span>
						<div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
							<div class=""><img src="{{auth()->user()->image ?asset('/storage/user/photo/' . auth()->user()->image):asset('assets/images/users/1.jpg')}}" alt="user" class="img-circle" width="60"></div>
							<div class="m-l-10">
								<h4 class="m-b-0">{{auth()->user()->first_name?auth()->user()->first_name.' '. auth()->user()->last_name:'Steave Jobs'}}</h4>
								<p class=" m-b-0"><a href="https://www.wrappixel.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8ef8effcfbe0cee9e3efe7e2a0ede1e3">[{{auth()->user()->name?auth()->user()->name:'Admin'}}]</a></p>
							</div>
						</div>
						<a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>

						<div class="dropdown-divider"></div>

						<a class="dropdown-item" href="" id="logout" data-url='{{ route('admin.logout') }}'><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
						<div class="dropdown-divider"></div>

					</div>
				</li>
				<!-- ============================================================== -->
				<!-- User profile and search -->
				<!-- ============================================================== -->

			</ul>
		</div>
	</nav>

