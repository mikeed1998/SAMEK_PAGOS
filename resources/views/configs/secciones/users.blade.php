@extends('layouts.admin')

@section('cssExtras')
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

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="accordion" id="accordionExample">
                    @foreach ($usuarios as $usu)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" style="box-shadow: none;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-{{ $usu->id }}" aria-expanded="true" aria-controls="collapseOne-{{ $usu->id }}">
                                {{ $usu->name }} {{ $usu->lastname }} | {{ $usu->username }}
                            </button>
                        </h2>
                        <div id="collapseOne-{{ $usu->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="row">
                                    @foreach ($ordenes as $order)
                                        <div class="row mt-5">
                                            <div class="col-8 fs-5 fw-bolder border">
                                                Producto
                                            </div>
                                            <div class="col-2 text-center fs-5 fw-bolder border">
                                                Unidades
                                            </div>
                                            <div class="col-2 fs-5 fw-bolder border">
                                                Total individual
                                            </div>
                                        </div>
                                        <div class="row">
                                        @foreach ($order->cart->items as $item)
                                            <div class="col-8 fs-5 fw-normal border">
                                                {{ $item['item']['nombre'] }}
                                            </div>
                                            <div class="col-2 text-center fs-5 fw-normal border">
                                                {{ $item['qty'] }}
                                            </div>
                                            <div class="col-2 fs-5 fw-normal border">
                                                ${{ $item['price'] }}
                                            </div>
                                        @endforeach
                                    </div>
                                        <div class="col-12 text-start fs-4 fw-bolder">
                                            Total pagado: ${{ $order->cart->totalPrice }}
                                        </div>
                                    @endforeach
                                </div>
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
