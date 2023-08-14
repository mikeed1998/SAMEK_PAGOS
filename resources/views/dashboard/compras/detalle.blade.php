@extends('layouts.app')

{{-- @section('cssExtras') @endsection --}}
{{-- @section('jsLibExtras') @endsection --}}

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('dash.compras.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@endif
	<div class="row">
		<div class="col-12 col-md-4 my-2">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title text-center">Datos personales</h6>
					<div class="">
						<span class="text-muted">Nombre:</span> {{$pedido->usuario->name.' '. $pedido->usuario->lastname }}
					</div>
					<div class="">
						<span class="text-muted">Email:</span> {{$pedido->usuario->email}}
					</div>
					<div class="">
						<span class="text-muted">Telefono:</span> {{$pedido->usuario->telefono}}
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 my-2">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title text-center">Dirección de envio</h6>
					<span class="text-muted">Calle: </span>{{$pedido->domicilio['calle']}} #{{$pedido->domicilio['numext']}} @if ($pedido->domicilio['numint']) Int. {{$pedido->domicilio['numint']}} @endif <br>
					<span class="text-muted">Entre calles:</span> {{$pedido->domicilio['entrecalles']}} <br>
					<span class="text-muted">Colonia: </span>{{$pedido->domicilio['colonia']}} <span class="text-muted">CP:</span> {{$pedido->domicilio['cp']}} <br>
					<span class="text-muted">Municipio: </span>{{$pedido->domicilio['municipio']}} <span class="text-muted">Estado:</span> {{$pedido->domicilio['estado']}}
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 my-2">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title text-center">Datos para pago bancario</h6>
					<div class="">
						{!! nl2br($config->banco) !!}
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		{{-- @if ($pedido->envia_resp['meta'] == 'generate')
			@foreach ($pedido->envia_resp['data'] as $label)
				<div class="col-12 col-md-6 my-4">
					<div class="card">
						<div class="card-body text-center">
							<p class="">
								<span class="">Link de rastreo</span> <br>
								<span class=""> <a href="{{ $label['trackUrl'] }}" class="btn btn-info" target="_blank">Rastrear</a></span>
							</p>
							<p class="">
								<span class="">Número de guía</span> <br>
								<input type="text" class="form-control-plaintext text-center" value="{{ $label['trackingNumber'] }}">
							</p>
						</div>
					</div>
				</div>
			@endforeach
		@endif --}}
		{{-- @if (!empty($pedido->guia))
			<div class="col-12 col-md-6 my-4">
				<div class="card">
					<div class="card-body">
						<p class="">
							<span class="">Link de rastreo</span> <br>
							<span class="">{{ $pedido->linkguia }}</span>
						</p>
						<p class="">
							<span class="">Número de guía</span> <br>
							<span class="">{{ $pedido->guia }}</span>
						</p>
					</div>
				</div>
			</div>
		@endif --}}
		<div class="col-12 col-md-6 my-4">
			<div class="card">
				<div class="card-body text-center">
					Descarga tu orden de pago <br>
					<a target="_blank" href="{{route('dash.orden',$pedido->uid)}}" class="btn btn-warning"> <i class="fas fa-file-download"></i> Descargar Orden </a>
					@if ($pedido->estatus == 0)
						<div class="alert alert-danger alert-dismissible fade show mt-3 text-justify" role="alert">
							<strong>
								Por favor descargue su ficha y haga su deposito,
								usted tendra 24 horas para notificar el pago en su panel del cliente de lo contrario, su orden quedara cancelada.
							</strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-12 my-4">
			<div class="card">
				<div class="card-header text-center">
					Detalles del pedido
				</div>
				<div class="card-body">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th scope="col">Producto</th>
								<th class="text-center" scope="col" style="width:10%;">Cantidad</th>
								<th class="text-center" scope="col" style="width:10%;">P. Unit</th>
								<th class="text-center" scope="col" style="width:10%;">Importe</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($detalle as $detail)
							<tr>
								<th scope="row">{{$detail->producto['prod']->nombre}} </th>
								<td class="text-center">{{$detail->cantidad}}</td>
								<td class="text-center">${{ number_format($detail->producto['var']->precio,2)}}</td>
								<td class="text-center">${{ number_format($detail->importe,2)}}</td>
							</tr>
							@endforeach
							@if ($pedido->envio)
							<tr>
								<td colspan="3">Envio</td>
								<td class="text-center">${{number_format($pedido->envio,2)}}</td>
							</tr>
							@endif
							{{-- <tr>
								<td colspan="3">IVA</td>
								<td class="text-center">${{number_format($pedido->iva,2)}}</td>
							</tr> --}}
							<tr>
								<td colspan="2"></td>
								<td class="text-center">Subtotal</td>
								<td class="text-center">${{number_format($pedido->importe,2)}}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-center">IVA</td>
								<td class="text-center">${{number_format($pedido->iva,2)}}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-center">Total</td>
								<td class="text-center">${{number_format(($pedido->importe+$pedido->iva+$pedido->envio),2)}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
@endsection
