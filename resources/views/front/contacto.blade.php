@extends('layouts.front')

@section('title', 'Contacto')

@section('cssExtras')
<style>      
    @media(min-width: 1800px) {

    }
   
    /* xxl */
    @media (min-width: 1400px) {
        .mapa {
            height: 800px;
            width: 100%;
        }

    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1400px) {
        .mapa {
            height: 700px;
            width: 100%;
        }

    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1200px) {
        .mapa {
            height: 600px;
            width: 100%;
        }

    }

    /* md */
    @media (min-width: 768px) and (max-width: 992px) {
        .mapa {
            height: 500px;
            width: 100%;
        }

    }

    /* sm */
    @media (min-width: 576px) and (max-width: 768px) {
        .mapa {
            height: 400px;
            width: 100%;
        }
    }

    /* xs */
    @media (min-width: 0px) and (max-width: 576px) {
        .mapa {
            height: 300px;
            width: 100%;
        }

    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col py-5" style="background-color: #00AD61;">

            <form action="{{ route('formularioContac') }}" method="POST">
            @csrf
            <input type="hidden" name="tipo" value="contacto">
            <div class="row py-5">
                <div class="col-7 text-center mx-auto text-white display-1 fw-bold">
                    Contacto
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">
                            <div class="row">
                                <div class="col-md-11 col-12 py-2 bg-white" style="border-radius: 32px;">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <label for="nombre" class="fs-5 form-control border-0" style="color:#00AD61;">
                                                Nombre
                                            </label>
                                        </div>
                                        <div class="col-8 text-start" style="border-left: 1px solid #00AD61;">
                                            <input type="text" name="nombre" class="form-control border-0 fs-5" style="box-shadow: none; color:#00AD61;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3">
                            <div class="row">
                                <div class="col-12 py-2 bg-white" style="border-radius: 32px;">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <label for="correo" class="fs-5 form-control border-0" style="color:#00AD61;">
                                                Telefono
                                            </label>
                                        </div>
                                        <div class="col-8 text-start" style="border-left: 1px solid #00AD61;">
                                            <input type="number" name="telefono" class="form-control border-0 fs-5" style="box-shadow: none; color:#00AD61;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-xxl-5 mt-xl-5 mt-lg-5 mt-md-5 mt-sm-3 mt-xs-3 mt-3">
                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12">
                            <div class="row">
                                <div class="col-md-11 col-12 py-2 bg-white" style="border-radius: 32px;">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <label for="nombre" class="fs-5 form-control border-0" style="color:#00AD61;">
                                                Correo
                                            </label>
                                        </div>
                                        <div class="col-8 text-start" style="border-left: 1px solid #00AD61;">
                                            <input type="email" name="correo" class="form-control border-0 fs-5" style="box-shadow: none; color:#00AD61;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 col-12 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-3 mt-xs-3 mt-3">
                            <div class="row">
                                <div class="col-12 py-2 bg-white" style="border-radius: 32px;">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <label for="correo" class="fs-5 form-control border-0" style="color:#00AD61;">
                                                Asunto
                                            </label>
                                        </div>
                                        <div class="col-8 text-start" style="border-left: 1px solid #00AD61;">
                                            <input type="text" name="asunto" class="form-control border-0 fs-5" style="box-shadow: none; color:#00AD61;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-xxl-5 py-xl-5 py-lg-5 py-md-5 py-sm-3 py-xs-3 py-3">
                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-12 py-2 bg-white" style="border-radius: 32px;">
                            <div class="row">
                                <div class="coltext-center">
                                    <style>
                                        .placemensaje::placeholder {
                                            color: #00AD61;
                                            font-size: 20px;
                                        }
                                    </style>
                                    <textarea name="mensaje" id="" cols="30" rows="6" class="form-control border-0 placemensaje fs-5" style="box-shadow: none; color:#00AD61;" placeholder="Mensaje"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-7 col-xl-8 col-lg-9 col-md-11 col-sm-11 col-xs-11 col-11 mx-auto">
                    <div class="row">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-4 mt-xs-4 mt-4">
                           <div class="row mt-2">
                                <div class="col-8 mx-auto">
                                    <div class="row">
                                        <div class="col-4 text-start rounded-circle">
                                            <a href="https://wa.me/{{ $data->whatsapp }}" target="_blank">
                                                <img src="{{ asset('img/design/icono01.png') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-4 text-start">
                                            <a href="{{ $data->facebook }}">
                                                <img src="{{ asset('img/design/icono02.png') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-4 text-start">
                                            <a href="{{ $data->instagram }}">
                                                <img src="{{ asset('img/design/icono03.png') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 text-center mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-4 mt-xs-4 mt-4">
                            <div class="row">
                                <div class="col-9 mx-auto">
                                    <input type="submit" class="btn w-100 btn-outline py-3 fs-4 text-white px-0" style="background-color: #1B44DD; border-radius: 32px; text-decoration: none;" value="ENVIAR">
                                {{-- <a href="#/" class="btn w-100 btn-outline py-3 fs-4 text-white px-0" style="background-color: #1B44DD; border-radius: 32px; text-decoration: none;">ENVIAR</a> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 col-12 mt-xxl-0 mt-xl-0 mt-lg-0 mt-md-0 mt-sm-4 mt-xs-4 mt-4">
                            <div class="row mt-xxl-3 mt-xl-3 mt-lg-3 mt-md-0 mt-sm-0 mt-xs-0 mt-0">
                                <div class="col-3"></div>
                                <div class="col-9 mx-auto text-start fs-5 text-light" style="line-height: 2;">
                                    {{ $data->direccion }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            </form>

        </div>
    </div>
    <div class="row">
        <div class="col px-0">
            <!--Google map  map-container-->
            <div id="map-container-google-1" >
               {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14934.698168984944!2d-103.3966255!3d20.6421186!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1ses-419!2smx!4v1685136732153!5m2!1ses-419!2smx" class="mapa" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
            </div>
            <!--Google Maps-->
            <style>
                iframe {
                    width: 100%;
                    height: 1000px;
                }
            </style>
            {!! $data->mapa !!}
        </div>
    </div>
</div>
@endsection

@section('jsLibExtras2')

@endsection

@section('jqueryExtra')
	
@endsection
