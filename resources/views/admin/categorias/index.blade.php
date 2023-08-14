@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ url()->previous() }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<button class="col col-md-2 btn btn-sm green text-white" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus"></i> Agregar</button>
	</div>

	<div class="col-12 col-md-9 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Tamaño</th>
							{{-- <th>Productos</th> --}}
							<th class="text-right">Ops</th>
						</thead>
						<tbody>
						@foreach ($cats as $cat)
							<tr>
								<td>{{$cat->nombre}}</td>
								{{-- <td>{{$cat->prods}}</td> --}}
								<td>
									<div class="text-right">
										<div class="btn-group btn-group-sm" role="group">
											<a href="{{ route('categ.show',$cat->id) }}" class="btn btn-sm btn-secondary m-0"><i class="fas fa-search-plus"></i></a>
											<button type="button" class="btn btn-sm btn-danger m-0 @if ($cat->sub) disabled @endif" data-toggle="modal" data-target="#frameModalDel" data-id="{{$cat->id}}"><i class="fas fa-trash-alt"></i></button>
										</div>
									</div>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="staticBackdrop"  tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nueva categoría</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ route('categ.store') }}" method="post">
					@csrf
					<input type="hidden" name="parent" value="0">
					<div class="modal-body">
							<div class="form-group">
								<label for="nombre">Categoría</label>
								<input type="text" name="nombre" id="nombre" class="form-control">
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

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body bg-danger">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2 text-white">
							Eliminar categoría?
							<br>
						{{-- </p>
						<p class="pt-3 pr-2 text-white text-uppercase"> --}}
							{{-- <span class=" text-white text-uppercase font-weight-bolder">
								se eliminaran todas las medidas y existencias relacionadas con este tamaño
							</span> --}}
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delcat">Eliminar</button>
						<form id="catdel" action="{{route('categ.delete')}}" method="POST" style="display: none;">
								@csrf
								<input type="hidden" id="icdel" name="categoria" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#icdel").val(id);
			});

			$('.delcat').click(function(e) {
				$('#catdel').submit();
			});
		});

	</script>
@endsection
