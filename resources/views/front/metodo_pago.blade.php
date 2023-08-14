@extends('layouts.front')

@section('title', 'Métodos de pago')

@section('content')
<section>
	<section>
		<div class="bg-global">
			<div class="col-12 text-center p-4" style="background-color: black; color: white;">
				<div class="d-inline" style="font-size:24px;color: white;">Métodos de pago</div>
			</div>
		</div>
	</section>

    <div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
        <div class="col-12 col-md-8 p-4 mx-auto bg-white" style="border: .5em solid #e6e6e6;">
            {!! $metodos_pago->descripcion !!}
        </div>
    </div>

    <section>
		<div class="bg-global">
			<div class="col-12 text-center p-4" style="background-color: black; color: white;">
				<div class="d-inline" style="font-size:24px;color: white;">Devoluciones</div>
			</div>
		</div>
	</section>

    <div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
        <div class="col-12 col-md-8 p-4 mx-auto bg-white" style="border: .5em solid #e6e6e6;">
            {!! $devoluciones->descripcion !!}
        </div>
    </div>

    <section>
		<div class="bg-global">
			<div class="col-12 text-center p-4" style="background-color: black; color: white;">
				<div class="d-inline" style="font-size:24px;color: white;">Garantias</div>
			</div>
		</div>
	</section>

    <div class="my-4 p-5" style="background:url(img/photos/nosotros/bg-contacto.png);/* background-repeat: no-repeat; */background-position: center;">
        <div class="col-12 col-md-8 p-4 mx-auto bg-white" style="border: .5em solid #e6e6e6;">
            {!! $garantias->descripcion !!}
        </div>
    </div>

</section>				

@endsection

@section('jsLibExtras2')
@endsection

@section('jqueryExtra')
@endsection
