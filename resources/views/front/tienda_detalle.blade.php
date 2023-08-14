@extends('layouts.front')

@section('title', 'detalle')

@section('styleExtras')
<style>
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
    .slider-nav {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .slider-nav .slick-slide {
        margin-bottom: 10px; /* Espacio entre los slides */
    }
</style>

<style>      
    @media(min-width: 1800px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 940px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 50px;
        }

        .navegacion-slide {
            margin-left: 400px;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 500px;
        }
    }

    /* xxl */
    @media (min-width: 1400px) and (max-width: 1799px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 760px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 50px;
        }

        .navegacion-slide {
            margin-left: 280px;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 400px;
        }
    }

    /* xl */
    @media (min-width: 1200px) and (max-width: 1399px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 660px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 50px;
            margin-top: 0px;
        }

        .navegacion-slide {
            margin-left: 240px;
            margin-top: -100px;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 320px;
        }

    }

    /* lg */
    @media (min-width: 992px) and (max-width: 1199px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 760px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 50px;
        }

        .navegacion-slide {
            margin-left: 200px;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 400px;
        }
    }

    /* md */
    @media (min-width: 768px) and (max-width: 991px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 760px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 50px;
        }

        .navegacion-slide {
            margin-left: 300px;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 400px;
        }

    }

    /* sm */
    @media (min-width: 576px) and (max-width: 767px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 500px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 40px;
        }
        .navegacion-slide {
            margin-left: 300px;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 140px;
        }

    }

    /* xs */
    @media (min-width: 0px) and (max-width: 575px) {
        .fondo-azul {
            background-color: #1B44DD; 
            height: 500px; 
            border-bottom-right-radius: 360px;
        }

        .margen-grande {
            margin-left: 80px;
        }

        .navegacion-slide {
            display: none;
        }

        .contenedor-grande {
            border-radius: 32px; 
            padding: 50px;
        }

        .contenedor-grande > .imagen-grande {
            height: 130px;
        }
    }
</style>
@endsection

