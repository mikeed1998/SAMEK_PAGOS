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
		<a href="{{ route('productos.show',$product->id) }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{route('productos.version.edit', $var->id)}}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>
	<div class="row">
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-body">
					<div class="card-title text-center h5">Detalles Variante</div>
					<div>
						<span class="font-weight-bold">SKU:</span> <span>{{$var->sku}} </span>
					</div>
					<div>
						<span class="font-weight-bold">Modelo:</span> <span>{{$var->modelo}} </span>
					</div>
					<div class="row">
						<div class="col-6">
							<span class="font-weight-bold">Precio:</span> <span>{{$var->precio}} </span>
						</div>
						<div class="col-6">
							<span class="font-weight-bold">Descuento:</span> <span>{{$var->descuento}}%</span>
						</div>
					</div>
					<div class="form-group">
						<span class="font-weight-bold">Descripción:</span>
						<div class="">{!! $var->descripcion !!}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-body">
					<div class="card-title text-center h5">Producto Base</div>
					<div>
						<span class="font-weight-bold">Nombre:</span> <span>{{$product->nombre}} </span>
					</div>
					<div>
						<span class="font-weight-bold">Categoria:</span> <span>{{$product->categoria->nombre}} </span>
					</div>
					<div>
						<span class="font-weight-bold">Marca:</span> <span>{{$product->marca->titulo}} </span>
					</div>
					<div class="form-group">
						<span class="font-weight-bold">Descripción:</span>
						<div class="">{!! $product->descripcion !!}</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 my-2">
			<div class="card">
				<div class="card-body">
					<div class="card-title text-center h5">Medidas del Envío</div>
					<div>
						<span class="font-weight-bold">Tipo de paquete:</span> <span>{{$var->tipo_envio}} </span>
					</div>
					<div>
						<span class="font-weight-bold">Peso:</span> <span>{{$var->peso}} KG</span>
					</div>
					<div>
						<span class="font-weight-bold">Largo:</span> <span>{{$var->largo}} cm</span>
					</div>
					<div>
						<span class="font-weight-bold">Ancho:</span> <span>{{$var->ancho}} cm</span>
					</div>
					<div>
						<span class="font-weight-bold">Alto:</span> <span>{{$var->alto}} cm</span>
					</div>
				</div>
			</div>
		</div>
	</div>

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

	<div class="modal fade" id="variante"  tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nueva variante</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('productos.version.store') }}" method="post">
					@csrf
					<input type="hidden" name="producto" value="{{ $product->id }}">
					<div class="modal-body">
							<div class="form-group text-center">
								<label for="sku">SKU</label>
								<input type="text" name="sku" id="sku" class="form-control">
							</div>
							<div class="form-group text-center">
								<label for="modelo">Modelo</label>
								<input type="text" name="modelo" id="modelo" class="form-control">
							</div>
							<div class="form-group text-center">
								<label for="precio">Precio</label>
								<input type="text" name="precio" id="precio" class="form-control">
							</div>
							<div class="form-group text-center">
								<label for="descripcion">Descripción</label>
								<textarea name="descripcion" id="descripcion" rows="10" class="texteditor form-control" style="resize:none;">{{old('descripcion')}}</textarea>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
			</form>
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
				url:"{{ route('productos.pic.store', $product->id ) }}",
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
					"producto": {{ $product->id }}
				},
				onSuccess:function(files,data,xhr){
					location.reload();
				}
			});
		});
	</script>
@endsection
