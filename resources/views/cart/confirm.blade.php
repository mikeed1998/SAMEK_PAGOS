@extends('layouts.front')
@section('title', 'Confirmar pedido')

{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

	<div class="container my-4">
		@if ( !count($carrito) )
		<div class="alert alert-danger text-center" role="alert">
			<b>El carro está vacío</b>
		</div>
		@else
		<form class="" action="{{route('cart.store')}}" method="post">
			@csrf
			<div class="my-5 container">
					<div class="">
						<div class="row">
							<div class="col mx-auto ">
								<div class="card">
									<div class="card-body">
										<div class="card-title h5 text-center bg-verde-claro">
											Mis datos
										</div>
										<small class="">Nombre:</small> <span class=""> {{ $user->name }} {{ $user->lastname }}</span> <br>
										<small class="">Telefono</small> <span class=""> {{ $user->telefono }} </span> <br>
										<small class="">Email:</small> <span class=""> {{ $user->email }} </span> <br>
									</div>
								</div>
							</div>
							<div class="col mx-auto">
								<div class="card">
									<div class="card-body">
										<div class="card-title h5 text-center bg-verde-claro">
											Domicilio de envio
										</div>
										<select name="domicilio" id="domicilio" class="custom-select text-capitalize">
											<option selected disabled>Selecciona Domicilio de envio</option>
											@foreach ($domicilios as $dom)
											<option value="{{$dom->id}}">{{ ucfirst($dom->alias) }} [<span class="">{{ ucfirst($dom->calle).' #'.ucfirst($dom->numext)}}</span>] </option>
											@endforeach
										</select>
										<div class="my-2">
											<button class="btn btn-info btn-sm w-100" id="addDom" data-toggle="modal" data-target="#addDomMod">Agregar Dirección</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col mx-auto">
								<div class="card">
									<div class="card-body">
										<div class="card-title h5 text-center bg-verde-claro">
											Datos de facturación
										</div>
										<small class="">Nombre:</small> <span class=""> {{ $user->name }} {{ $user->lastname }}</span> <br>
										<small class="">Telefono</small> <span class=""> {{ $user->telefono }} </span> <br>
										<small class="">Email:</small> <span class=""> {{ $user->email }} </span> <br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12" id="shipment" style="display:none;">
					<div class="row mx-auto">
						<div class="col-12 col-lg-6 my-3">
							<div class="card">
								<div class="card-body">
									<div class="card-title text-center">
										Selecciona una paqueteria
									</div>
									<select name="carrier" id="carrier" class="form-control text-uppercase">
										<option selected disabled> Selecciona una paqueteria</option>
										@foreach ($carriersArray as $carrier)
											{{-- <option value="{{$carrier->carrier_id}}">{{$carrier->name}}</option> --}}
											<option value="{{$carrier['name']}}">{{$carrier['name']}}</option>
											{{-- <option value="">{{print_r($carrier)}}</option> --}}
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="col-12 col-lg-6 my-3" id="rateDiv" style="display:none;">
							<div class="card">
								<div class="card-body">
									<div class="card-title text-center">
										Elige una opción de entrega
									</div>
									<div id="rateSel">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-9 mx-auto">
					<div class="card">
						<h3 class="card-header text-center bg-verde-claro">Confirmación de pedido</h3>
						<div class="px-2">
							<table class="table table-sm">
								<thead>
									<tr>
										<th>PRODUCTO</th>
										<th width="50px">CANTIDAD</th>
										<th class="text-center" width="100px">PRECIO</th>
										<th width="100px">IMPORTE</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($carrito as $item)
											<tr>
												<td class="text-left text-uppercase" colspan="">
													{{ $item->attributes['producto']['nombre'] }} | {{$item->name}}
												</td>
												<td class="text-center">
													{{$item->quantity}}
												</td>
												<td class="text-center">
													@php
														$fprice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
													@endphp
													{{ number_format($fprice,2)}}
												</td>
												<td class="text-left">
													{{ number_format(($fprice*$item->quantity),2)}}
												</td>
											</tr>
										@endforeach
										<tr>
											<td colspan="2"></td>
											<td class="text-right font-weight-bold">Subtotal:</td>
											<td>{{ number_format($cuentas['subtotal'],2) }}</td>
										</tr>
										<tr>
											<td>Envio <span class="paque"></span> </td>
											<td colspan="2"></td>
											<td><span class="paqueprice"></span></td>
										</tr>
										<tr>
											<td colspan="2"></td>
											<td class="text-right font-weight-bold">IVA:</td>
											<td>{{ number_format($cuentas['iva'],2) }}</td>
										</tr>
										<tr>
											<td colspan="2"></td>
											<td class="text-right font-weight-bold">Total:</td>
											<td><span class="ntotal">{{ number_format($cuentas['total'],2) }}</span></td>
										</tr>
								</tbody>
							</table>
						</div>
						<input type="hidden" id="cart" name="cart" value="{{session('cart_id')}}">
						<input type="hidden" id="user" name="user" value="{{ Auth::user()->id }}">
					</div>
				</div>
				<input type="hidden" id="route" name="route" value="">
				<input type="hidden" id="cart" name="cart" value="">
				<input type="hidden" id="subtotal" name="subtotal" value="{{$cuentas['subtotal']}}">
				<input type="hidden" id="envio_price" name="envio_price" value="">
				<input type="hidden" id="envio_carrier" name="envio_carrier" value="">
				<input type="hidden" id="envio_service" name="envio_service" value="">
				<div class="col-12 mt-4 row">
					<div class="col-4 text-center">
						<button type="submit" class="siguiente btn btn-warning uk-button-personal font-weight-bold paytype" value="deposito" style="">Depósito o transferencia</button>
						<img class="d-block mt-3 mx-auto w-75 img-fluid " src="{{asset('img/design/pago-oxxo.jpg')}}">
					</div>
					<div class="col-4 text-center">
						<button type="submit" class="siguiente btn btn-warning uk-button-personal font-weight-bold paytype" value="paypal" style="">Pagar con PayPal</button>
						<img class="d-block mt-3 mx-auto w-75 img-fluid " src="{{asset('img/design/pago-paypal.png')}}">
					</div>
					<div class="col-4 text-center">
						<button type="submit" class="siguiente btn btn-warning uk-button-personal font-weight-bold paytype" value="stripe" style="">Pagar con Stripe</button>
						<img class="d-block mt-3 mx-auto w-75 img-fluid " src="{{asset('img/design/Stripe blurple.svg')}}">
					</div>
				</div>
			</form>
		@endif
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="addDomMod" tabindex="-1" aria-labelledby="addDomModLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="addDomModLabel">Agregar dirección</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formdom" method="post">
					@csrf
					<div class="modal-body text-center">
						<div class="form-group">
							<label for="alias">Alias/Nombre</label>
							<input type="text" class="form-control" id="alias" name="alias" placeholder="Ej. Casa, Trabajo" required>
						</div>
						<div class="form-group">
							<label for="address">Calle</label>
							<input type="text" class="form-control" id="address" name="address" placeholder="Av.Lapizpazuli" required>
						</div>
						<div class="form-group row">
							<div class="col">
								<label for="number">Num. exterior</label>
								<input type="text" class="form-control" id="number" name="number" required>
							</div>
							<div class="col">
								<label for="numint">Num. interior</label>
								<input type="text" class="form-control" id="numint" name="numint">
							</div>
						</div>
						<div class="form-group">
							<label for="entrecalles">Entre Calles</label>
							<input type="text" class="form-control" id="entrecalles" name="entrecalles" required>
						</div>
						<div class="form-group">
							<label for="colonia">Colonia</label>
							<input type="text" class="form-control" id="colonia" name="colonia" required>
						</div>
						<div class="form-group">
							<label for="municipio">Municipio</label>
							<input type="text" class="form-control" id="municipio" name="municipio" required>
						</div>
						<div class="form-group">
							<label for="cp">CP</label>
							<input type="text" class="form-control" id="cp" name="cp" required>
						</div>
						<div class="form-group">
							<label for="estado">Estado</label>
							<select class="custom-select" id="estado" name="estado" required>
								<option selected isabled>Selecciona tu estado</option>
								@foreach ($estados as $est)
									<option value="{{$est->code_2_digits}}">{{$est->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="modal-footer">
							<div class="col-12 row text-center">
								<div class="col-6">
									<button type="button" id="savedom" class="btn btn-primary">Guardar</button>
								</div>
								<div class="col-6">
									<button type="button" id="closemod" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
								</div>
							</div>
						</div>
				</form>
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
	$(document).on('click', '.paytype', function(e) {
	// $('.paytype').click(function(e) {
		var valor = $(this).val();
		var domi = $('#domicilio').val();
		var carrier = $('#carrier').val();
		var inp = $('.pakete').attr('for');
		var service = $('#'+inp).attr('data-service');
		var cart = "{{session('cart_id')}}";
		$('#route').val(valor);
		$('#cart').val(cart);
		// console.log(valor);

		console.log(service);

		if (domi == null) {
			e.preventDefault();
			alert('Seleccione un domicilio de envio');
		}else if (carrier == null) {
			e.preventDefault();
			alert('Seleccione una paqueteria para el envio');
		}else if (service == null) {
			e.preventDefault();
			alert('Seleccione un paquete para el envio');
		}
	});

	$("#domicilio").change(function(e) {
		var domicilio = $(this).val();
		$('#shipment').show();
		$('#carrier').prop('selectedIndex',0);
		$("#rateSel").empty();

		$.ajax({
			url: '{{ route('cart.getDomicilio') }}',
			type: 'POST',
			data: {
				"_token": $("meta[name='csrf-token']").attr("content"),
				'domicilio': domicilio,
			}
		}).fail(function(resp) {
			console.log("error:");
			console.log(resp);
		});

	});

	$('#carrier').change(function(e) {
		$('#rateDiv').show();
		$('.paqueprice').empty();

		var carrier = $(this).val();
		$.ajax({
			url: '{{ route('cart.getPackages') }}',
			data: {
				'carrier': carrier
			}
		})
		.done(function(resp) {
			$("#rateSel").empty();
			if (resp.meta == 'rate') {
				$.each( resp.data, function( i, val ) {
					$( "#" + i ).append( document.createTextNode( " - " + val ) );
					$('#rateSel').append('<div class="custom-control custom-radio">'+
					'<input type="radio" id="cRadio'+i+'" data-price="'+resp.data[0].totalPrice+'" data-service="'+resp.data[0].service+'"  data-serDesc="'+resp.data[0].serviceDescription+'" name="paquete" class="custom-control-input">'+
					'<label class="custom-control-label pakete" for="cRadio'+i+'">$'+
					resp.data[0].totalPrice +' - '+ resp.data[0].serviceDescription + ' [<span class="text-success">Dias de entrega: '+resp.data[0].deliveryEstimate +'</span>]'+
					'</label>'+
					'</div>');
				});

				$('#envio_carrier').val(carrier);
			} else {
				$('#rateSel').append('<div class="alert alert-danger text-center" role="alert">'+
				resp.error.message +
				'</div>');
			}
			console.log(resp);
		})
		.fail(function(resp) {
			console.log("error:");
			console.log(resp);
		});

	});

	const formatter = new Intl.NumberFormat('en-US', {
   minimumFractionDigits: 2,
   maximumFractionDigits: 2,
	});

	$(document).on('click', '.pakete', function(e) {

		var org_nums = {!! $cuentas !!} ;
		var inp = $('.pakete').attr('for');
		var pack = $('#'+inp).attr('data-serDesc');
		var service = $('#'+inp).attr('data-service');
		var price = parseFloat($('#'+inp).attr('data-price'));
		var org_price = parseFloat(org_nums.total)
		var org_iva = parseFloat(org_nums.iva)
		var ntotal = org_price + price;
		$('.paque').empty();
		$('.paqueprice').empty();
		$('.paque').text(pack);
		$('.paqueprice').text(price.toFixed(2));
		$('.ntotal').text(ntotal.toFixed(2));
		// console.log(pack);

		$('#envio_price').val(price);
		$('#envio_service').val(service);
	});

	$('#addDom').click(function(e) {
		e.preventDefault();
	});

	$('#closemod').click(function(e) {
		e.preventDefault();
	});

	$('#savedom').click(function(e) {
		e.preventDefault();
		var dom = $('#formdom').serializeArray();
		$.ajax({
			url: '{{ route('cart.storeDir') }}',
			type: 'post',
			dataType: 'json',
			data: dom
		})
		.done(function(msg) {
			if (msg.resp) {
				toastr["success"]("Domicilio agregado!");
				$('#formdom').trigger("reset");
				$('#addDomMod').modal('hide');
				setTimeout(function(){ window.location.reload(); }, 1500);
			} else {
				toastr["error"]("Error al agregar domicilio");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
		});

	});
});
</script>
@endsection