@section('content')
<div class="container-fluid" style="box-shadow: inset 0 0 40px rgba(0, 0, 0, 0.1);">
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-9 col-md-8 col-sm-9 col-xs-12 col-12 position-relative">
            <div class="row">
                <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-10 col-sm-9 col-xs-9 col-10 fondo-azul" style="">
                </div>
            </div>
            <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-5 col-sm-5 col-xs-5 col-5 mt-5 text-end fs-3 text-white position-absolute top-0 start-50 translate-middle-x">
                <a href="javascript:void(0)" onclick="goBack()" style="text-decoration: none; color: white;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M125.7 160H176c17.7 0 32 14.3 32 32s-14.3 32-32 32H48c-17.7 0-32-14.3-32-32V64c0-17.7 14.3-32 32-32s32 14.3 32 32v51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z" fill="white"/></svg>    
                    REGRESAR
                </a>
            </div>
            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-7 col-xs-7 col-7 position-absolute top-50 start-50 translate-middle" style="margin-left: 40px;">      
                <div class="col position-relative navegacion-slide">
                    <div class="col-6 position-absolute top-0 start-100 margen-grande">
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class="row">
                                    <div class="slider-nav">

                                        @foreach ($galeria as $g)
                                       
                                                <div class="col border p-3" style="border-radius: 16px;">
                                                    <div class="py-2" style="
                                                    background-image: url('{{ asset('img2/photos/productos/galeria/'.$g->imagen) }}');
                                                    background-size: contain;
                                                    background-repeat: no-repeat;
                                                    background-position: center center;
                                                    height: 100px;
                                                    width: 100px;
                                                    "></div>
                                                </div>
                                         
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <img src="{{ asset('img/design/producto.png') }}" alt="" class="border img-fluid" style="border-radius: 66px; width: 100%;"> -->
                <div class="slider-for">

                    @foreach ($galeria as $gn)
                     
                            <div class="col border bg-white contenedor-grande">
                                <div class="py-2 imagen-grande" style="
                                    background-image: url('{{ asset('img2/photos/productos/galeria/'.$gn->imagen) }}');
                                    background-size: contain;
                                    background-repeat: no-repeat;
                                    background-position: center center;                                            
                                    width: 100%;
                                "></div>
                            </div>
                       
                    @endforeach

                </div>
            </div>
        </div>
        <div class="col-xxl-1 col-xl-1 col-lg-12 col-md-12 col-sm-12 col-md-1">

        </div>
        <div class="col-xxl-5 col-xl-5 col-lg-9 col-md-10 col-sm-11 colxs-11 col-11 mx-auto">
            <div class="row">
            <div class="col-11 mx-auto mt-5 py-5">
                <div class="row">
                    <div class="col mt-5 display-5 fw-bold text-dark">
                        {{ $producto->nombre }}
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-9 text-dark py-3" style="line-height: 1;">
                        {!! $producto->descripcion !!}
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col display-5 fw-normal text-dark">
                        <div class="row py-3">
                            <div class="col-xxl-5 col-xl-6 col-lg-5 col-md-5 col-sm-5 col-xs-5 col-5 mt-2">
                                Cantidad: 
                            </div>
                            <div class="col-xxl-2 col-xl-3 col-lg-3 col-md-3 col-sm-3 col-xs-3 col-4 mt-xxl-2 mt-xl-2 mt-lg-2 mt-md-1 mt-sm-1 mt-xs-1 mt-0 display-5">
                                <input type="number" class="form-control" style="font-size: 32px;">
                            </div>
                        </div>
                        <div class="row py-3">
                            <div class="col display-5 fw-normal">
                                ${{ $producto->precio }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-1">
                    <div class="col py-2">
                        <a href="{{ route('addToCart', ['id' => $producto->id]) }}" class="btn btn-outline fs-3 text-white px-5" style="background-color: #00AD61; border-radius: 26px;">
                            A&Ntilde;ADIR <span uk-icon="icon: cart; ratio: 1.6;"></span>
                        </a>
                    </div>
                </div>
                <div class="row py-1">
                    <div class="col py-2">
                        <a href="#/" class="btn btn-outline fs-3 text-white px-5" style="background-color: #1B44DD; border-radius: 26px;">
                            COMPRAR
                        </a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col mt-5 text-center fs-2" style="color: #1B44DD;">
            PRODUCTOS
        </div>
    </div>
    <div class="row">
        <div class="col text-center display-4 fw-bold" style="color: #00AD61;">
            Relacionados
        </div>
    </div>
    <div class="row py-4">
        <div class="col-4 border border-3"></div>
        <div class="col-4" style="border: 3px solid #1B44DD;"></div>
        <div class="col-4 border border-3"></div>
    </div>
    <div class="row mt-5">
        <div class="col-11 mt-5 mx-auto">
            <div class="row mb-5">
                <div class="productos">

                    @foreach ($productos as $produ)
                        @if ($produ->categoria == $producto->categoria && $produ->id != $producto->id)
                        <div class="col-md-3 px-3">
                            <div class="card border" style="border-radius: 16px;">
                                <div class="row">
                                    <div class="col-12 position-relative">
                                        <div class="row">
                                        <div class="col-2"></div>
                                        <div class="col-8" style="border: 2px solid #00AD61;"></div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="col-6 mx-auto" style="
                                        background-image: url('{{ asset('img2/photos/productos/'.$produ->imagen) }}');
                                        background-size: contain;
                                        background-position: center center;
                                        background-repeat: no-repeat;
                                        height: 360px;
                                        width: 70%;
                                    "></div>
                                    <div class="col-12 position-absolute top-0 bottom-0 start-0 px-2 producto">
                                        <div class="card h-100" style="border-top-left-radius: 18px; border-top-right-radius: 18px;">
                                            <div class="card-body py-5 d-flex align-items-center justify-content-center">
                                                <div class="row mt-5">
                                                    <div class="col mt-5 d-flex align-items-center justify-content-center">
                                                        <a href="#/">
                                                            <img src="{{ asset('img/design/carrito2.png') }}" alt="" class="px-3">
                                                        </a>
                                                        <a href="{{ route('front.tienda_detalle', ['producto' => $produ->id]) }}">
                                                            <img src="{{ asset('img/design/view.png') }}" alt="">
                                                        </a>                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
                            </div>     
                            <div class="card-body border-top m-0">
                                <div class="row">
                                    <div class="col-12 text-center fs-4 text-black">
                                        {{ $produ->nombre }}
                                    </div>
                                    <div class="col-12 text-center fs-4 text-secondary">
                                        ${{ $produ->precio }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jqueryExtra')
<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
        responsive: [
            {
                breakpoint: 480,
                settings: {
                    dots: true,
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });

    $('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        vertical: true, /* Establece el desplazamiento vertical */
        verticalSwiping: true /* Habilita el deslizamiento vertical */
        
    });
</script>
    <script>
        $('.productos').slick({
            dots: false,
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
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
