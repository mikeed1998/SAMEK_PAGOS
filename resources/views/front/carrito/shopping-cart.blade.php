@extends('layouts.front')

@section('title', 'Carrito de compras')

@section('styleExtras')

@endsection

@section('content')
@if (Session::has('cart'))



<section class="py-5" style="background-color: #eee;">
    <div class="container py-0">
      <div class="row">
        <div class="col text-center text-white fs-5">
          @if($mensaje)
          <div class="alert alert-danger">
              {{ $mensaje }}
          </div>
          @else
          @endif
        </div>
    </div>
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-10">
  
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-normal mb-0 text-black">Mis productos en carrito</h3>
            <div>
              
            </div>
          </div>
  
          
  @foreach ($products as $prod)
  <div class="card rounded-3 mb-3">
    <div class="card-body p-4">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-md-2 col-lg-2 col-xl-2">
          <img
            src="{{ asset('img2/photos/productos/'.$prod['item']['imagen']) }}"
            class="img-fluid rounded-3" alt="Cotton T-shirt">
        </div>
        <div class="col-md-4 col-lg-4 col-xl-4">
          <p class="lead fw-normal mb-2">
                {{ $prod['item']['nombre'] }}
          </p>
          <p>
            Cantidad: {{ $prod['qty'] }}
          </p>
        </div>
        <div class="col-md-1 col-lg-1 col-xl-1 offset-lg-1">
            <h5 class="mb-0">${{ $prod['price'] }}</h5>
          </div>
        <div class="col-md-3 col-lg-3 col-xl-3 d-flex">
          <div class="row">
            <div class="col-12 py-1">
              <a href="{{ route('addToCart', ['id' => $prod['item']['id'], 'pag' => 'shopping']) }}" class="btn btn-sm w-100 bg-dark text-white">Agregar uno</a>
            </div>
            <div class="col-12 py-1">
                <a href="{{ route('reduceByOne', ['id' => $prod['item']['id']]) }}" class="btn btn-sm w-100 bg-dark text-white">Quitar uno</a>
            </div>
            <div class="col-12 py-1">
                <a href="{{ route('remove', ['id' => $prod['item']['id']]) }}" class="btn btn-sm w-100 bg-danger text-white">Quitar todos</a>
            </div>
          </div>
        </div>
        
       
      </div>
    </div>
  </div>
  @endforeach
        
          
        
  
          <div class="card mt-1 mb-1">
            <div class="card-body">
                <strong>Total de todos los productos: ${{ $totalPrice }}</strong>
            </div>
          </div>

          <div class="card mt-3">
            <div class="card-body">
                <a href="{{ route('getcheckoutConekta') }}" type="button" class="btn btn-success fs-5 fw-bolder" style="text-decoration: none;">
                    Proceder al pago
                </a>
            </div>
          </div>
  
        </div>
      </div>
    </div>
  </section>

{{-- 
<div class="row">
    <div class="col-sm-9 col-md-9 mx-auto col-md-offset-3 col-sm-offset-3">

        <div class="row fs-5 fw-bolder border">
            <div class="col-1 border">
                Cantidad
            </div>
            <div class="col-5 border">
                Producto
            </div>
            <div class="col-3 border">
                Total por producto
            </div>
            <div class="col-3 border">
                Acciones
            </div>
        </div>
        <div class="row fs-5">
            @foreach ($products as $product)
             
                <div class="col-1 border">
                    {{ $product['qty'] }}
                </div>
                <div class="col-5 border">
                    {{ $product['item']['nombre'] }}
                </div>
                <div class="col-3 border">
                    {{ $product['price'] }}
                </div>
                <div class="col-3 border">
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ route('reduceByOne', ['id' => $product['item']['id']]) }}" class="btn btn-sm bg-dark text-white">Quitar uno</a>

                        </div>
                        <div class="col-6">
                            <a href="{{ route('remove', ['id' => $product['item']['id']]) }}" class="btn btn-sm bg-danger text-white">Quitar todos</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
 --}}
{{-- 
<div class="row">
    <div class="col-sm-9 col-md-9 mx-auto col-md-offset-3 col-sm-offset-3 fs-4">
        <strong>Total de todos los productos: {{ $totalPrice }}</strong>
    </div>
</div>
<div class="row mb-5">
    <div class="col-sm-9 col-md-9 mx-auto col-md-offset-3 col-sm-offset-3 text-center">
        <a href="{{ route('getcheckoutConekta') }}" type="button" class="btn btn-success fs-5 fw-bolder" style="text-decoration: none;">
            Proceder al pago
        </a>
    </div>
</div> --}}
@else
<div class="row">
    <div class="col-sm-12 mt-5 mb-5 py-5 col-md-12 col-md-offset-3 col-sm-offset-3 fs-5 text-center">
        <h2>No tienes productos en el carrito</h2>
    </div>
</div>
@endif
@endsection

@section('jqueryExtra')

@endsection
