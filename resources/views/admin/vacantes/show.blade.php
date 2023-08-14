@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
	<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">

@endsection
@section('styleExtras')
	<style>
	.card-gallery{
		height: 11rem;
		object-fit: cover;
		border-radius: 50%;
	}
	#variantes tbody tr td{
    vertical-align: middle;
		margin-left: 1em;
	}
</style>
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('vacante.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('vacante.edit',$vacantes->id) }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>
	<div class="row">
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-body">
					<div>
						<span class="font-weight-bold">Titulo:</span> <span>{{ $vacantes->titulo }} </span>
					</div>
					<div class="form-group">
						<span class="font-weight-bold">Subtitulo:</span> <span>{{ $vacantes->subtitulo }}</span>
						<div>
							<span class="font-weight-bold">Oferta:</span> <span>{!!$vacantes->oferta!!}</span>
						</div>
						<div>
							<span class="font-weight-bold">Requisitos:</span> <span>@foreach ($vacantes->requisitos as $requi)
								{{$requi}}
								<br>
							@endforeach</span>
						</div>
						<div>
							<span class="font-weight-bold">Vacantes disponibles:</span> <span>{!!$vacantes->vacantesdisp!!}</span>
						</div>
						<div>
							<span class="font-weight-bold">Salario:</span> <span>{!!$vacantes->salario!!}</span>
						</div>
					</div>
					
					{{-- <div class="form-group">
					</div> --}}
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 my-2">
			<div class="">
				<div class="card mt-3">
					<div class="card-header text-center">Portada</div>
					<form action="{{ route('vacante.updateimg',$vacantes->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
						@csrf
						@method('put')
						<input type="hidden" name="vacante" value="{{$vacantes->id}}">
						<input type="hidden" name="type" value="portada">
						<input type="file" name="portada" id="portada" class="dropify" @if ($vacantes->portada) data-default-file="{{ asset('img/photos/vacantes/'.$vacantes->portada) }}" @endif data-allowed-file-extensions="png jpg jpeg">
						<input type="submit" value="Guardar" class="btn btn-primary mt-2">
					</form>
				</div>
			</div>
		</div>
		
	</div>
	{{-- <div class="">
		<div class="card mt-3">
			<form action="{{ route('productos.pic.store',$vacantes->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="producto" value="{{$vacantes->id}}">
				<input type="file" name="foto" id="photo" class="dropify" data-allowed-file-extensions="png jpg jpeg">
				<input type="submit" value="Guardar" class="btn btn-primary mt-2">
			</form>
		</div>
	</div> --}}

    {{-- <div class="card mt-3">
        <div class="row sortable card-body" data-table="ProductosPhoto">
            @foreach ($vacantes->portada as $img)
            <div class="col-12 col-md-3 col-lg-3 my-2 my-md-1 p-2" data-card="{{$img->id}}">
                <div class="card">
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#ModalDel" data-id="{{$img->id}}" style="z-index: 2;">
                            <i class="fa fa-trash-alt "></i>
                        </button>
                    </div>
                    <a href="{{asset('img/photos/productos')}}/{{$img->image}}" target="_blank">
                        <img src="{{asset('img/photos/productos')}}/{{$img->image}}" class="card-img-top" alt="{{$img->image}}">
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    </div> --}}

	<div class="modal fade bottom" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar foto?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delphoto">Eliminar</button>
						<form id="photodel" action="{{ route('productos.pic.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="ipdel" name="photo" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{asset('js/jquery-file-upload.js')}}"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function(){

			$('.select2').select2();
			var drEvent = $('.dropify').dropify({

			// $('.dropify').dropify({
				messages: {
					'default': 'Arrastrar y soltar un archivo aquí o hacer clic',
					'replace': 'Arrastrar y soltar o hacer clic para reemplazar',
					'remove': 'Remover',
					'error': 'Ooops, algo malo pasó.'
				},
				error: {
	        'fileSize': 'El tamaño del archivo es demasiado grande (@{{ value }} máximo)',
	        'minWidth': 'El ancho de la imagen es demasiado pequeño (@{{ value }}}px min).',
	        'maxWidth': 'El ancho de la imagen es demasiado grande (@{{ value }}}px máximo).',
	        'minHeight': 'La altura de la imagen es demasiado pequeña (@{{ value }}}px min).',
	        'maxHeight': 'La altura de la imagen es demasiado grande (@{{ value }}px max).',
	        'imageFormat': 'El formato de la imagen no está permitido (@{{ value }} solamente).'
				}
			});

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
			});

			$('.delphoto').click(function(e) {
				$('#photodel').submit();
			});

				$("#fileuploader").uploadFile({	
				url:"{{ route('productos.pic.store', $vacantes->id ) }}",
				multiple: true,
				maxFileCount:10,
				fileName:"uploadedfile",
				allowedTypes: "jpg,jpeg,png",
				maxFileSize: 10485760,
				showFileCounter: false,
				showDelete: "false",
				showPreview:false,
				showQueueDiv:true,
				returnType:"json",
				formData: {
					"_token": $("meta[name='csrf-token']").attr("content"),
					"producto": {{ $vacantes->id }}
				},
				onSuccess:function(files,data,xhr){
					location.reload();
				}
			});
		});
	</script>
@endsection
