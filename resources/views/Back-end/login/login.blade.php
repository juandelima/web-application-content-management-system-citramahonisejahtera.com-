@extends('Back-end.login.template')
@section('main')
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('images/CMS_LOGO.png')}}" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
					 <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<span class="login100-form-title">
						Admin Login Website Citra Mahoni Sejahtera
					</span>

					<div class="wrap-input100 validate-input{{ $errors->has('email') ? ' has-error' : '' }}">
						<input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input{{ $errors->has('password') ? ' has-error' : '' }}" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection