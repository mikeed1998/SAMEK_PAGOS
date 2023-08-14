@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('config.faq.update',$faq->id) }}" method="post">
					@csrf
					@method('put')
					<div class="form-group">
						<label for="question">Pregunta</label>
						<input type="text" name="question" id="question" class="form-control" value="{{$faq->pregunta}}">
					</div>
					<div class="form-group">
						<label for="answer">Respuesta</label>
						<textarea name="answer" id="answer" rows="10" class="form-control" style="resize:none;">{{ $faq->respuesta }}</textarea>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
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
