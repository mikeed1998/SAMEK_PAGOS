@extends('layouts.front')

@section('cssExtras')
@endsection

@section('styleExtras')
@endsection

@section('content')
<div class="container mt-5 mb-5 py-5 border" style="border-radius: 16px;">
    @if (Session::has('success'))
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
            <div id="charge-message" class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
    @endif

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link fs-1 active" id="tab1-tab" data-bs-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
                Mis datos
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link fs-1" id="tab2-tab" data-bs-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
                Mi historial de compras
            </a>
        </li>
    </ul>
      
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <div class="row">
                <div class="col-12 fs-1 text-center">
                    Mi perfil
                </div>
                <div class="col-9 mx-auto ">
                    <div class="row">
                        <div class="col fs-2">
                            Mis datos
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small>Si desea modificar algún dato, llene el recuadro correspondiente y presio el boton "Actualizar"</small>
                        </div>
                    </div>
                </div>
                <div class="col-9 mx-auto py-5">
                    <form action="{{ route('front.datosPerfil', ['user' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-3 py-2 fs-5">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" name="nombre_">
                        </div>
                        <div class="col-3 py-2 fs-5">
                            <label for="">Apellidos</label>
                            <input type="text" class="form-control" value="{{ $user->lastname }}" name="apellidos_">
                        </div>
                        <div class="col-3 py-2 fs-5">
                            <label for="">Telefono</label>
                            <input type="text" class="form-control" value="{{ $user->telefono }}" name="telefono_">
                        </div>
                        <div class="col-3 py-2 fs-5">
                            <label for="">Nombre de usuario</label>
                            <input type="text" class="form-control" value="{{ $user->username }}" name="usuario_">
                        </div>
                        <div class="col-6 py-2">
                            <label for="">Dirección</label>
                            <input type="text" class="form-control" value="{{ $user->address }}" name="direccion_">
                        </div>
                        <div class="col-3 py-2">
                            <label for="">Colonia</label>
                            <input type="text" class="form-control" value="{{ $user->colonia }}" name="colonia_">
                        </div>
                        <div class="col-3 py-2">
                            <label for="">Código Postal</label>
                            <input type="text" class="form-control" value="{{ $user->codigo_postal }}" name="codigop_">
                        </div>
                        <div class="col-3">
                            <label for="">Estado</label>
                            <input type="text" class="form-control" value="{{ $user->estado }}" name="estado_">
                        </div>
                        <div class="col-3">
                            <label for="">Municipio</label>
                            <input type="text" class="form-control" value="{{ $user->municipio }}" name="municipio_">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mx-auto py-3">
                            <input type="submit" class="btn w-100 btn-outline text-white fs-5 border" style="background-color: #00AD61;" value="Actualizar">
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <div class="row">
                <div class="col-md-9 mx-auto col-md-offset-4">
                    <h2 class="fs-1 text-center">Historial de compras</h2>
        
                    <div class="row">
                        @foreach ($orders as $order)
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
                                <p class="m-0 fs-4 py-2"> Total pagado: ${{ $order->cart->totalPrice }} </p>
                                <small>Fecha de la compra: {{ $order->created_at->format('d/m/Y') }}</small>
                            </div>
                            <hr class="border-bottom border-dark border-4">
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
      
    

    
    <hr class="border-bottom border-dark border-4">
    
</div>
@endsection

@section('jsLibExtras2')
<script src="{{ asset('js/modules/admin.js') }}"></script>
@endsection
