@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('admin.home') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('admin.store') }}" method="post">
					@csrf
					
					<div class="form-group">
						<label for="question">Nombre de Usuario</label>
						<input type="text" name="nombre" id="nombre" class="form-control">
					</div>
					<div class="form-group">
						<label for="question">Correo electronico</label>
						<input type="email" name="email" id="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="question">Contraseña</label>
						<input type="password" name="pass" id="pass" class="form-control">
					</div>
					<div class="form-group">
						<label for="question">Confimar contraseña</label>
						<input type="password" name="pass1" id="pass1" class="form-control">
					</div>
					
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
				@if ($errors->any())
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif
			</div>
		</div>
	</div>
@endsection
@section('jsLibExtras2')
	<script>
	    tinymce.init({
	      selector: 'textarea',
	      // plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
	      // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
				menubar: false,
			  plugins: [
			    'advlist autolink lists link image charmap print preview anchor',
			    'searchreplace visualblocks code fullscreen',
			    'insertdatetime media table paste code help wordcount',
					'advlist autolink lists link image charmap print preview anchor wordcount',

					'searchreplace visualblocks code fullscreen table visualblocks',
					'insertdatetime media table contextmenu paste code imagetools',
					'textcolor colorpicker'
			  ],
			  // toolbar: 'undo redo | formatselect | ' +
			  // 'bold italic backcolor | alignleft aligncenter ' +
			  // 'alignright alignjustify | bullist numlist outdent indent | ' +
			  // 'removeformat | help',
				toolbar: 'forecolor backcolor | insert table | undo redo | removeformat styleselect |  bold italic underline |  alignleft aligncenter alignright alignjustify |  bullist numlist | outdent indent | link image | code visualblocks',
				resize: false,
			  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	   });
	  </script>
@endsection
