@extends('layouts.front')

@section('title', 'Pagar (Stripe)')

@section('styleExtras')

@endsection

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-sm-6 col-md-4 col-md-offset-4 mx-auto col-sm-offset-3">
        <h1>Pasarela de pago (Stripe)</h1>
        <h4>Total de la compra: ${{ $total }}</h4>
        <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
            {{ Session::get('error') }}
        </div>
        <form action="{{ route('checkoutStripe') }}" method="POST" id="checkout-form">
            @csrf
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" id="address" class="form-control" name="address" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-name">Nombre de la tarjeta</label>
                        <input type="text" id="card-name" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-number">Número de la tarjeta</label>
                        <input type="text" id="card-number" class="form-control" required>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-expiry-month">Mes de expiración</label>
                                <input type="text" id="card-expiry-month" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="card-expiry-year">Año de expiración</label>
                                <input type="text" id="card-expiry-year" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="card-cvc">CCV</label>
                        <input type="text" id="card-cvc" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Finalizar la compra</button>
        </form>
    </div>
</div>
@endsection

@section('jqueryExtra')
    <script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript" src="{{ asset('js/checkoutStripe.js') }}"></script>
@endsection
