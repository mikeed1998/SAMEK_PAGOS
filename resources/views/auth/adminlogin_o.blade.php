<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Administración</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="shortcut icon" href="{{asset('img/design/logo-wozial.ico')}}">

	<!-- Font Awsome -->
	<script src="https://kit.fontawesome.com/910783a909.js" crossorigin="anonymous"></script>

	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@ {{env('UIKITVERSION')}}/dist/css/uikit.min.css" />

	<!-- jQuery es neceario -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- UIkit JS -->
	<script src="https://cdn.jsdelivr.net/npm/uikit@ {{env('UIKITVERSION')}}/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@ {{env('UIKITVERSION')}}/dist/js/uikit-icons.min.js"></script>


	<!-- CSS Personalizados -->
	<link rel="stylesheet" href="{{asset('css/admin.css')}}">

</head>
<body>
	<div class="uk-inline uk-width-1-1" style="min-height: 100vh;">
		<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation:fade; autoplay:true; autoplay-interval:3000; pause-on-hover:false;">
			<ul class="uk-slideshow-items" uk-height-viewport="min-height: 700">
				@php
					$nums = [1,2,3,4,5,6,7,8,9];
					$nums = Arr::shuffle($nums);
				@endphp
				@foreach ($nums as $nu)
					<li>
						<div class="uk-position-cover">
							<img src="../img/contenido/wozial/wozial{{$nu}}.jpg" alt="" uk-cover>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
		<div class="uk-position-center" style="width:300px;">
			<div class="uk-border-rounded uk-overlay uk-overlay-default" uk-scrollspy="cls:uk-animation-slide-bottom-medium; delay:800;">
				<div class="uk-text-center">
					<img src="{{asset('img/design/logo-wozial.png')}}" class="margin-bottom-10" style="max-height: 100px;">
				</div>

				<form method="POST" action="{{ route('admin.login') }}">
					@csrf

					<div class="uk-inline">
						<span class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: user"></span>
						<input id="email" type="email" class="uk-input uk-margin uk-width-1-1 uk-form-large @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

						@error('email')
								<div class="uk-form-danger" role="alert">
										<strong>{{ $message }}</strong>
								</div>
						@enderror
					</div>
					<div class="uk-inline">
						<span class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: lock"></span>
						{{-- <input name="pass" id="pass" type="password" class="pass uk-input uk-margin uk-width-1-1 uk-form-large" placeholder="Contraseña"> --}}
						<input id="password" type="password" class="pass uk-input uk-margin uk-width-1-1 uk-form-large {{ $errors->has('password') ? ' uk-form-danger' : '' }}" name="password" required>

						@if ($errors->has('password'))
							<span class="uk-form-danger">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>

					<button type="submit" class="uk-width-1-1 uk-margin uk-button uk-button-primary uk-button-large">
							{{ __('Login') }}
					</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
