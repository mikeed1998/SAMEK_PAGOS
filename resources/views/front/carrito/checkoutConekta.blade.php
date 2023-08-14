@extends('layouts.front')

@section('title', 'Pagar (Conekta)')

@section('styleExtras')

@endsection

@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col text-center display-5 fw-bolder py-3">Finalizar compra</div>
    </div>
	<div class="row">
        <div class="col-6 p-5 mx-auto" style="border: 2px solid black; border-radius: 16px;">
            <form action="{{ route('postcheckoutConekta') }}" method="POST" id="card-form">
                @csrf
        
                <div class="form-group row">
                    <div class="col-9">
                        
                        <img src="https://uploads-ssl.webflow.com/60ba7edb928ca1af6fd7612e/621e7b30da832e994d0200a7_Conekta_Imagotipo_Color-01.svg" alt="">
                        
                        <span class="card-errors"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col fs-5 fw-bolder">Total de la compra: ${{ $total }}</div>
                </div>
                <div class="form-group row">
                    <div class="mt-3 col">
                        <label for="" class="fs-5">Nombre</label>
                        <input class="form-control fs-5 border-0 border-bottom border-dark" size="20" data-conekta="card[name]" type="text" placeholder="Nombre del tarjetahambiente" style="box-shadow: none;">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mt-3 col">
                        <label for="" class="fs-5">Número de tarjeta</label>
                        <input class="form-control fs-5 border-0 border-bottom border-dark" size="20" data-conekta="card[number]" type="text" placeholder="Número de tarjeta de crédito" style="box-shadow: none;">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mt-3 col-2">
                        <label for="" class="fs-5">CVC</label>
                        <input class="form-control fs-5 border-0 border-bottom border-dark" maxlength="4" data-conekta="card[cvc]" type="text" placeholder="CVC" style="box-shadow: none;">
                    </div>
                    <div class="mt-3 col-2">
                        <label for="" class="fs-5">Mes/exp</label>
                        <input maxlength="2" data-conekta="card[exp_month]" type="text" class="form-control fs-5 border-0 border-bottom border-dark" placeholder="MM" style="box-shadow: none;">
                    </div>
                    <div class="mt-3 col-2">
                        <label for="" class="fs-5">Año/exp</label>
                        <input  maxlength="4" data-conekta="card[exp_year]" type="text" class="form-control fs-5 border-0 border-bottom border-dark" placeholder="AAAA" style="box-shadow: none;">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="mt-4 col-4 fs-5 text-center">
                        <button class="btn w-100 btn-outline text-white fw-bolder fs-5" type="submit" style="background-color: #00AD61; box-shadow: none;">Finalizar pago</button>
                    </div>
                </div>
        
                  
                <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('jqueryExtra')
    <script type="text/javascript" src="/javascripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <script type="text/javascript" >
        // Conekta.setPublicKey('key_Cf6xwVgweFHiqVvzixk5VEQ');
        Conekta.setPublicKey('key_Nd9OEqq52Cb3jDrzzGodG1Y');
        
      
        var conektaSuccessResponseHandler = function(token) {
          var $form = $("#card-form");
          //Inserta el token_id en la forma para que se envíe al servidor
           $form.append($('<input name="conektaTokenId" id="conektaTokenId" type="hidden">').val(token.id));
          $form.get(0).submit(); //Hace submit
        };
        var conektaErrorResponseHandler = function(response) {
          var $form = $("#card-form");
          $form.find(".card-errors").text(response.message_to_purchaser);
          $form.find("button").prop("disabled", false);
        };
      
        //jQuery para que genere el token después de dar click en submit
        $(function () {
          $("#card-form").submit(function(event) {
            var $form = $(this);
            // Previene hacer submit más de una vez
            $form.find("button").prop("disabled", true);
            Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
            return false;
          });
        });
      </script>
@endsection
