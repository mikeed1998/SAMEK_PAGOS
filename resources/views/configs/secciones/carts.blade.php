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

    <div class="container mt-5 mb-5 pt-5">
        <div class="row">
            <div class="col display-4 text-center">
                Historial de compras
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="container">
                    <h2>Filtro de compras</h2>
                    <p>Ingresa algún dato relevante sobre alguna compra realizada</p>  
                    <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
                    <br>
                    <ul class="row list-group" id="myList">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach ($ordenes as $order)
                            
                                <li class="col-12 list-group-item border-0">
                                    <div class="accordion-item" id="acc-{{ $order->id }}">
                                        <h2 class="accordion-header border-0">
                                            <button class="accordion-button collapsed border-0" style="box-shadow: none;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{ $order->id }}" aria-expanded="false" aria-controls="flush-collapse-{{ $order->id }}">
                                                <li class="col-11 list-group-item border-0">
                                                    <div class="row">
                                                        <div class="col-6 fs-5">
                                                            Usuario: {{ $order->name }} <a href="{{ route('config.seccion.usuario_detalle', ['usuario' => $order->user_id]) }}" class="btn btn-outline border"><i class="fa fa-user"></i></a>
                                                       
                                                        </div>
                                                        <div class="col-4 fs-5">
                                                           {{ $order->created_at->format('d/m/Y') }}
                                                        </div>
                                                        <div class="col-2 fs-5">
                                                            {{-- @if ($order->entregado == 1)
                                                                <div class="btn btn-sm btn-success">Entregado</div>
                                                            @else 
                                                                <div class="btn btn-sm btn-danger">No entregado</div>
                                                            @endif --}}
                                                            
                                                                @if ($order->entregado == 0)
                                                                <form action="{{ route('config.seccion.check', ['order' => $order->id]) }}" method="POST" id="fromuact-{{ $order->id }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="estado" value="1">
                                                                    <input type="submit" class="btn btn-sm btn-danger" value="No entregado">
                                                                </form>
                                                                @else
                                                                <form action="{{ route('config.seccion.check', ['order' => $order->id]) }}" method="POST" id="fromudeact-{{ $order->id }}">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="estado" value="0">
                                                                    <input type="submit" class="btn btn-sm btn-success" value="Emtregado">
                                                                </form>
                                                                @endif
                                                                
                                                            
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse-{{ $order->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                @php
                                                    $order->cart = unserialize($order->cart) 
                                                @endphp
                                                <div class="row">
                                                    <div class="col-6 fw-bolder">
                                                        Producto(s)
                                                    </div>
                                                    <div class="col-2 fw-bolder">
                                                        Cantidad
                                                    </div>
                                                    <div class="col-2 fw-bolder">
                                                        Precio (c/u)
                                                    </div>
                                                    <div class="col-2 fw-bolder">
                                                        Subtotal
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @foreach ($order->cart->items as $item)
                                                        <div class="col-6 border">
                                                            {{ $item['item']['nombre'] }}
                                                        </div>
                                                        <div class="col-2 border">
                                                            {{ $item['qty'] }}
                                                        </div>
                                                        <div class="col-2 border">
                                                            {{ ($item['qty'] > 1) ? $item['price'] / $item['qty'] : $item['price'] }}
                                                        </div>
                                                        <div class="col-2 border">
                                                            {{ $item['price'] }}
                                                        </div>
                                                    @endforeach 
                                                </div>
                                                <div class="row">
                                                    <div class="col-3 border fw-bolder">
                                                        Total pagado: {{ $order->cart->totalPrice }}
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>      
                                </li>

                            @endforeach
                        </div>
                    </ul>  
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    



@endsection

@section('jsLibExtras2')
   
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myList li").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>

@endsection

@section('jqueryExtra')


	

@endsection
