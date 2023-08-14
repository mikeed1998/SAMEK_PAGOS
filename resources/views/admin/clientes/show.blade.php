@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('clientes.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<!--a href="" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a-->
	</div>

	<div class="card ">
		<div class="card-header" style="background-color:rgba(219, 219, 219, .5);">
			<h4>Datos generales</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="text-center col-md-4">
					<img src="https://img.pngio.com/user-avatar-png-images-vector-and-psd-files-free-download-on-male-png-360_360.png" class="img-fluid" alt="{{$user->name}}" style="height:280px">
				</div>
				<div class="col-md-8">
					<nav>
					  	<div class="nav nav-tabs" id="nav-tab" role="tablist">
						    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Datos</a>
						    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Domicilios</a>
						    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Facturación</a>
					  	</div>
					</nav>
					<div class="tab-content" id="nav-tabContent">
					  	<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					  		<h5 class="card-title">Datos de Generales</h5>
							<hr>
					  		<div class="form-row">
					  			<div class="form-group col-md-6">
								    <label for="nombre">Nombre</label>
								    <input type="text" class="form-control" value="{{$user->name}}" readonly>
								</div>
							    <div class="form-group col-md-6">
							      <label for="apellidos">Apellidos</label>
							      <input type="text" class="form-control" value="{{$user->lastname}}" readonly>
							    </div>

							    <div class="form-group col-md-6">
							      <label for="nombre">Username</label>
							      <input type="text" class="form-control" value="{{$user->username}}" readonly>
							    </div>
							    <div class="form-group col-md-6">
							      <label for="email">Email</label>
							      <input type="text" class="form-control" value="{{$user->email}}" readonly>
							    </div>
							    <div class="form-group col-md-6">
							    	<label for="tel">Telefono</label>
							    	<input type="text" class="form-control"  value="{{$user->telefono}}"  readonly>
							    </div>
							    <div class="form-group col-md-6">
							    	<label for="rfc">RFC</label>
							    	<input type="text" class="form-control"  value="{{$user->rfc}}" readonly>
							    </div>
					  		</div>
					  	</div>
					  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					  	<h5 class="card-title">Domicilios</h5>
							<hr>
					  		@foreach ($domicilios as $dom)
					  			<div class="card m-3">
									<div class="card-header text-center text-uppercase">
										{{$dom->alias}}
									</div>
									<div class="card-body">
										<span class="text-muted">Calle: </span>{{$dom->calle}} #{{$dom->numext}} 
										@if (strlen($dom->numint)>0)
											Int. {{$dom->numint}} 
										@endif
										<br>
										<span class="text-muted">Entre calles:</span> {{$dom->entrecalles}}  <br>
										<span class="text-muted">Colonia: </span>{{$dom->colonia}}<span class="text-muted">CP:</span> {{$dom->cp}} <br>
										<span class="text-muted">Municipio: </span>{{$dom->municipio}} <span class="text-muted">Estado:</span> {{$dom->estado}}
									</div>
								</div>
					  		@endforeach
					  		
					  </div>
					  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
						<h5 class="card-title">Datos de facturación</h5>
						<hr>
						<div class="form-row mt-3">
							<div class="form-group col-md">
								<label for="rfc" class="active">RFC</label>
								<input type="text" class="form-control"  value="{{$factura->rfc}}" readonly>
							</div>
							<div class="form-group col-md">
								<label for="razonsc" class="active">Razon Social</label>
								<input type="text" class="form-control"  value="{{$factura->razon_social}}" readonly>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md col">
								<label for="address" class="active">Calle</label>
								<input type="text" class="form-control"  value="{{$factura->calle}}" readonly>
							</div>
							<div class="form-group col-md col">
								<label for="number" class="active">Numero exterior</label>
								<input type="text" class="form-control"  value="{{$factura->numext}}" readonly>
							</div>
							<div class="form-group col-md col">
								<label for="numint" class="active">Numero int</label>
								<input type="text" class="form-control"  value="{{$factura->numint}}" readonly>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md col">
								<label for="entrecalles" class="active">Colonia</label>
								<input type="text" class="form-control" id="entrecalles" value="{{$factura->colonia}}" readonly>
							</div>
							<div class="form-group col-md">
								<label for="municipio" class="active">Municipio</label>
								<input type="text" class="form-control" value="{{$factura->minicipio}}" readonly>
							</div>
							<div class="form-group col-md">
								<label for="cp" class="active">CP</label>
								<input type="text" class="form-control" value="{{$factura->cp}}" readonly>
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md">
								<label for="estado">Estado</label>
								<input type="text" class="form-control" value="{{$factura->estado}}" readonly>
							</div>
							<div class="form-group col-md">
								<label for="mail" class="active">Email</label>
								<input type="email" class="form-control" value="{{$factura->mail}}" readonly>
							</div>
						</div>
					
					  </div>
					</div>
				    
				</div> 
			</div>

		</div>
	</div>
	<div class="card mt-3">
		<div class="card-header" style="background-color:rgba(219, 219, 219, .5);">
			<h4>Pedidos Realizados {{sizeof($pedidos)}}</h4>
		</div>
		<div class="card-body">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">No. Orden</th>
			      <th scope="col">Fecha</th>
			      <th scope="col">Estatus</th>
			      <th scope="col">Importe</th>
			    </tr>
			  </thead>
			  <tbody>
			  	
			  	@foreach($pedidos as $ped)
			  		<tr>
				      <th scope="row" style="width: 3rem;">{{$ped->id}}</th>
				      <td>{{$ped->created_at}}</td>
				      <td>{{$ped->estatus}}</td>
				      <td>${{$ped->importe}}</td>
				    </tr>

			  	@endforeach
			    
			  </tbody>
			</table>
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