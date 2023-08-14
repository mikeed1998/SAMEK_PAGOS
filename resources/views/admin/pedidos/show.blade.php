@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">


		<a href="{{ route('pedidos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<!--a href="" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a-->
	</div>

	<div class="row">
		<div class="col-md-4">
			<div class="card">
			  	<div class="card-header text-center">
			    	Datos del cliente
			  	</div>
			  	<div class="card-body">
			    	<p class="card-text"><span class="font-weight-bold">Nombre: </span> {{$pedido->user[0]->name}}</p>
			    	<p class="card-text"><span class="font-weight-bold">Email:</span> {{$pedido->user[0]->email}}</p>
			    	<p class="card-text"><span class="font-weight-bold">Telefono:</span> {{$pedido->user[0]->telefono}}</p>
			    	<p class="card-text"><span class="font-weight-bold">RFC:</span> {{$pedido->user[0]->rfc}}</p>
			  	</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			  	<div class="card-header text-center">
			    	Datos de envío
			  	</div>
			  	<div class="card-body">

			    	<span class="text-muted">Calle: </span>{{$pedido->domicilio['calle']}} #{{$pedido->domicilio['numext']}}
					@if (strlen($pedido->domicilio['numint'])>0)
						Int. {{$pedido->domicilio['numint']}}
					@endif
					<br>
					<span class="text-muted">Entre calles:</span> {{$pedido->domicilio['entrecalles']}}  <br>
					<span class="text-muted">Colonia: </span>{{$pedido->domicilio['colonia']}}<span class="text-muted">CP:</span> {{$pedido->domicilio['cp']}} <br>
					<span class="text-muted">Municipio: </span>{{$pedido->domicilio['municipio']}} <span class="text-muted">Estado:</span> {{$pedido->domicilio['estado']}}<br><br>
			  	</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
			  	<div class="card-header text-center">
			    	Datos de facturación
			  	</div>
			  	<div class="card-body">
			    	<span class="text-muted">RFC:</span> {{$factura->rfc}} <br>
			    	<span class="text-muted">Razon social: </span>{{$factura->razon_social}}<br>
			    	<span class="text-muted">Calle: </span> {{$factura->calle}} <span># </span> {{$factura->numext}}
			    	@if (strlen($factura->numint))
			    		<span>Int: </span> {{$factura->numint}}
			    	@endif
			    	<br>
			    	<span class=text-muted>Col:</span> {{$factura->colonia}},{{$factura->municipio}},{{$factura->estado}}<br>
			    	<span class="text-muted">Correo: </span> {{$factura->mail}}
			  	</div>
			</div>
		</div>
		<div class="col-md-12 mt-4">
			<div class="card">
			  	<div class="card-body">
			    	<div class="form-row">
			    <div class="form-group col-md-9">
			      <label for="link">Link de rastreo</label>
			      <input type="text" class="form-control editarajax" id="link" data-id="{{$pedido->id}}" data-table="pedido" data-campo="linkguia"  value="{{ $pedido->linkguia }}">
			    </div>
			    <div class="form-group col-md-3">
			      <label for="numguia">Número de guía</label>
			      <input type="text" class="form-control editarajax" data-id="{{$pedido->id}}" data-table="pedido" data-campo="guia"  value="{{ $pedido->guia }}">
			    </div>
			  </div>
			  	</div>
			</div>
		</div>
		<div class="col-md-12 mt-4">
			<div class="card">
				<div class="card-header text-center">
					Detalles del pedido
				</div>
				<div class="card-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th scope="col">Producto</th>
								<th class="text-center" scope="col" style="width:10%;">Cantidad</th>
								<th class="text-center" scope="col" style="width:13%;">P. Unit</th>
								<th class="text-center" scope="col" style="width:10%;">Importe</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($pedido->detalles as $detail)

							<tr>
								<th scope="row">{{$detail->producto['prod']->nombre}}</th>
								<td class="text-center">{{$detail->cantidad}}</td>
								<td class="text-center">${{$detail->precio}}</td>
								<td class="text-center">${{$detail->importe}}</td>
							</tr>
							@endforeach
							@if ($pedido->envio)
							<tr>
								<td colspan="3">Envío</td>
								<td class="text-center">${{$pedido->envio}}</td>
							</tr>
							@endif
							<tr>
								<td colspan="2"></td>
								<td class="text-center">Subtotal</td>
								<td class="text-center">${{$pedido->importe}}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-center">IVA</td>
								<td class="text-center">${{$pedido->iva}}</td>
							</tr>
							<tr>
								<td colspan="2"></td>
								<td class="text-center">Total</td>
								<td class="text-center">${{$pedido->importe + $pedido->iva + $pedido->envio}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
	</script>
@endsection
