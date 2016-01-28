<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
	<title>Register | QueenAdmin - Beautiful Admin Dashboard</title>
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
	<link rel="apple-touch-icon-precomposed" type="image/png" sizes="144x144" href="assets/ico/queenadmin-favicon144x144.png">
	<link rel="apple-touch-icon-precomposed" type="image/png" sizes="114x114" href="assets/ico/queenadmin-favicon114x114.png">
	<link rel="apple-touch-icon-precomposed" type="image/png" sizes="72x72" href="assets/ico/queenadmin-favicon72x72.png">
	<link rel="apple-touch-icon-precomposed" type="image/png" sizes="57x57" href="assets/ico/queenadmin-favicon57x57.png">
	<link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>

<body class="middle-content page-register">
	<div class="container-fluid">
		<div class="content-box-bordered register-box">
			<h1>Create an account</h1>
			<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
			{!! csrf_field() !!}
				<div class="form-group">
					<label for="name" class="control-label sr-only">Name</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-person"></i></span>
							<input type="text" class="form-control" id="username" placeholder="Name" name="name" value="{{ old('name') }}">
						</div>
						 @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                         @endif
					</div>
				</div>
				<div class="form-group">
					<label for="last_name" class="control-label sr-only">Last Name</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-person"></i></span>
							<input type="text" class="form-control" id="last_name" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
						</div>
						 @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                         @endif
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label sr-only">Email</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-email"></i></span>
							<input type="email" class="form-control" id="email" placeholder="Email" value="{{ old('email') }}" name="email">
						</div>
						@if ($errors->has('email'))
						    <span class="help-block">
						        <strong>{{ $errors->first('email') }}</strong>
						    </span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="password" class="control-label sr-only">Password</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-locked"></i></span>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						</div>
						@if ($errors->has('password'))
						    <span class="help-block">
						        <strong>{{ $errors->first('password') }}</strong>
						    </span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<label for="password2" class="control-label sr-only">Repeat Password</label>
					<div class="col-sm-12">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon ion-locked"></i></span>
							<input type="password" class="form-control" id="password2" placeholder="Repeat Password" name="password_confirmation">
						</div>
						@if ($errors->has('password_confirmation'))
						    <span class="help-block">
						        <strong>{{ $errors->first('password_confirmation') }}</strong>
						    </span>
						@endif
					</div>
				</div>
				<div class="form-group">
					<!-- <div class="col-sm-12">
						<label class="fancy-checkbox">
							<input type="checkbox">
							<span>Subscribe me to the newsletter</span>
						</label>
					</div> -->
					<div class="col-sm-12">
						<label class="fancy-checkbox">
							<input type="checkbox" name="terms_agreement" id="terms_agreement">
							<span>I accept the <a href="#" data-toggle="modal" >Terms &amp; Agreement</a></span>
						</label>
						<strong>{{ $errors->first('terms_agreement') }}</strong>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-success btn-block"><i class="icon ion-checkmark-circled"></i> Create Account</button>
					</div>
				</div>
			</form>
			<p><em>Already have an account?</em> <a href="{{ url('/login') }}"><strong>Login</strong></a></p>
		</div>
	</div>
	<!-- Javascript -->
	<script src="assets/js/jquery/jquery-2.1.0.min.js"></script>
	<script src="assets/js/bootstrap/bootstrap.js"></script>
	<script src="assets/js/queen-form-layouts.js"></script>
</body>

</html>
