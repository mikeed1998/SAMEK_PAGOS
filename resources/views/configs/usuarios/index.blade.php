@extends('layouts.admin')
{{-- @section('cssExtras') @endsection --}}
{{-- @section('jsLibExtras') @endsection --}}
@section('styleExtras')
<style media="screen">
	tbody tr td {
		vertical-align: middle!important;
	}
</style>

@endsection
@section('content')
		<div class="row mb-4 px-2">
			<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>

			<a href="{{ route('admin.create') }}" class="col col-md-2 btn btn-sm green darken-2 text-white"><i class="fa fa-plus"></i> Agregar</a>
			{{--note crear y cambiar route a home--}}

		</div>


				<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-sm">
						<thead>
							<th style="width: 10rem;">Nombre de Usuario</th>
							<th>Correo</th>
							<th class="" style="width: 5rem;">Activo</th>
							<th class="text-center" style="width: 10rem;">Ops</th>
						</thead>
						<tbody>
							@if (!empty($usuario))
								@foreach ($usuario as $usu)
									<tr>
										<td>{{$usu->user}}</td>
										<td>{{$usu->email}}</td>

										<td>
											<div class="custom-control custom-switch" data-table="Models\Admin" data-campo="activo">
												<input type="checkbox" @if ($usu->activo) checked @endif class="custom-control-input swiToAj" data-id="{{$usu->id}}" id="AswiTo-{{$usu->id}}">
												<label class="custom-control-label" for="AswiTo-{{$usu->id}}"></label>
											</div>
										</td>
										<td>
											<div class="dropdown text-right">
												<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Accciones
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

													<a class="dropdown-item" href="">Editar</a>
													<button type="button" class="dropdown-item" data-toggle="modal" data-target="#frameModalDel" data-id="{{$usu->id}}"><i class="fas fa-trash-alt"></i> Eliminar </button>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							@else
								<tr>
									<div class="alert alert-secondary" role="alert">
										No hay usuarios registrados
									</div>
								</tr>
							@endif

						</tbody>
					</table>
				</div>
			</div>
		</div>

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar Usuario?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delproye">Eliminar</button>
						<form id="usuDel" action="{{ route('admin.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="iudel" name="iudel" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>





@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')

<script type="text/javascript">

		$(document).ready(function() {


			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#iudel").val(id);
			});

			$('.delproye').click(function(e) {
				$('#usuDel').submit();
			});

		});
	</script>

@endsection
