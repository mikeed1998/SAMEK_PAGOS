<html>
<head>
	<meta content="text/html;charset=UTF-8" http-equiv="Content-Type">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		@if ($data['tipo'] == "contacto")
			{{ $data['asunto'] }}
		@else
			Comentario SAMEK
		@endif
	</title>
</head>

<body style="
	margin: 0;
	background: rgb(221, 221, 221);
	background-size: cover;
	background-repeat: no-repeat;
	background-position: center;
	font-family: Arial, Helvetica, sans-serif;
	box-shadow: inset 0 0 100px 1px #000000a5;
	">

	<div class="cont-correo">
		<div class="cont-sobre-blanco"><div class="correoMail">
			<div class="cont-correoMail">
				<img src="{{ asset('img/design/logo.png') }}" style="width: 200px;background:#FFF;padding: 5px;border-radius: 5px;">
				<div class="cont-correoMail-txt">
					<a href="{{url('/')}}" style="color:#000;">{{url('/')}}</a>
					@if ($config->telefono)
						Tel: {{$config->telefono}}
						<br /><br/>
					@endif
				</div>
				<div class="cont-correoMail-redes">
					<a href="{{$config->instagram}}">
						<img src="https://img.icons8.com/color/64/000000/instagram-new.png">
					</a>
					<a href="{{$config->facebook}}">
						<img src="https://img.icons8.com/color/64/000000/facebook.png">
					</a>
					<a href="https://wa.me/{{ $config->whatsapp }}">
						<img src="https://img.icons8.com/color/64/000000/whatsapp.png">
					</a>
				</div>
			</div>
		</div>
		<div class="Carta-back">
			<div class="cont-back-txt">
				<p>Nombre: <b> {{$data['nombre']}}</b></p>
				@if ($data['tipo'] == "contacto")
					<p>Telefono: <b> {{$data['telefono']}}</b></p>
				@endif
				<p>Correo: <b> {{$data['correo']}}</b></p>
				@if ($data['tipo'] == "contacto")
					<p>Asunto: <b> {{$data['asunto']}}</b></p>
				@endif
				<div class="cont-back-txt-centrado">
					<p class="back-txt-centrado">Comentarios: <br> <b style="text-align:justify;"> {{$data['mensaje']}}</b></p>
				</div>
		
				<!-- Fecha -->
				<div style="
					width:100%;
					text-align:center;
					color:#333;
					font-size:15px;
					padding:1em 0;
					">
					{{$data['hoy']}}
				</div><!-- Fecha -->
			</div>
		</div>
	</div>
</div>

</body>
</html>
