<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" lang="en" class="no-js"> <![endif]-->
<!--[if !(IE)]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->

<head>
    <title>Glamore</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="QueenAdmin - Beautiful Bootstrap Admin Dashboard Theme">
    <meta name="author" content="The Develovers">
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
</head>

<body class="middle-content page-login-social">
    <div class="container-fluid">
                  
        <div class="content-box-bordered login-box box-with-help">
            <h1>Reset password</h1>

              @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
           
           <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
               {!! csrf_field() !!}
                <div class="form-group">
                    <label for="inputEmail3b" class="control-label sr-only">Email</label>
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-email"></i></span>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="inputEmail3b" placeholder="Email">
                            
                        </div>
                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-success btn-block">Send password reset link</button>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>
    <!-- Javascript -->
    <script src={{ asset('assets/js/jquery/jquery-2.1.0.min.js') }}></script>
    <script src={{ asset('assets/js/bootstrap/bootstrap.js') }}></script>
    <script src={{ asset('assets/js/queen-form-layouts.js') }}></script>
</body>

</html>
