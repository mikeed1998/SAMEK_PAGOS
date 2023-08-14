<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/mdb.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

	@yield('cssExtras')
		@yield('jsLibExtras')
		@yield('styleExtras')
</head>
<body>
	<div class="container-for-admin">
		<header>
			@include('layouts.partials_dash.navbar')
			@include('layouts.partials_dash.sidebar')
		</header>

		<main class="pt-5 mx-lg-5">
			<div class="container-fluid mt-5">
				@yield('content')
			</div>
		</main>
	</div>

	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/general.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{asset('js/vendor/tinymce/tinymce.min.js')}}"></script>
	{{-- <script type="text/javascript" src="{{asset('js/dash.js')}}"></script> --}}

	{!! Toastr::message() !!}

	@yield('jsLibExtras2')

	@yield('jqueryExtra')

</body>
</html>
