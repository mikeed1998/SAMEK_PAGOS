@extends('layouts.front')

@section('title', 'Soluciones')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/index.css')}}">
	<style>
        .carta {
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 0px;
            height: 334px;
            width: 100%; 
        }

        .cardo {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: white;
            background-color: rgba(0, 0, 0, 0.5); /* Ajusta la opacidad según tus necesidades */
            z-index: 0;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-top-left-radius: 16px;
            border-top-right-radius: 16px;
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 0px;
        }

        .cardo:hover .overlay {
            opacity: 1;
        }

        .cardo:hover .overlay > .textt {
            display: none;
        }

        .cardo-title, .cardo-body, .cardo-title {
            position: relative;
            z-index: 999;
            color: white; /* Fuente de color blanco */
        }

        .producto > .card {
            display: none;
        }
       
        .producto:hover > .card {
            display: block;
            border: none;
            background-color: rgba(243, 243, 243, 0.7);
        }
    </style>
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

@section('content')
<div class="container-fluid" style="box-shadow: inset 0 0 20px rgba(0, 0, 0, 0.1);">
	<div class="row">
		<div class="col text-center display-1 fw-bold" style="color: #00AD61;">
			Soluciones
		</div>
	</div>
	<div class="row py-4">
		<div class="col-4 border border-3"></div>
		<div class="col-4" style="border: 3px solid #1B44DD;"></div>
		<div class="col-4 border border-3"></div>
	</div>
	<div class="row">
		<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-11 col-xs-11 col-11 text-center mx-auto">
			{{ $elements[2]->texto }}
		</div>
	</div>

	<div class="row py-5">
		<div class="col-11 mx-auto">
			<div class="row">

				@foreach ($soluciones as $sol)
				<div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-11 col-xs-11 col-11 mx-auto py-5">
					<div class="card cardo border carta px-2" style="
						background-image: url('{{ asset('img2/photos/soluciones/'.$sol->imagen) }}');
						background-size: cover;
						background-repeat: no-repeat;
						background-position: center center;
						width: 100%;
					">
						<div class="overlay">
							<div class="card cardo border carta px-2" style="background-color:#1B44DD;">
								<div class="card-title cardo-title col-11 mx-auto fs-2 mt-3 fw-bolder">
									<span class="text-white">{{ $sol->titulo }}</span>
								</div>
								<div class="card-body cardo-body">
									<div class="row">
										<div class="col-9  mx-1" style="line-height: 1;">
											{{ $sol->descripcion }}
										</div>
									</div>
									<div class="row">
										<div class="col-12 text-end">
											<a href="#/">
												<img src="{{ asset('img/design/mision.png') }}" alt="" class="img-fluid">
											</a>
										</div>
									</div>
								</div>
							</div>
						</div> <!-- Overlay -->
						<div class="card-title col-11 mx-auto fs-2 mt-3 fw-bolder textt" style="color: #1B44DD;">
							{{ $sol->titulo }}
						</div>
						<div class="card-body">

						</div>
					</div>
				</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
@endsection

@section('jsLibExtras2')

@endsection

@section('jqueryExtra')
	
@endsection

