<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="description" content="{{$config->description}}" />

		{{-- <title>{{ config('app.name') }}</title> --}}
		<title>@yield('title') | {{$config->title }}</title>

    	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="{{asset('vendor/slick-1.8.1/slick/slick.css')}}"/>
		<link rel="stylesheet" type="text/css" href="{{asset('vendor/slick-1.8.1/slick/slick-theme.css')}}"/>
		
		<link rel="stylesheet" href="{{asset('css/main.css')}}">

		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>

		{{-- message toastr --}}
		<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
		<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
		<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

		<!-- UIkit CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.23/dist/css/uikit.min.css" />

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Blinker:wght@300&display=swap" rel="stylesheet">

		<!-- Biblioteca de Isotope -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.min.css">

		@yield('jsLibExtras')

		@yield('cssExtras')
		@yield('styleExtras')
	</head>
	<body style="font-family: 'Blinker', sans-serif;">

		@include('layouts.partials.header')

		@yield('content')

		@include('layouts.partials.footer')
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

		{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
		{{-- <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script> --}}
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

		{{-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> --}}
		<script type="text/javascript" src="{{asset('vendor/slick-1.8.1/slick/slick.js')}}"></script>

		<script type="text/javascript" src="{{asset('js/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/general.js')}}"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

		<!-- UIkit JS -->
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.23/dist/js/uikit.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/uikit@3.16.23/dist/js/uikit-icons.min.js"></script>

		<!-- Biblioteca de Isotope -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

		@yield('jsLibExtras2')

		{{-- {{$carrito}} --}}
		@yield('jqueryExtra')
	</body>
</html>
