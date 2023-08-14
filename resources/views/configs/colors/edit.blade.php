@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endsection

@section('jsLibExtras')
@endsection

@section('content')
<div class="d-flex justify-content-center">

	@if ($color->hexa)
	<div class="py-2 col-12 col-md-6">
		<div class="card h-100">
			<form action="{{ route('config.color.update',$color->id) }}" class="card-body mb-0" method="post">
				@csrf
				@method('PUT')
				<h4 class="card-title text-center">Editar Color</h4>
				<input type="hidden" name="texturaBool" value="0">
				{{-- <div class="row"> --}}
					<div class="form-group col-12">
						<label for="name">Nombre</label>
						<input class="form-control" type="text" name="name" id="name" value="{{ $color->name}}" placeholder="Nombre del color" required>
					</div>
					<div class="form-group col-12 text-center">
						<label for="hexa">Color</label>
						<input class="form-control mx-auto" name="hexa" id="hexa" type="color" value="{{ $color->hexa}}" style="width: 6em;height: 6em;padding: 1em;" required>
					</div>
				{{-- </div> --}}
				<div class="text-center">
					<button type="submit" class="btn btn-indigo">Guardar</button>
				</div>
			</form>
		</div>
	</div>

	@else
		<div class="py-2 col-12 col-md-8">
			<div class="card h-100">
				<form action="{{ route('config.color.update',$color->id) }}" class="card-body mb-0" method="post"  enctype="multipart/form-data">
					@csrf
					@method('put')
					<input type="hidden" name="texturaBool" value="1">
					<h4 class="card-title text-center">Editar Textura</h4>
					{{-- <div class="row"> --}}
						<div class="form-group col-12">
							<label for="name">Textura</label>
							<input class="form-control" type="text" name="name" id="name" value="{{ $color->name}}" placeholder="Nombre de la textura" required>
						</div>
						<div class=" col-12">
							<label for="name">Imagen</label>
							<input type="file" id="textura" name="textura" class="dropify" data-default-file="{{url('/').'/img/photos/others/'.$color->textura}}" value="{{url('/').'/img/photos/others/'.$color->textura}}" />
						</div>
					{{-- </div> --}}
					<div class="text-center mt-2">
						<button type="submit" class="btn btn-indigo">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	@endif
</div>

@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

@endsection
@section('jqueryExtra')
<script type="text/javascript">
		$(document).ready(function() {
			$('.dropify').dropify();

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#icdel").val(id);
			});

			$('.deltexture').click(function(e) {
				$('#colordel').submit();
			});


			$(".sortable").sortable({
				update: function( event, ui ) {
					var tabla = $(this).attr("data-table");
					var orden = $(this).sortable("toArray", {attribute: 'data-card'});
					var csrf = $('meta[name="csrf-token"]').attr('content');
					$.ajax({
						method: "POST",
						url: "/varios/orderajax",
						data: {
							"_method": 'post',
							"_token": csrf,
							table: tabla,
							orden: orden
						}
					})
					.done(function(msg) {
						toastr["success"]("Guardado Exitosamente");
					});
				}
			});
		});
	</script>
@endsection
