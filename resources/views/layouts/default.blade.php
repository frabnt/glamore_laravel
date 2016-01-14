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
					<a href="index.html">
						<img src={{ asset('assets/img/queenadmin-logo.png') }} alt="QueenAdmin Logo" />
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
							<img src={{ asset('assets/img/user-loggedin.png') }} alt="Sebastian" /><span class="name">Sebastian <i class="icon ion-ios-arrow-down"></i></span>
						</a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="#">
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
							<a href="{{URL::to('messages')}}" id="toggle-right-sidebar" class="toggle-right-sidebar"><i class="icon ion-ios-chatboxes-outline"></i>@include('messenger.unread-count')</a>
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
								<li class="active"><a href="index.html"><span class="text">Dashboard v1</span></a></li>
								<li><a href="index2.html"><span class="text">Dashboard v2</span></a></li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-paper-outline"></i><span class="text">Forms</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li><a href="form-fancy-elements.html"><span class="text">Fancy Elements</span></a></li>
								<li><a href="form-inplace-editing.html"><span class="text">In-place Editing</span></a></li>
								<li><a href="form-bootstrap-elements.html"><span class="text">Bootstrap Elements</span></a></li>
								<li><a href="form-layouts.html"><span class="text">Form Layouts</span></a></li>
								<li><a href="form-validations.html"><span class="text">Validation</span></a></li>
								<li><a href="form-upload.html"><span class="text">File Upload</span></a></li>
								<li><a href="form-text-editor.html"><span class="text">Text Editor</span></a></li>
								<li><a href="form-wizard.html"><span class="text">Wizards</span></a></li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-flask-outline"></i><span class="text">UI Elements</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li><a href="ui-elements-general.html"><span class="text">General</span></a></li>
								<li><a href="ui-elements-buttons.html"><span class="text">Buttons</span></a></li>
								<li><a href="ui-elements-tabs.html"><span class="text">Tabs</span></a></li>
								<li><a href="ui-elements-tour.html"><span class="text">Tour</span></a></li>
								<li><a href="ui-elements-icons.html"><span class="text">Icons</span></a></li>
							</ul>
						</li>
						<li><a href="widgets.html"><i class="icon ion-ios-color-wand-outline"></i><span class="text">Widgets</span></a></li>
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-copy-outline"></i><span class="text">Pages</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li><a href="page-projects.html"><span class="text">Projects</span></a></li>
								<li><a href="page-project-detail.html"><span class="text">Project Detail</span></a></li>
								<li><a href="page-user-profile.html"><span class="text">Profile</span></a></li>
								<li><a href="page-search-result.html"><span class="text">Search Result</span></a></li>
								<li><a href="page-inbox.html"><span class="text">Inbox</span><span class='badge bg-orange'>12</span></a></li>
								<li><a href="page-view-message.html"><span class="text">View Message</span></a></li>
								<li><a href="page-new-message.html"><span class="text">New Message</span></a></li>
								<li><a href="page-knowledgebase.html"><span class="text">Knowledge Base</span></a></li>
								<li><a href="page-submit-ticket.html"><span class="text">Submit Ticket</span></a></li>
								<li><a href="page-faq.html"><span class="text">FAQ</span></a></li>
								<li><a href="page-pricing-tables.html"><span class="text">Pricing Tables</span></a></li>
								<li><a href="page-invoice.html"><span class="text">Invoice</span></a></li>
								<li><a href="page-register.html"><span class="text">Register</span></a></li>
								<li><a href="page-login.html"><span class="text">Login</span></a></li>
								<li><a href="page-login-alt.html"><span class="text">Login Alt.</span></a></li>
								<li><a href="page-404.html"><span class="text">Not Found 404</span></a></li>
								<li><a href="page-505.html"><span class="text">Error 505</span></a></li>
								<li><a href="page-blank.html"><span class="text">Blank Page</span></a></li>
							</ul>
						</li>
					</ul>
					<h3>ESSENTIALS</h3>
					<ul class="main-menu">
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-pie-outline"></i><span class="text">Charts</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li class="active"><a href="charts-basic.html"><span class="text">Basic</span></a></li>
								<li><a href="charts-interactive.html"><span class="text">Interactive Charts</span></a></li>
							</ul>
						</li>
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-ios-grid-view-outline"></i><span class="text">Tables</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li class="active"><a href="tables-static.html"><span class="text">Static Table</span></a></li>
								<li><a href="tables-dynamic.html"><span class="text">Dynamic Table</span></a></li>
							</ul>
						</li>
						<li><a href="maps.html"><i class="icon ion-ios-world-outline"></i><span class="text">Maps</span></a></li>
						<li><a href="typography.html"><i class="icon ion-ios-compose-outline"></i><span class="text">Typography</span></a></li>
						<li class="has-submenu">
							<a href="#" class="submenu-toggle"><i class="icon ion-navicon"></i><span class="text">Menu Levels</span></a>
							<ul class="list-unstyled sub-menu collapse">
								<li class="has-submenu">
									<a href="#" class="submenu-toggle"><span class="text">Second Lvl A</span></a>
									<ul class="list-unstyled sub-menu collapse">
										<li><a href="#"><span class="text">Third Lvl A1</span></a></li>
										<li><a href="#"><span class="text">Third Lvl A2</span></a></li>
										<li><a href="#"><span class="text">Third Lvl A3</span></a></li>
									</ul>
								</li>
								<li><a href="#"><span class="text">Second Lvl B</span></a></li>
								<li><a href="#"><span class="text">Second Lvl C</span></a></li>
								<li><a href="#"><span class="text">Second Lvl D</span></a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END COLUMN LEFT -->

		
		<!-- COLUMN RIGHT -->
		<div id="col-right" class="col-right ">
			
			<!-- Content -->
            @yield('content')

			<div class="right-sidebar">

			</div>
		</div>
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
	
</body>

</html>
