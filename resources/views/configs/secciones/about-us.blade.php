@extends('layouts.admin')

@section('cssExtras')
<style>
    .carta {
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 0px;
        height: 300px;
        width: 100%; 
    }

    .cardo {
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        color: white;
        background-color: rgba(0, 0, 0, 0.5); /* Ajusta la opacidad según tus necesidades */
        z-index: 0;
        opacity: 0;
        transition: opacity 0.3s ease;
        border-top-left-radius: 16px;
        border-top-right-radius: 16px;
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 0px;
    }

    .cardo:hover .overlay {
        opacity: 1;
    }

    .cardo:hover .overlay > .textt {
        display: none;
    }

    .cardo-title, .cardo-body, .cardo-title {
        position: relative;
        z-index: 999;
        color: white; /* Fuente de color blanco */
    }

    .producto > .card {
        display: none;
    }
   
    .producto:hover > .card {
        display: block;
        border: none;
        background-color: rgba(243, 243, 243, 0.7);
    }
</style>
<style>      
    @media(min-width: 1800px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 940px;
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 940px; 
            border-bottom-left-radius: 360px;
        }
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1800px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 700px; 
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 700px; 
            border-bottom-left-radius: 360px;
        }
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1400px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 700px; 
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 700px; 
            border-bottom-left-radius: 360px;
        }

    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1200px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 600px; 
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 600px; 
            border-bottom-left-radius: 360px;
        }
    }

    /* md */
    @media (min-width: 768px) and (max-width: 991px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 700px; 
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 700px; 
            border-bottom-left-radius: 360px;
        }

    }

    /* sm */
    @media (min-width: 576px) and (max-width: 767px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 600px; 
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 600px; 
            border-bottom-left-radius: 360px;
        }

    }

    /* xs */
    @media (min-width: 0px) and (max-width: 575px) {
        .texto-solucion {
            max-height: 100px;
            overflow: auto;
        }

        .fondo-azul {
            background-color: #1B44DD; 
            height: 400px; 
            border-bottom-right-radius: 360px;
        }

        .fondo-verde {
            background-color:#00AD61; 
            height: 400px; 
            border-bottom-left-radius: 360px;
        }

    }
</style>

