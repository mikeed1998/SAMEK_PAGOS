@extends('layouts.app')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')

	<div class="col-12 mb-2 px-2">
		<a href="{{ route('dash.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 px-0 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-sm">
						<thead>
							<tr>
								<th style="width: 3rem;">Pedido #</th>
								<th>Fecha</th>
								<th>Comprobante </th>
								<th class="text-center">Productos</th>
								<th class="text-center">Importe</th>
								<th class="text-center">Estatus</th>
								<th class="text-center" style="width: 10rem;">Ops</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($compras as $item)
								<tr>
									<td>{{$item->id}}</td>
									<td>{{$item->created_at}}</td>
									<td>
										@if (!empty($item->comprobante))
											<p>
												<a href="#" class="text-info modcompr" data-toggle="modal" data-target="#comprobante" data-id="{{$item->id}}" data-img="{{$item->comprobante}}">Comprobante</a>
											</p>
										@else
											<p><a href="#" class="text-warning modcompr" data-toggle="modal" data-target="#comprobante" data-id="{{$item->id}}" data-img="{{$item->comprobante}}{{$item->id}}">Sin Comprobante</a></p>
										@endif
									</td>
									<td class="text-center">{{$item->cantidad}}</td>
									<td class="text-center">${{$item->importe}}</td>
									<td class="text-center">
										@switch($item->estatus)
										@case(0)
										<div class="alert alert-dark" role="alert">
											Registrado
										</div>
										@break

										@case(1)
										<div class="alert alert-info" role="alert">
											Pagado
										</div>
										@break

										@case(2)
										<div class="alert alert-warning" role="alert">
											Enviado
										</div>
										@break

										@case(3)
										<div class="alert alert-success" role="alert">
											Entregado
										</div>
										@break

										@endswitch
									</td>
									<td>
										<div class="dropdown text-right">
											<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Accciones
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="{{route('dash.compras.detalle', $item->uid)}}">Ver más</a>
												<!--a class="dropdown-item" href="">Editar</a-->
												{{-- <button class="dropdown-item btndel" data-toggle="modal" data-target="#frameModalDel" data-id="{{$item->id}}">Eliminar</button> --}}
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="comprobante" tabindex="-1" aria-labelledby="comprobanteLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="comprobanteLabel">Comprobante</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<img src="{{ asset('img/photos/tmps/comprobante-ejemplo.jpg') }}" alt="" class="img-fluid">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.modcompr').click(function(e) {
				var base = "{{ asset('img/photos/comprobantes/') }}";
				var img = $(this).attr('data-img');
				console.log(img);
			});
		});
	</script>
@endsection
