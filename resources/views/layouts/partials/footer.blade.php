<footer>
    <div class="container-fluid" style="background-color: #1B44DD;">
        <div class="row py-5">
            <div class="col-11 mx-auto">
                <div class="row py-3">
                    <div class="col-xxl-6 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 col-11 mx-auto mt-3">
                        <div class="row">
                            <div class="col">
                                <img src="{{ asset('img/design/logo02.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-xxl-1 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-4 text-start rounded-circle">
                                <a href="https://wa.me/{{ $data->whatsapp }}" target="_blank">
                                    <img src="{{ asset('img/design/icono01.png') }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-xxl-1 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-4 text-start">
                                <a href="{{ $data->facebook }}" target="_blank">
                                    <img src="{{ asset('img/design/icono02.png') }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-xxl-1 col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-4 text-start">
                                <a href="{{ $data->instagram }}" target="_blank">
                                    <img src="{{ asset('img/design/icono03.png') }}" alt="" class="img-fluid">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12 col-11 mx-auto text-white mt-xxl-1 mt-xl-1 mt-lg-1 mt-md-5 mt-sm-3 mt-xs-3 mt-3">
                        <div class="row">
                            <div class="col-md-4 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3 mt-3 text-start">
                                <div class="row">
                                    <div class="col-12 py-0 mb-3 fs-4 fw-bolder">
                                        NAVEGACIÓN
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.index') }}" style="text-decoration: none; color: #BCBCB0;">Inicio</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.tienda') }}" style="text-decoration: none; color: #BCBCB0;">Tienda</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.soluciones') }}" style="text-decoration: none; color: #BCBCB0;">Soluciones</a>
                                    </div>
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.aboutus') }}" style="text-decoration: none; color: #BCBCB0;">Nosotros</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3 text-start">
                                <div class="row">
                                    <div class="col py-0 mb-3 fs-4 fw-bolder">
                                        AYUDA
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.preguntas') }}" style="text-decoration: none; color: #BCBCB0;">Preguntas Frecuentes</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.aviso_privacidad') }}" style="text-decoration: none; color: #BCBCB0;">Aviso de Privacidad</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        <a href="{{ route('front.metodos_pago') }}" style="text-decoration: none; color: #BCBCB0;">Métodos de Pago</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3 mt-3 text-start">
                                <div class="row">
                                    <div class="col py-0 mb-3 fs-4 fw-bolder">
                                        CONTACTO
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                        Tel. {{ $data->telefono }} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 py-1" style="color: #BCBCB0;">
                                     
                                        {{ $data->direccion }}
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col py-3 text-center" style="background-color: #163AC2; color: #BCBCB0;">
                SAMEK 2023 TODOS LOS DERECHOS RESERVADOS DISEÑO POR WOZIAL
            </div>
        </div>
    </div>
</footer>