<style>
    /* input con opacidad y sin boton de selecciond e archivo */
		.file-upload input[type="file"] {
                    position: absolute;
                    left: -9999px;
                    }

                    .file-upload label {
                    display: inline-block;
                    background-color: #00000031;
                    color: #fff;
                    padding: 6px 12px;
                    cursor: pointer;
                    border-radius: 4px;
                    font-weight: normal;
                    opacity: 0%;
                    }

                    .file-upload input[type="file"] + label:before {
                    content: "\f07b";
                    font-family: "Font Awesome 5 Free";
                    font-size: 16px;
                    margin-right: 5px;
                    transition: all 0.5s;
                    }

                    .file-upload input[type="file"] + label {
                        transition: all 0.5s;
                    }

                    .file-upload input[type="file"]:focus + label,
                    .file-upload input[type="file"] + label:hover {
                    backdrop-filter: blur(5px);
                    background-color: #41464a37;
                    opacity: 100%;
                    transition: all 0.5s;
                    }
    /* input con opacidad y sin boton de selecciond e archivo */
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

    <div class="container-fluid" style="box-shadow: inset 0 0 40px rgba(0, 0, 0, 0.1);">
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-10 col-xs-9 col-9 position-relative">
            <div class="row">
                <div class="col-md-9 fondo-azul" style="">
                </div>
            </div>
            <div class="col-xxl-10 col-xl-10 col-lg-9 col-md-9 col-sm-11 col-xs-10 col-12 position-absolute top-50 start-50 translate-middle" style="margin-left: 60px;">
                <div class="row">
                    <div class="col position-relative">
                        <img src="{{ asset('img2/photos/imagenes_estaticas/'.$elements[4]->imagen) }}" alt="" style="border-radius: 66px;">
                        <div class="col position-absolute top-0 start-50 translate-middle-x">
                            <form id="form_imagen-values" action="imgStatic" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_static" value="{{ $elements[4]->id }}">
                                <input id="input_imagen-values" class="m-0 p-0" type="file" name="archivo_s">
                                <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_imagen-values" style="opacity: 100%; border-radius: 26px; background-color: #1E4A89;">Cambiar imagen</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12  mt-5">
            <div class="row">
            <div class="col-10 mx-auto mt-5">
                <div class="row mt-5">
                    <div class="col mt-5 display-1 fw-bold" style="color: #1B44DD;">
                        Nosotros
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-10 col-xl-12 col-lg-10 col-md-10 col-sm-12 col-xs-12 col-12 fs-5 py-3 text-black position-relative" style="line-height: 1;">
                        <textarea class="form-control border bg-transparent text-start editarajax m-0 titulo" id="aux" rows="4" name="" data-id="{{ $elements[3]->id }}" data-table="Elemento" data-campo="texto"> {{ $elements[3]->texto }} </textarea>
                        <div class="col-3 text-center position-absolute top-0 start-100 translate-middle">
                            <div uk-icon="icon: pencil; ratio: 2;"></div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col mt-5">
            <div class="row mt-5">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12 col-12 ">
                    <div class="row">
                        <div class="col-2"></div><!-- style="color: #1B44DD;" Ofrecer y comercializar productos de excelente calidad mediante capital humano capacitado y enfocado a resolver problemas de humedades brindando soluciones integrales que satisfagan las necesidades de nuestros clientes procurando mejorar sus espectativas.-->
                        <div class="col-xxl-9 col-xl-9 col-lg-11 col-md-9 col-sm-12 col-xs-12 col-12 mx-auto py-5">
                            <div class="card cardo border carta px-2" style="background-color:#00AD61;">
                                <div class="card-title cardo-title col-11 mx-auto fs-2 mt-3 fw-bolder">
                                    <span class="text-white">Misión</span>
                                </div>
                                <div class="card-body cardo-body">
                                    <div class="row">
                                        <div class="col-9 position-relative mx-1 " style="line-height: 1; font-size: 16px;">
                                            <textarea class="form-control border  bg-transparent text-start editarajax m-0 titulo text-white" id="aux" rows="4" name="" data-id="{{ $elements[5]->id }}" data-table="Elemento" data-campo="texto"> {{ $elements[5]->texto }} </textarea>
                                            <div class="col-3 text-end position-absolute top-0 start-100 translate-middle">
                                                <div uk-icon="icon: pencil; ratio: 2;"></div>
                                            </div>
                                        </div>
                                        <div class="col-3 ">
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-9"></div>
                                        <div class="col-3  text-end">
                                        <a href="#/">
                                                <img src="{{ asset('img/design/mision.png') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
               
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2"></div><!-- style="color: #1B44DD;" Ofrecer y comercializar productos de excelente calidad mediante capital humano capacitado y enfocado a resolver problemas de humedades brindando soluciones integrales que satisfagan las necesidades de nuestros clientes procurando mejorar sus espectativas.-->
                        <div class="col-xxl-9 col-xl-9 col-lg-11 col-md-9 col-sm-12 col-xs-12 col-12 mx-auto py-2">
                            <div class="card cardo border carta px-2" style="background-color:#1B44DD;">
                                <div class="card-title cardo-title col-11 mx-auto fs-2 mt-3 fw-bolder">
                                    <span class="text-white">Visión</span>
                                </div>
                                <div class="card-body cardo-body">
                                    <div class="row">
                                        <div class="col-9 position-relative mx-1 " style="line-height: 1; font-size: 16px;">
                                            <textarea class="form-control border bg-transparent text-start editarajax m-0 titulo text-white" id="aux" rows="4" name="" data-id="{{ $elements[6]->id }}" data-table="Elemento" data-campo="texto"> {{ $elements[6]->texto }} </textarea>
                                            <div class="col-3 text-end position-absolute top-0 start-100 translate-middle">
                                                <div uk-icon="icon: pencil; ratio: 2;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-end">
                                            <a href="#/">
                                                <img src="{{ asset('img/design/vision.png') }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-2 col-xs-3 col-3 d-xxl-none d-xl-none d-lg-none"></div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-10 col-xs-9 col-9 position-relative mt-5">
                    <div class="row">
                        <div class="col-3"></div>
                            <div class="col-md-9 fondo-verde" style="">
                        </div>
                    </div>
                    <div class="col-xxl-10 col-xl-10 col-lg-9 col-md-9 col-sm-11 col-xs-10 col-12 position-absolute top-50 start-50 translate-middle" style="margin-left: -40px;">
                        <img src="{{ asset('img2/photos/imagenes_estaticas/'.$elements[9]->imagen) }}" alt="" style="border-radius: 66px;">
                        <div class="col position-absolute top-0 start-50 translate-middle-x">
                            <form id="form_imagen-values2" action="imgStatic" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_static" value="{{ $elements[9]->id }}">
                                <input id="input_imagen-values2" class="m-0 p-0" type="file" name="archivo_s">
                                <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_imagen-values2" style="opacity: 100%; border-radius: 26px; background-color: #1E4A89;">Cambiar imagen</label>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 py-5">
        <div class="col-11 mt-5 py-5 mx-auto">
            <div class="row">
                <div class="clientes">
                <div class="col">
                <div style="
                    background-image: url('{{ asset('img/design/cliente01.png') }}');
                    background-size: contain;
                    background-position: center center;
                    background-repeat: no-repeat;
                    height: 120px;
                    width: 100%;
                "></div>
            </div>
            <div class="col">
                <div style="
                    background-image: url('{{ asset('img/design/cliente02.png') }}');
                    background-size: contain;
                    background-position: center center;
                    background-repeat: no-repeat;
                    height: 120px;
                    width: 100%;
                "></div>
            </div>
            <div class="col">
                <div style="
                    background-image: url('{{ asset('img/design/cliente03.png') }}');
                    background-size: contain;
                    background-position: center center;
                    background-repeat: no-repeat;
                    height: 120px;
                    width: 100%;
                "></div>
            </div>
            <div class="col">
                <div style="
                    background-image: url('{{ asset('img/design/cliente04.png') }}');
                    background-size: contain;
                    background-position: center center;
                    background-repeat: no-repeat;
                    height: 120px;
                    width: 100%;
                "></div>
            </div>
            <div class="col">
                <div style="
                    background-image: url('{{ asset('img/design/cliente04.png') }}');
                    background-size: contain;
                    background-position: center center;
                    background-repeat: no-repeat;
                    height: 120px;
                    width: 100%;
                "></div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('jsLibExtras2')

@endsection

@section('jqueryExtra')
<script>
    $('.clientes').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
    });
</script>
<script>
    $('#input_imagen-values').change(function(e) {
		$('#form_imagen-values').trigger('submit');
	});

    $('#input_imagen-values2').change(function(e) {
		$('#form_imagen-values2').trigger('submit');
	});
</script>
@endsection
