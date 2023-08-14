@extends('layouts.admin')

@section('cssExtras')
<link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>

    <style>      
        @media(min-width: 1800px) {

        }
    
        /* xxl */
        @media (min-width: 1400px) {
           
        }

        /* xl */
        @media (min-width: 1200px) and (max-width: 1400px) {
            

        }

        /* lg */
        @media (min-width: 992px) and (max-width: 1200px) {
         
        }

        /* md */
        @media (min-width: 768px) and (max-width: 992px) {
          

        }

        /* sm */
        @media (min-width: 576px) and (max-width: 768px) {
          

        }

        /* xs */
        @media (min-width: 0px) and (max-width: 576px) {
           
        }
    </style>
	

@endsection

@section('jsLibExtras')

@endsection

@section('styleExtras')

@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="card fs-5 text-center">
        <div class="card-header">
            {{ $usuario->name ." ". $usuario->lastname }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3 py-2 fs-5">
                    <label for="">Telefono</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->telefono }}" name="telefono_">
                </div>
                <div class="col-3 py-2 fs-5">
                    <label for="">Nombre de usuario</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->username }}" name="usuario_">
                </div>
                <div class="col-6 py-2">
                    <label for="">Dirección</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->address }}" name="direccion_">
                </div>
                <div class="col-3 py-2">
                    <label for="">Colonia</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->colonia }}" name="colonia_">
                </div>
                <div class="col-3 py-2">
                    <label for="">Código Postal</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->codigo_postal }}" name="codigop_">
                </div>
                <div class="col-3 py-2">
                    <label for="">Estado</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->estado }}" name="estado_">
                </div>
                <div class="col-3 py-2">
                    <label for="">Municipio</label>
                    <input disabled type="text" class="form-control" value="{{ $usuario->municipio }}" name="municipio_">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <small>Solo el usuario propietario puede modificar sus datos</small>
                </div>
            </div>
        </div>
        <div class="card-footer text-body-secondary">
            Cuenta creada el {{ $usuario->created_at->format('d/m/Y')  }}
        </div>
      </div>

@endsection

@section('jsLibExtras2')

    
@endsection

@section('jqueryExtra')


	

@endsection
