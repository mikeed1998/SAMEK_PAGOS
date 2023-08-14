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
		<a href="{{ route('config.index') }}" class="col disabled col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 px-0 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="clientes" class="table table-striped table-hover table-sm">
						<thead>
							<th style="width: 3rem;">id</th>
							<th>Nombre</th>
							<th>Apellidos</th>
							<th>Email</th>
							<th>Pedidos</th>
							<th class="text-center" style="width: 10rem;">Ops</th>
						</thead>
						<tbody>
							@if (!empty($clientes))
								@foreach ($clientes as $cl)
									<tr>
										<td>{{$cl->id}}</td>
										<td>{{$cl->name}}</td>
										<td>{{$cl->lastname}}</td>
										<td>{{$cl->email}}</td>
										<td>{{$cl->pedidos}}</td>
										<td>
											<div class="dropdown text-right">
												<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Accciones
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="{{route('clientes.show', $cl->id)}}">Ver más</a>
													<!--a class="dropdown-item" href="">Editar</a-->
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalDel" data-id="{{$cl->id}}"><i class="fas fa-trash-alt"></i> Eliminar</a>
												</div>
											</div>
											{{-- <div class="text-right">
												<div class="btn-group btn-group-sm" role="group">
													<a href="" class="btn btn-sm btn-secondary m-0"><i class="fas fa-search-plus"></i></a>
													<button type="button" class="btn btn-sm btn-danger m-0" data-toggle="modal" data-target="#ModalDel" data-id=""><i class="fas fa-trash-alt"></i></button>
												</div>
											</div> --}}
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
	</div>

	<div class="modal fade bottom" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar Usuario?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white deluser">Eliminar</button>
						<form id="userdel" action="{{ route('clientes.delete') }}" method="POST" style="display: none;">
								@csrf
								<input type="hidden" id="iudel" name="user" value="">
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
				$('#clientes').DataTable({
					"language": {
							"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
					},
					"columnDefs": [
						{
							"orderable": false,
							"targets": 5
						}
					],
				});

				$('.fa-trash-alt').parent().click(function(e) {
					var id = $(this).attr('data-id');
					$("#iudel").val(id);
				});

				$('.deluser').click(function(e) {
					$('#userdel').submit();
				});

			});
		</script>
@endsection
