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
 }
</style>
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('novedades.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('novedades.edit',$detail->id) }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>
	<div class="row">
		<div class="col-12 col-lg-6 my-2">
			<div class="card h-100">
				<div class="card-body d-flex align-items-center">
					<div>
						<div class="form-group">
							<span class="font-weight-bold">Título:</span> <span>{{$detail->titulo}} </span>
						</div>
						<div class="form-group">
							<span class="font-weight-bold">Descripción:</span>
							<div class="">{!! $detail->descripcion !!}</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-body">
					<div class="card-title text-center">Caratula</div>
					<div class="col-12">
						<form action="{{ route('novedades.update',$detail->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<input type="hidden" name="portada">
							<input type="file" id="portada" name="portada" class="dropify" data-allowed-file-extensions="jpg png jpeg" data-show-remove="false" @if ($detail->portada)  data-default-file="{{ asset('img/photos/novedades/'.$detail->portada) }}"
							@endif data-weight="7em" required />
							<div class="text-center">
								<small class="text-muted">Dimensiones sugeridas: 950 x 950 px</small>
							</div>
							<div class="text-center">
								<input type="submit" value="Cambiar" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				{{-- <div class="card-body">
					<div class="card-title text-center">PDF</div>
					<div class="col-12">
							<form action="{{ route('novedades.update',$detail->id) }}" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<input type="hidden" name="pdf">
							<input type="file" id="pdf" name="pdf" class="dropify" data-allowed-file-extensions="pdf" data-show-remove="false" @if ($detail->pdf)  data-default-file="{{ asset('img/photos/novedades/'.$detail->pdf) }}"
							@endif data-weight="7em" required />
							<div class="text-center">
								<a href="{{ asset('img/photos/novedades/'.$detail->pdf) }}" target="_blank" class="btn btn-info">Ver PDF</a>
								<input type="submit" value="Cambiar" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div> --}}
				<div class="card-body">
					<div class="card-title text-center">PDF</div>
					<div class="col-12 row mx-auto px-0">
						<div class="form-group col-12 text-center">
							<label for="pdfname" class="">Nombre del PDF</label>
							<input type="text" class="form-control editarajax" name="pdfname" id="pdfname" data-id="{{$detail->id}}" data-table="novedad" data-campo="pdfname"  value="{{ $detail->pdfname }}">
						</div>
						<form action="{{ route('novedades.update',$detail->id) }}" class="@if ($detail->pdf) col-12 col-lg-6 @else col-12 @endif" method="post" enctype="multipart/form-data">
							@csrf
							@method('put')
							<input type="hidden" name="pdf">
							<div>
								<input type="file" id="pdf" name="pdf" class="dropify h-100" data-allowed-file-extensions="pdf" data-weight="7em" value="{{ asset("img/photos/novedades/".$detail->pdf)}}" @if (!$detail->pdf) required @endif />
							</div>
							<div class="text-center">
								<input type="submit" value="Cambiar" class="btn btn-primary">
							</div>
						</form>
						@if ($detail->pdf)
							<div class="col-12 col-lg-6 text-center">
								<div class="">
									<div class="card-body border">
										<div class="my-2">
											<i class="far fa-3x fa-file-pdf grey-text"></i>
											<span class="d-block text-muted">{{ $detail->titulo }}</span>
										</div>
									</div>
									<div class="btn-group btn-group-sm" role="group">
										<a href="{{ asset("img/photos/novedades/".$detail->pdf)}}" class="btn btn-primary" target="_blank"> Ver</a>
										<a href="{{ asset("img/photos/novedades/".$detail->pdf)}}" class="btn btn-info" download="{{$detail->pdfname}}"> Descargar</a>
									</div>
								</div>
							</div>
						@endif
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

			// $("#fileuploader").uploadFile({
			// 	url:"{{ route('productos.pic.store', $detail->id ) }}",
			// 	multiple: true,
			// 	maxFileCount:10,
			// 	fileName:"uploadedfile",
			// 	allowedTypes: "jpg,jpeg,png",
			// 	maxFileSize: 10485760,
			// 	showFileCounter: false,
			// 	showDelete: "false",
			// 	showPreview:false,
			// 	showQueueDiv:true,
			// 	returnType:"json",
			// 	formData: {
			// 		"_token": $("meta[name='csrf-token']").attr("content"),
			// 		"producto": {{ $detail->id }}
			// 	},
			// 	onSuccess:function(files,data,xhr){
			// 		location.reload();
			// 	}
			// });
		});
	</script>
@endsection
