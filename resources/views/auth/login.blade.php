
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{asset('login_component/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/vendor/animsition/css/animsition.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login_component/vendor/daterangepicker/daterangepicker.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('login_component/css/main.css')}}">
<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.5),
                       rgba(0, 0, 0, 0.5)), url({{asset('img/zerow_logo_white.png')}});">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{asset('login_component/images/bg-01.jpg')}});">
					<span class="login100-form-title-1">
                     {{ __('Login') }}
					</span>
                       @error('email')
                            <span class="focus-input100 text-center text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @error('Password')
                            <span class="focus-input100" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
				</div>

				<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                @csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">{{ __('E-Mail Address') }}</span>
						<input  type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                        <span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">{{ __('Password') }}</span>
						<input  id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="label-checkbox100" for="remember">
                                {{ __('Remember Me') }}
							</label>
						</div>

						<div>
                            @if (Route::has('password.request'))
                                        <a class="txt1" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                             @endif
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
                            {{ __('Login') }}
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
<!--===============================================================================================-->
	<script src="{{asset('login_component/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_component/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_component/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('login_component/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_component/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('login_component/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('login_component/vendor/daterangepicker/daterangepicker.js' )}}"></script>
	<script src="{{asset('login_component/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{ asset('login_component/js/main.js')}}"></script>
</body>
</html>


