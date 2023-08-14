
$(document).ready(function() {

	tinymce.init({
		selector: '.texteditor',
		// plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
		// toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
		menubar: false,
		forced_root_block: 'div',
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
	
	$(".sortable").sortable({
		update: function( event, ui ) {
			var tabla = $(this).attr("data-table");
			var orden = $(this).sortable("toArray", {attribute: 'data-card'});
			var csrf = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				method: "POST",
				// url: "/advanced/varios/orderajax",
				url: "/varios/orderajax",
				data: {
					"_method": 'post',
					"_token": csrf,
					table: tabla,
					orden: orden
				}
			})
			.done(function(msg) {
				if (msg.success) {
					toastr["success"](msg.mensaje);
				}
			});
		}
	});

	$('.editarajax').change(function(e) {
		var id = $(this).attr("data-id");
		var tabla = $(this).attr("data-table");
		var campo = $(this).attr("data-campo");
		var valor = ($(this).val() === '') ? null : $(this).val();
		var tcsrf = $('meta[name="csrf-token"]').attr('content');

		console.log(id);
		console.log(tabla);
		console.log(campo);
		console.log(valor);

		$.ajax({
			// url: '/advanced/varios/editarajax',
			url: '/varios/editarajax',
			type: 'post',
			dataType: 'json',
			data: {
				"id": id,
				"_method": 'post',
				"_token": tcsrf,
				"tabla": tabla,
				"campo": campo,
				"valor": valor
			}
		})
		.done(function(msg) {
			if (msg.success) {
				toastr["success"]("Guardado Exitosamente");
			}else {
				toastr["error"]("Error al actualizar");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
		});
		// .always(function(msg) {
		// 	console.log("complete");
		// 	// console.log(msg);
		// });
	});

	$('.swiToAj').change(function(e) {

		var tcsrf = $('meta[name="csrf-token"]').attr('content');

		var attr = $(this).attr('checked');
		// var attr = $(this)[0].checked;
		var id = $(this).attr('data-id');
		var tabla = $(this).parent().attr('data-table');
		var campo = $(this).parent().attr("data-campo");
		//var valor = (typeof attr !== typeof undefined && attr !== false) ? 0 : 1;
		// var valor = (attr) ? 0 : 1;
		var valor = ($(this).is(":checked")) ? 1:0;

		$.ajax({
			// url: '/advanced/varios/toggleajax',
			url: '/varios/toggleajax',
			type: 'POST',
			dataType: 'json',
			data: {
				"_method": 'post',
				"_token": tcsrf,
				"id": id,
				"tabla": tabla,
				"campo": campo,
				"valor": valor
			}
		})
		.done(function(resp) {
			console.log("success",resp);
			if (resp.success) {
				toastr["success"]("Guardado Exitosamente");
			}else {
				toastr["error"]("Error al actualizar");
			}
		})
		.fail(function(resp) {
			console.log("error:");
			console.log(resp);
		});
	});

	function syntaxHighlight(json,tabs) {
		json = JSON.stringify(json, undefined, tabs);
		json = json.toString().replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		return json.toString().replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function(match) {
			var cls = 'number';
			if (/^"/.test(match)) {
				if (/:$/.test(match)) {
					cls = 'key';
				} else {
					cls = 'string';
				}
			} else if (/true|false/.test(match)) {
				cls = 'boolean';
			} else if (/null/.test(match)) {
				cls = 'null';
			}
			return '<span class="' + cls + '">' + match + '</span>';
		});
	}

});
