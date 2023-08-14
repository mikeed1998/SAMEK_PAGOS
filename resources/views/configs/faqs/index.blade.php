@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('config.faq.create') }}" class="col col-md-2 btn btn-sm green darken-2 text-white"><i class="fa fa-plus"></i> Agregar</a>
	</div>

	<div class="accordion sortable" data-table="Faq" id="acordionfaqs">
		@foreach ($faqs as $f)
			<div class="card mb-3" data-card="{{$f->id}}">
				<div class="card-header grey lighten-4 row" id="heading{{$f->id}}">
					<h2 class="mb-0 w-75">
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$f->id}}" aria-expanded="true" aria-controls="collapse{{$f->id}}">
							{{ $f->pregunta}}
						</button>
					</h2>
					<div class="mb-0 w-25 text-right">
						<div class="btn-group btn-group-sm" role="group" aria-label="...">
							<a href="{{route('config.faq.edit',$f->id)}}" class="btn btn-sm btn-info text-right">
								<i class="fas fa-pen"></i>
							</a>
							<button class="btn btn-sm btn-danger text-right" data-toggle="modal" data-target="#frameModalDel" data-id="{{$f->id}}">
								<i class="fas fa-trash-alt"></i>
							</button>
						</div>
					</div>
				</div>

				<div id="collapse{{$f->id}}" class="collapse" aria-labelledby="heading{{$f->id}}" data-parent="#acordionfaqs">
					<div class="card-body text-justify">
						{!! $f->respuesta!!}
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
							Eliminar Pregunta?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delslide">Eliminar</button>
						<form id="preguntadel" action="{{ route('config.faq.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="iqdel" name="pregunta" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#iqdel").val(id);
			});

			$('.delslide').click(function(e) {
				$('#preguntadel').submit();
			});

		});
	</script>
@endsection
