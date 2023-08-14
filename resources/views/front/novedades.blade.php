@extends('layouts.front')

@section('title', 'Novedades')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

	<div class="container-fluid">
	  	<div class="row">
	  		<div class="col-12 height-60 bg-cover-center" style="background:url({{asset('img/photos/seccions/'.$seccion->portada)}});">
	  		</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row justify-content-md-center py-5">
			<div class="col col-lg-6 text-center py-5">
				<h2 class="nosotros-titulo">Novedades</h2>
				<div class="mt-2 font-weight-bold">
					{!!$elements[0]->texto!!}
				</div>
			</div>
		</div>
	</div>


<div class="container-fluid m-0 p-0 bg-gris-claro">
	<div class="container">
		<div id="nv" class="row">
			<div class="mx-auto py-4">
				<h1 class="text-green title w-100">Beneficios</h1>
			</div>
			<div class="row justify-content-md-center" id="months">
			@foreach ($news as $item)
				<div class="col-12 col-lg-4 my-1">
					<div class="hoverable p-2 h-100">
						<a href="{{ asset('img/photos/novedades/'.$item->pdf) }}" class="" download="{{ $item->pdfname }}">
							<div class="view overlay card-img-top novedad-card">
								<img src="{{ asset('img/photos/novedades/'.$item->portada) }}" class="img-fluid " alt="placeholder">
								<div class="mask flex-center waves-effect waves-light rgba-white-strong">
									<p class="text-dark h4 font-weight-bold text-center">Descargar <br> PDF</p>
								</div>
							</div>
							<div class="card-body">
								<h3 class="card-title p-2 text-green text-center bold-660">{{ $item->titulo }}</h3>
								<div class="card-text">
									{!! $item->descripcion !!}
								</div>
							</div>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
</div>
<div class="white ">
	<div class="text-center mt-5">
		<button id="more" type="button" name="button" class="btn cont-btn2" style="margin-top:-24px">Mas Novedades</button>
	</div>
	<div class="container py-4">
		<div class="row justify-content-center">
			<div class="col-12 col-lg-6 align-self-center d-flex align-items-center" style="">
				<div class="">
					<p class="">
						<h1 class="text-orange title text-lg-left" style="">Inicia como <br> Distribuidor</h1>
					</p>
					<p class="card-text text-left" style="">
						{!!$elements[1]->texto!!}
					</p>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<img src="img/photos/novedades/bg-novedades.jpg" class="img-fluid redondeo-6px" alt="Responsive image" style="max-height:70vh">
			</div>
		</div>
	</div>
</div>
<style>
	#nv > .col-12:hover {
		box-shadow: 3px 3px 15px -1px rgb(153, 153, 153) !important;
	}
	#nv > div > a > .card-title {
	}
	.novedad-card {
		height:15em;
		object-fit:cover;
	}
</style>
@endsection

@section('jsLibExtras2')
@endsection

@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			var page = 2;

			$('#more').click(function(e) {
				$.ajax({
					url: '{{ route('front.novedades') }}?page='+page,
					dataType: 'json',
				})
				.done(function(resp) {
					if (resp.current_page === resp.last_page) {
						$('#more').parent().hide();
					}
					for (var i = 0; i < resp.data.length; i++) {
						$('#months').append('<div class="col-12 col-lg-4 my-1">'+
							'<div class="hoverable p-2 h-100">'+
								'<a href="{{ asset("img/photos/novedades")}}/'+ resp.data[i].pdf +'" download="'+ resp.data[i].titulo +'">'+
									'<div class="view overlay card-img-top novedad-card">'+
										'<img src="{{ asset("img/photos/novedades")}}/'+ resp.data[i].portada +'" class="img-fluid " alt="'+ resp.data[i].titulo +'">'+
										'<div class="mask flex-center waves-effect waves-light rgba-white-strong">'+
											'<p class="text-dark h4 font-weight-bold text-center">Descargar <br> PDF</p>'+
										'</div>'+
									'</div>'+
									'<div class="card-body">'+
										'<h3 class="card-title p-2 text-green text-center bold-660">'+ resp.data[i].titulo +'</h3>'+
										'<div class="card-text">'+ resp.data[i].descripcion +'</div></div></a></div></div>');
					}
					page = resp.current_page+1;
				})
				.fail(function(resp) {
					console.log("error: ");
					console.log(resp);
				});
			});

		});
	</script>
@endsection
