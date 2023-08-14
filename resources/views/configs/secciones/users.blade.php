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


    <div class="container-fluid py-5 mt-5 mb-5">
        <div class="row">
            <div class="col py-5 display-5 text-center">
                Lista de usuarios
            </div>
        </div>
        <div class="row">
            <div class="col-6 border bg-white mx-auto" style="border-radius: 16px;">
                <ul class="list-group border-0">
                    @foreach ($usuarios as $usu)
                        <li class="list-group-item border-0">
                            <div class="row border-0 border-bottom">
                                <div class="col-6 fs-5">
                                    {{ $usu->name . " ". $usu->lastname }}
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-sm" href="{{ route('config.seccion.usuario_detalle', ['usuario' => $usu->id]) }}"><i class="fa fa-user"></i>Ver detalle</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>



@endsection

@section('jsLibExtras2')
   

    
@endsection

@section('jqueryExtra')


	

@endsection
