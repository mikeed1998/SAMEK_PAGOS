@extends('layouts.front')

@section('title', 'Preguntas Frecuentes')

@section('content')
<section>
	<section>
		<div class="bg-global">
			<div class="col-12 p-4" style="background-color: black; color: white;">
				<div class="d-inline" style="font-size:24px;color: white;">Preguntas Frecuentes</div>
			</div>
		</div>
	</section>

	<div class="container my-4 p-5" style="min-height:55vh">
	
	    <div class="container">
	        <div class="row">
	            <div class="col-9 mx-auto">
	                @foreach($preguntas as $faq)
	                    <div class="row bg-dark rounded">
	                        <div class="col">
	                            <h2 class="text-white text-center">
	                                {{ $faq->pregunta }}
	                            </h2>
	                        </div>
	                    </div>
	                    <div class="row">
	                        <div class="col py-2">
	                            <strong>{!! $faq->respuesta !!}</strong>
	                        </div>
	                    </div>
	                @endforeach
	            </div>
	        </div>
	    </div>
	
	    {{--
		<div class="col-8 mx-auto">
			<div class="accordion" id="accordionExample">
				@foreach ($preguntas as $faq)

				@php
					if ($loop->first) {
						$expfirst = "show";
					}else{
						$expfirst = "";
					}
				@endphp
	
				<div class="card">
					<div class="card-header" id="headingOne" style="background-color:#000;">
					<h2 class="mb-0" >
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{!!  $faq->id  !!}" aria-expanded="" aria-controls="collapseOne" style="color:#fff">
						{{ $faq->pregunta }}
						</button>
					</h2>
					</div>

					<div id="collapse{!!  $faq->id  !!}" class="collapse {{$expfirst}}" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							{!! $faq->respuesta !!}
						</div>
					</div>
				</div>
					
				@endforeach
			</div>
		</div>
		--}}
	</div>
</section>				

@endsection

@section('jsLibExtras2')
@endsection

@section('jqueryExtra')
@endsection
