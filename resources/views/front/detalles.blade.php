@extends('layouts.front')

@section('title')
{{-- {{ $product->nombre }} --}}
@endsection

@section('styleExtras')
	<link rel="stylesheet" href="{{asset('css/index.css')}}">
	<link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/owlcarousel/owl.theme.default.min.css') }}">
@endsection

@section('cssExtras')
	
@endsection

@section('content')

@endsection

@section('jsLibExtras2')
	<script src="{{ asset('js/owlcarousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/owlcarousel/owlCarousel2Rows.js') }}"></script>
@endsection

@section('jqueryExtra')
	
@endsection
