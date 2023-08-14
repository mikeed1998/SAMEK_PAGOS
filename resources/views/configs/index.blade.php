@extends('layouts.admin')

@section('content')
	<div class="row justify-content-center">
		@foreach ($cards as $card)
			<div class="col-6 col-lg-2 p-2" >
				<a href="{{route($card['route'])}}" class="card h-100">
					<span class="card-body text-muted text-center">
						<i class="{{$card['icon']}} fa-3x mb-3"></i> <br>
						<span class=" text-dark"> {{$card['text']}} </span>
					</span>
				</a>
			</div>
		@endforeach
	</div>

@endsection

@section('scriptExtras')
	<script type="text/javascript">
	var container = document.querySelector('.custom-scrollbar');

	$('.datepicker').pickadate();
	$(function() {
		$('[data-toggle="tooltip"]').tooltip()
	})
	</script>
@endsection
