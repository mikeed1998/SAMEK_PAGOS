@extends('layouts.admin')

@section('cssExtras')

@endsection

@section('jsLibExtras')

@endsection

@section('styleExtras')
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

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ url()->previous() }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

    <div class="container-fluid mt-5 mb-5">
        {{-- <div class="row py-3">
            <div class="col fs-1 text-center">
                Agregar imágen
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center flex-column mt-2 text-center">
                <h3 class="fs-1 fw-bolder" style="color:black; font-family: Arial, sans-serif;">Agregar imágen a la galeria</h3>
                <form id="form_image_slider" action="{{ route('config.seccion.imgSiderGaleria') }}" method="POST"  class="file-upload mt-2" style="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="producto_padre" value="{{ $producto->id }}">
                    <input id="input_slider_img" class="m-0 p-0" type="file" name="archivo">
                    <label class="col-12 m-0 p-2 d-flex justify-content-center align-items-center" for="input_slider_img" style="opacity: 100%; !important; border-radius: 26px; background-color: #44B2E3;">Seleccionar archivo</label>
                </form>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-9 mx-auto">
                <form action="{{ route('config.seccion.addGaleriaSide') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-9 mx-auto text-center">
                            <input type="hidden" name="producto" value="{{ $producto->id }}">
                            <input type="file" name="imagen" class="form-control" required>
                            <input type="submit" class="btn btn-block btn-outline border-dark mt-2" value="Agregar imagen a la galeria">
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
        <div class="row py-3">
            <div class="col fs-1 text-center">
                Galeria de imagenes del producto: {{ $producto->nombre }}
            </div>
        </div>
        <div class="row">
            @foreach ($galeria as $ga)
                @if ($ga->producto == $producto->id)
                    <div class="col-3 py-3 position-relative">
                        <div class="card rounded">
                            <div class="card-body">
                                <img src="{{ asset('img2/photos/productos/galeria/'.$ga->imagen) }}" alt="" class="img-fluid" style="width: 100%; height: 260px;">
                            </div>
                        </div>
                        <div class="col-6 position-absolute top-0 start-100 translate-middle-x">
                            <form action="{{ route('config.seccion.delGaleriaSide', ['galeria' => $ga->id]) }}" method="POST" style="display: inline;" id="formu-{{ $ga->id }}">						
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger bg-danger rounded-pill"><i class="fas fa-trash fs-2"></i></button>
                            </form>
                        </div>
                    </div>   
                @endif     
            @endforeach
        </div>
    </div>

@endsection

@section('jsLibExtras2')

@endsection

@section('jqueryExtra')
    <script>
        $('#input_slider_img').change(function(e) {
		    $('#form_image_slider').trigger('submit');
	    });
    </script>
@endsection
