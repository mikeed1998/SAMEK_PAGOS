@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row">
		<div class="py-2 col-12 col-md-6">
			<div class="card h-100">
				<form action="{{ route('config.color.store')}}" class="card-body mb-0" method="post">
					@csrf
					<h4 class="card-title text-center">Agregar Color</h4>
					<input type="hidden" name="texturaBool" value="0">
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="name">Nombre</label>
							<input class="form-control" type="text" name="name" id="name" placeholder="Nombre del color" required>
						</div>
						<div class="form-group col-12 col-md-6 text-center">
							<label for="hexa">Color</label>
							<input class="form-control mx-auto" name="hexa" id="hexa" type="color" style="width: 6em;height: 6em;padding: 1em;" required>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-indigo">Guardar</button>
					</div>
				</form>
			</div>
		</div>
		<div class="py-2 col-12 col-md-6">
			<div class="card h-100">
					<form action="{{ route('config.color.store')}}" class="card-body mb-0" method="post"  enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="texturaBool" value="1">
					<h4 class="card-title text-center">Agregar Textura</h4>
					<div class="row">
						<div class="form-group col-12 col-md-6">
							<label for="name">Textura</label>
							<input class="form-control" type="text" name="name" id="name" placeholder="Nombre de la textura" required>
						</div>
						<div class=" col-12 col-md-6">
							<label for="name">Imagen</label>
							<input type="file" id="textura" name="textura" class="dropify"  data-weight="6em" data-height="6em" required />
						</div>
					</div>
					<div class="text-center mt-2">
						<button type="submit" class="btn btn-indigo">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="row mt-3 sortable" data-table="Color">
		@foreach ($colors as $c)
			<div class="col-12 col-md-3 col-lg-3 my-2 my-md-1" data-card="{{$c->id}}">
				<div class="card">
					<div class="card-body ">
						<div class="mb-1 text-center">
							@if ($c->hexa)
								<div class="rounded-circle mx-auto mb-2" style="background:{{$c->hexa}}; width:5em; height:5em;" ></div>
							@else
								<div class="rounded-circle mx-auto mb-2" style="background-image:url({{url('/')}}/img/photos/others/{!!$c->textura!!}); width:5em; height:5em; background-size:5em;" ></div>
							@endif
							{{-- <input type="text" class="form-control text-center disabled editInp" id="inp{{$c->id}}" value="{{$c->name}}"> --}}
							<span class="text-center">{{$c->name}}</span>
						</div>
						<div class="col-12 justify-content-center">
							<div class="row">
								<a href="{{route('config.color.edit',$c->id)}}" class="col btn blue darken-3 text-white btn-sm">
									<i class="fas fa-pen"></i>
								</a>
								{{-- <button type="button" class="col btn blue darken-3 text-white btn-sm edit" data-toggle="modal" data-target="#ModalEdit" data-id="{{$c->id}}">
									<i class="fas fa-pen"></i>
								</button> --}}
								<button type="button" class="col btn red darken-3 text-white btn-sm" data-toggle="modal" data-target="#frameModalDel" data-id="{{$c->id}}">
									<i class="fas fa-trash-alt"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar color o textura?
							<br>
							<span class="font-weight-bold">
								Se eliminarán las existencias de productos con este color!
							</span>
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white deltexture">Eliminar</button>
						<form id="colordel" action="{{ route('config.color.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="icdel" name="color" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>

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

		});
	</script>
@endsection
