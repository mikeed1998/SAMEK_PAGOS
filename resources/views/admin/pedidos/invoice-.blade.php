<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Orden de pago #{{$pedido->id}}</title>

	<style>
		.invoice-box {
			/* max-width: 800px; */
			margin: auto;
			/* padding: .5em; */
			/* border: 1px solid #eee;
			box-shadow: 0 0 10px rgba(0, 0, 0, .15); */
			font-size: 16px;
			line-height: 24px;
			font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			color: #555;
		}

		.invoice-box table {
			width: 100%;
			line-height: inherit;
			text-align: left;
		}

		.invoice-box table td {
			padding: 5px;
			vertical-align: top;
		}

		.invoice-box table tr td:nth-child(2) {
			text-align: right;
		}

		.invoice-box table tr.top table td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.top table td.title {
			font-size: 45px;
			line-height: 45px;
			color: #333;
		}

		.invoice-box table tr.information table td {
			padding-bottom: 40px;
		}

		.invoice-box table tr.heading td {
			background: #eee;
			border-bottom: 1px solid #ddd;
			font-weight: bold;
		}

		.invoice-box table tr.details td {
			padding-bottom: 20px;
		}

		.invoice-box table tr.item td {
			border-bottom: 1px solid #eee;
		}

		.invoice-box table tr.item.last td {
			border-bottom: none;
		}

		.invoice-box table tr.total td:nth-child(2) {
			border-top: 2px solid #eee;
			font-weight: bold;
		}

		@mediaonly screen and (max-width: 600px) {
			.invoice-box table tr.top table td {
				width: 100%;
				display: block;
				text-align: center;
			}

			.invoice-box table tr.information table td {
				width: 100%;
				display: block;
				text-align: center;
			}
		}

		/** RTL **/
		.rtl {
			direction: rtl;
			font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		}

		.rtl table {
			text-align: right;
		}

		.rtl table tr td:nth-child(2) {
			text-align: left;
		}
	</style>
</head>

<body>
	<div class="invoice-box">
		<table cellpadding="0" cellspacing="0">
			<tr class="top">
				<td colspan="4">
					<table>
						<tr>
							<td class="title">
								<img src="https://gropius.com.mx/img/design/logo.png" style="width:100%; max-width:300px;">
								{{-- <img src="{{ asset('img/design/logo.png')}}" style="width:100%; max-width:300px;"> --}}
								{{-- <img src="{{ url('img/design/logo.png')}}" style="width:100%; max-width:300px;"> --}}
							</td>

							<td>
								Orden #: {{$pedido->id}}<br>
								Creada: {{date("d/m/Y", strtotime($pedido->created_at))}}<br>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr class="information">
				<td colspan="4">
					<table>
						<tr>
							<td>
								{{$config->title}} <br>
								{{$config->telefono}} <br>
								{{$config->remitente}} <br>
							</td>

							<td>
								{{$pedido->usuario->name}} {{$pedido->usuario->lastname}}<br>
								Tel: {{$pedido->usuario->telefono}}<br>
								Email: {{$pedido->usuario->email}}
							</td>
						</tr>
					</table>
				</td>
			</tr>

			{{-- <tr class="heading">
				<td>
					Metodo de Pago
				</td>

				<td>
					Check #
				</td>
			</tr>

			<tr class="details">
				<td>
					Check
				</td>

				<td>
					1000
				</td>
			</tr> --}}

			<tr class="heading">
				<td>
					Item
				</td>
				<td>
					Cant
				</td>
				<td>
					Precio
				</td>
				<td>
					Importe
				</td>
			</tr>
			@foreach ($detalles as $det)
			<tr class="item">
				<td>
					{{$det->producto->titulo_es}}
				</td>

				<td>
					{{$det->cantidad}}
				</td>
				<td>
					{{$det->precio}}
				</td>
				<td>
					{{$det->importe}}
				</td>
			</tr>
			@endforeach

			{{-- <tr class="item last">
				<td>
					Domain name (1 year)
				</td>

				<td>
					$10.00
				</td>
			</tr> --}}
			<tr class="item">
				<td>
					Envío
				</td>
				<td> </td>
				<td> </td>
				<td>
					{{$pedido->envio}}
				</td>
			</tr>

			<tr class="item">
				<td> </td>
				<td> </td>
				<td> </td>

				<td>
					SubTotal: ${{ $pedido->importe}}
				</td>
			</tr>
			@if ($pedido->iva)
				<tr class="item">
					<td> </td>
					<td> </td>
					<td> </td>

					<td>
						IVA: ${{$pedido->iva}}
					</td>
				</tr>
			@endif
			<tr class="total">
				<td> </td>
				<td> </td>
				<td> </td>
				<td>
					Total: ${{$pedido->importe}}
				</td>
			</tr>
			<tr class="heading">
				<td colspan="4">
					Datos Bancarios
				</td>
			</tr>
			<tr class="details">
				<td colspan="3">
					{!! nl2br($config->banco)!!}
				</td>
			</tr>
		</table>
	</div>
</body>

</html>
