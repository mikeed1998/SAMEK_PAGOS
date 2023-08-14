$(document).ready(function() {

	window.cart_alert = function() {
		setTimeout(function(){
			$('.alert-cart').toggle( "fade");
		}, 3000);
		setTimeout(function(){
			$('.alert-cart').toggle( "fade");
		}, 3000);

		setTimeout(function(){
			cart_alert();
		}, 3000);
	}

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
			// url: '/rodarte/varios/editarajax',
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
	});

	$('.addtocart').click(function(e) {

		var tcsrf = $('meta[name="csrf-token"]').attr('content');
		var key = $(this).attr('data-key');
		var cant = $('#cantidad').val();
		var carro = $('.num-bolsa').data('cart');

		$.ajax({
			// url: '/rodarte/cart/addcart',
			url: '/cart/addcart',
			type: 'POST',
			data: {
				"_method": 'post',
				"_token": tcsrf,
				'key': key,
				'cant': cant,
			}
		})
		.done(function(msg) {
			if (msg.resp) {
				toastr["success"]("Se agrego al carrito");
				$("#cotizacion-fixed a").show();
				carro = carro + 1 ;
				// $('.num-bolsa').html(carro);
				$('.alert-cart').removeClass('invisible');

				// console.log(msg);
			} else {
				toastr["error"]("Error al agregar del carrito");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
		});

		// console.log(key);
		// console.log(color);
		console.log(cant);
		// console.log(vers);
	});

	$("body").on( "click",".fastcart", function(e) {
		var tcsrf = $('meta[name="csrf-token"]').attr('content');
		var key = $(this).attr('data-key');
		var cant = 1;
		var carro = $('.num-bolsa').data('cart');

		$.ajax({
			// url: '/rodarte/cart/addcart',
			url: '/cart/addcart',
			type: 'POST',
			data: {
				"_method": 'post',
				"_token": tcsrf,
				'key': key,
				'cant': cant,
			}
		})
		.done(function(msg) {
			if (msg.resp) {
				toastr["success"]("Se agrego al carrito");
				$("#cotizacion-fixed a").show();
				carro = carro + 1 ;
				$('.num-bolsa').html(carro);
			} else {
				toastr["error"]("Error al agregar del carrito");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
		});
	});

	$('.removecart').click(function(e) {
		var tcsrf = $('meta[name="csrf-token"]').attr('content');
		var key = $(this).attr('data-id');

		$.ajax({
			// url: '/rodarte/cart/removecart',
			url: '/cart/removecart',
			type: 'GET',
			data: {
				"_method": 'post',
				"_token": tcsrf,
				'key': key,
			}
		})
		.done(function(msg) {
			console.log(msg);
			if (msg.resp) {
				toastr["success"]("Se elimino exitosamente");
				setTimeout(function(){ location.reload(); }, 2000);
			} else {
				toastr["error"]("Error al quitar del carrito");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
		});

		console.log(key);
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
