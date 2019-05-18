<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>Login Sekolahku</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('images/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/bootstrap.min.css')}}">
<!--===============================================================================================-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/animate.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login/main.css')}}">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ asset('images/img-01.png')}}" alt="IMG">
				</div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}" >
                        @csrf
                    @if (session('danger'))
                        <div class="alert alert-danger" role="alert">
                        <strong>{{session('danger')}}</strong>
                        </div>
                    @else
					<span class="login100-form-title">
						Silahkan Login
                    </span>
                    @endif
					<div class="wrap-input100 validate-input">
						<input class="input100" type="email" autocomplete="off" required name="email" placeholder="Email">
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" required name="pass" placeholder="Password">
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">

					</div>

					<div class="text-center p-t-136">

					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/login/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/login/popper.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/login/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/login/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/login/tilt.jquery.min.js')}}"></script>
	<script type="text/javascript" >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="{{asset('js/login/main.js')}}"></script>

</body>
</html>
