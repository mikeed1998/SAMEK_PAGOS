@extends('layouts.front')

@section('title', 'Carrito de compras')

@section('styleExtras')

@endsection

@section('content')
@if (Session::has('cart'))
<div class="row mt-5 mb-5">
    <div class="col fs-1 text-center">
        Mi carrrito de compras
    </div>
</div>


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
                    <a href="{{ route('reduceByOne', ['id' => $product['item']['id']]) }}" class="btn btn-small bg-dark fs-5 text-white">Quitar uno</a>
                    <a href="{{ route('remove', ['id' => $product['item']['id']]) }}" class="btn btn-small bg-danger fs-5 text-white">Quitar todos</a>
                </div>
            @endforeach
        </div>

        {{-- <ul class="list-group">
            @foreach ($products as $product)
                <li class="list-group-item">
                    <span class="badge bg-secondary text-white">{{ $product['qty'] }}</span>
                    <strong>{{ $product['item']['nombre'] }}</strong>
                    <span class="badge bg-success text-white">
                        {{ $product['price'] }}
                    </span>
                    <div class="btn-group">
                        <button type="button" class="button btn btn-primary btn-xs dropdown-toggle" data-bs-toggle="dropdown">
                            Action <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('product.reduceByOne', ['id' => $product['item']['id']]) }}" class="dropdown-item">Reduce by 1</a>
                            </li>
                            <li>
                                <a href="{{ route('product.remove', ['id' => $product['item']['id']]) }}" class="dropdown-item">Reduce All</a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul> --}}
    </div>
</div>


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
</div>
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
