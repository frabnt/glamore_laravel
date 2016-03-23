<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>
	@section('title')
	Dashboard Glamore
	@show
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="Glamore project">
	<meta name="author" content="Triweb">
	<!-- CSS -->
	<link href={{ asset('assets/css/bootstrap.css') }} rel="stylesheet" type="text/css">
	<link href={{ asset('assets/css/ionicons.css') }} rel="stylesheet" type="text/css">
	<link href={{ asset('assets/css/main.css') }} rel="stylesheet" type="text/css">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,700' rel='stylesheet' type='text/css'>
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href={{ asset('assets/ico/queenadmin-favicon144x144.png') }}>
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href={{ asset('assets/ico/queenadmin-favicon114x114.png') }}>
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href={{ asset('assets/ico/queenadmin-favicon72x72.png') }}>
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href={{ asset('assets/ico/queenadmin-favicon57x57.png') }}>
	<link rel="shortcut icon" href={{ asset('assets/ico/favicon.png') }}>
	@yield('header')
</head>

<body class="fixed-top-active dashboard">
	<!-- WRAPPER -->
	<div class="wrapper">
		<!-- TOP NAV BAR -->
		<nav class="top-bar navbar-fixed-top" role="navigation">
			<div class="logo-area">
				<a href="#" id="btn-nav-sidebar-minified" class="btn btn-link btn-nav-sidebar-minified pull-left"><i class="icon ion-arrow-swap"></i></a>
				<a class="btn btn-link btn-off-canvas pull-left"><i class="icon ion-navicon"></i></a>
				<div class="logo pull-left">
					<a href="{{URL::to('home')}}">
						<img src={{ asset('assets/img/logos_glamore_big.png') }} alt="Glamore Logo" />
					</a>
				</div>
			</div>
			<form class="form-inline searchbox hidden-xs" role="form">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="icon ion-ios-search"></i></span>
						<input type="search" class="form-control" placeholder="search the site ...">
					</div>
				</div>
			</form>
			<div class="top-bar-right pull-right">
				<div class="action-group hidden-xs hidden-sm">
					<ul>

						<!-- notification: general -->
						<li class="action-item general">
							<div class="btn-group">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon ion-ios-bell-outline"></i><span class="count">8</span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li class="menu-item-header">You have 8 notifications</li>
									<li>
										<a href="#">
											<i class="icon ion-chatbubble text-success"></i>
											<span class="text">New comment on the blog post</span>
											<span class="timestamp text-muted">1 minute ago</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-person-add text-success"></i>
											<span class="text">New registered user</span>
											<span class="timestamp text-muted">12 minutes ago</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-chatbubble text-success"></i>
											<span class="text">New comment on the blog post</span>
											<span class="timestamp text-muted">18 minutes ago</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-ios-cart text-danger"></i>
											<span class="text">4 new sales order</span>
											<span class="timestamp text-muted">4 hours ago</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-edit yellow-font"></i>
											<span class="text">3 product reviews awaiting moderation</span>
											<span class="timestamp text-muted">1 day ago</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-chatbubble text-success"></i>
											<span class="text">New comment on the blog post</span>
											<span class="timestamp text-muted">3 days ago</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-chatbubble text-success"></i>
											<span class="text">New comment on the blog post</span>
											<span class="timestamp text-muted">Oct 15</span>
										</a>
									</li>
									<li>
										<a href="#">
											<i class="icon ion-alert-circled text-danger"></i>
											<span class="text text-danger">Low disk space!</span>
											<span class="timestamp text-muted">Oct 11</span>
										</a>
									</li>
									<li class="menu-item-footer">
										<a href="#">View All Notifications</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- end notification: general -->
					</ul>
				</div>
				<div class="logged-user">
					<div class="btn-group">
						<a href="#" class="btn btn-link dropdown-toggle" data-toggle="dropdown">
							<!-- <img src={{ asset('assets/img/user-loggedin.png') }} alt="Sebastian" /><span class="name">{{ isset(Auth::user()->name) ? Auth::user()->name:'Not logged'}} <i class="icon ion-ios-arrow-down"></i></span> -->
							<img style="height:32px;" src="{{ asset('/assets/upload/img/user')}}/{{ isset(Auth::user()->profile_image) ? Auth::user()->profile_image:'avatar.png'}}" alt="Sebastian" /><span class="name">{{ isset(Auth::user()->name) ? Auth::user()->name:'Not logged'}} <i class="icon ion-ios-arrow-down"></i></span>
																														
						</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{URL::to('user')}}/{{ isset(Auth::user()->id) ? Auth::user()->id:0}}">
									<i class="icon ion-ios-person"></i>
									<span class="text">Profile</span>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon ion-ios-gear"></i>
									<span class="text">Settings</span>
								</a>
							</li>
							<li>
								<a href="{{ url('/logout') }}">
									<i class="icon ion-power"></i>
									<span >Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="action-group visible-lg-inline-block">
					<ul>
						<li class="action-item chat">
							<a href="#{{--URL::to('messages')--}}" id="toggle-right-sidebar" class="toggle-right-sidebar"><i class="icon ion-ios-chatboxes-outline"></i>{{--@include('messenger.unread-count')--}}</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END TOP NAV BAR -->
		<!-- COLUMN LEFT -->
		<div id="col-left" class="col-left">
			<div class="main-nav-wrapper">
				<nav id="main-nav" class="main-nav">
					<h3>MAIN</h3>
					<ul class="main-menu">
						<li class="has-submenu active">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-speedometer-outline"></i><span class="text">Dashboards</span></a>
							<ul class="list-unstyled sub-menu collapse in">
								<li class="active"><a href="{{URL::to('home')}}"><span class="text">Dashboard</span></a></li>
								<li><a href="#"><span class="text">Next meetings</span></a></li>
								<li><a href="#"><span class="text">Task to do</span></a></li>
								<li><a href="#"><span class="text">Card of the last project</span></a></li>
								<li><a href="#"><span class="text">Chart of earnings</span></a></li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-paper-outline"></i><span class="text">Projects</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li><a href="{{ url('/my-project') }}/{!! auth()->user()->id !!}"><span class="text">Post a project</span></a></li>
								<li><a href="#"><span class="text">Activities (task/meeting/call)</span></a></li>
								<li><a href="#"><span class="text">Documents and note</span></a></li>
								<li><a href="#"><span class="text">Videoconference</span></a></li>
							</ul>
						</li>



						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-person"></i><span class="text">Affiliates</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li><a href="#"><span class="text">BIO Affiliate</span></a></li>
								<li><a href="{{ url('/search-for-affiliate') }}"><span class="text">Search for Affiliate</span></a></li>
								<li><a href="#"><span class="text">Activities diary</span></a></li>
								<li><a href="#"><span class="text">Search and join projects</span></a></li>
							</ul>
						</li>

						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-stats-bars"></i><span class="text">Reports</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li><a href="#"><span class="text">payments received</span></a></li>
								<li><a href="#"><span class="text">summary of earnings</span></a></li>
								<li><a href="#"><span class="text">details of tax</span></a></li>
								<li><a href="#"><span class="text">invoice and remittance</span></a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END COLUMN LEFT -->

		
		<!-- COLUMN RIGHT -->
		
			
			<!-- Content -->
            @yield('content')

			
		
		<!-- END COLUMN RIGHT -->
	</div>
	@yield('footer')

	<!-- END WRAPPER -->
	<!-- Javascript -->

	@section('footer_script')
	<script src={{ asset('assets/js/jquery/jquery-2.1.0.min.js') }}></script>
	<script src={{ asset('assets/js/bootstrap/bootstrap.js') }}></script>
	<script src={{ asset('assets/js/plugins/bootstrap-multiselect/bootstrap-multiselect.js') }}></script>
	<script src={{ asset('assets/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}></script>
	<script src={{ asset('assets/js/queen-common.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.resize.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.time.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.orderBars.js') }}></script>
	<script src={{ asset('assets/js/plugins/stat/flot/jquery.flot.tooltip.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/mapael/raphael/raphael-min.js') }}></script>
	<script src={{ asset('assets/js/plugins/mapael/jquery.mapael.js') }}></script>
	<script src={{ asset('assets/js/plugins/mapael/maps/world_countries.js') }}></script>
	<script src={{ asset('assets/js/plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/moment/moment.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/bootstrap-editable/bootstrap-editable.min.js') }}></script>
	<script src={{ asset('assets/js/plugins/jquery-maskedinput/jquery.masked-input.min.js') }}></script>
	<script src={{ asset('assets/js/queen-charts.js') }}></script>
	<script src={{ asset('assets/js/queen-maps.js') }}></script>
	<script src={{ asset('assets/js/queen-elements.js') }}></script>
	@show
	
    @yield('script')


	
</body>

</html>
