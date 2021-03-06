<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Log In Alt | QueenAdmin - Beautiful Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="description" content="QueenAdmin - Beautiful Bootstrap Admin Dashboard Theme">
	<meta name="author" content="The Develovers">
	<!-- CSS -->
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/ionicons.css" rel="stylesheet" type="text/css">
	<link href="assets/css/main.css" rel="stylesheet" type="text/css">
	<!-- Google Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,300,400,700' rel='stylesheet' type='text/css'>
	<!-- Fav and touch icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/queenadmin-favicon144x144.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/queenadmin-favicon114x114.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/queenadmin-favicon72x72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="assets/ico/queenadmin-favicon57x57.png">
	<link rel="shortcut icon" href="assets/ico/favicon.png">
</head>

<body class="middle-content page-login-social">
	<div class="container-fluid">
		<div class="content-box-bordered login-box box-with-help">
			<h1>Log in to your account</h1>
			<form id="form_data" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
			{!! csrf_field() !!}
				<div class="form-group">
					<label for="inputEmail3b" class="control-label sr-only">Email</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-email"></i></span>
							<input id="username" type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail3b" placeholder="Email">
							
						</div>
						@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3b" class="control-label sr-only">Password</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-locked"></i></span>
							<input id="password" type="password" class="form-control" id="inputPassword3b" placeholder="Password" name="password">                              
						</div>
						 @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<label class="fancy-checkbox">
							<input type="checkbox" name="remember">
							<span>Remember me</span>
						</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-7">
						<button id="submit" type="submit" class="btn btn-success btn-block">Sign in</button>
					</div>
					<div class="col-md-5 text-right">
						<a href="{{ url('/password/reset') }}"><em>forgot password?</em></a>
					</div>
				</div>
			</form>
			<p><em>Don't have an account yet?</em> <a href="{{ url('/register') }}"><strong>Sign Up</strong></a></p>
			<button type="button" class="btn btn-link btn-login-help"><i class="icon ion-help-circled"></i></button>
		</div>
		<div class="login-separator text-center"><span>or sign up with</span></div>
		<div class="text-center">
			<a class="btn btn-login-social btn-login-facebook" href="{{ route('social.login', ['facebook']) }}">Facebook</a>
			<a class="btn btn-login-social btn-login-twitter" href="{{ route('social.login', ['twitter']) }}">Twitter</a>
			<a class="btn btn-login-social btn-login-googleplus" href="{{ route('social.login', ['google']) }}">Google</a>
		</div>
	</div>
	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.js"></script>
	<script src="assets/js/queen-form-layouts.js"></script>

</body>


</html>
