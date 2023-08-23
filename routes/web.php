<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('layouts.front');
// });

use Carbon\Carbon;

Route::get('subcategorias/{categoriaId}', 'SubcategoriaController@getSubcategorias');

Route::name('front.')->group(function(){

	Route::get('/', 'FrontController@index')->name('index');
	Route::get('tienda', 'FrontController@tienda')->name('tienda');
	Route::get('tienda_detalle/{producto}/{mensaje?}', 'FrontController@tienda_detalle')->name('tienda_detalle');
	Route::get('soluciones', 'FrontController@soluciones')->name('soluciones');
	Route::get('nosotros', 'FrontController@aboutus')->name('aboutus');
	Route::get('contacto', 'FrontController@contacto')->name('contacto');
	Route::get('preguntas', 'FrontController@preguntas')->name('preguntas');
	Route::get('aviso_privacidad', 'FrontController@aviso_privacidad')->name('aviso_privacidad');
	Route::get('metodos_pago', 'FrontController@metodos_pago')->name('metodos_pago');
	Route::get('pago_conekta', 'FrontController@pagoConekta')->name('pagoConekta');
	Route::post('pago_conekta', 'FrontController@pagoConekta')->name('pagoConekta');
	Route::get('orden', 'FrontController@orden')->name('orden');
	Route::put('datosPerfil/{user}', 'FrontController@datosPerfil')->name('datosPerfil');


	Route::get('productos', 'FrontController@productos')->name('productos');
	Route::get('servicios/{serv?}', 'FrontController@servicios')->name('servicios');
	Route::post('getServicio', 'FrontController@getServicio')->name('getServicio');
	
	Route::get('vacantes', 'FrontController@vacantes')->name('vacantes');
	
	Route::get('productos/{product?}', 'FrontController@details')->name('details');

	Route::get('/admin', 'FrontController@admin')->name('admin');
	Route::post('/admin', 'FrontController@adminp')->name('adminp');
});






// rutas al admin
Route::namespace("Admin")->prefix('adnin')->group(function(){
	Route::name('admin.')->group(function(){
		Route::get('/', 'HomeController@index')->name('home');
		Route::get('/nuevo', 'HomeController@create')->name('create');
		Route::get('/users', 'HomeController@show')->name('show');
		Route::post('/guardar', 'HomeController@store')->name('store');
		Route::delete('/delete', 'HomeController@destroy')->name('delete');

		Route::namespace('Auth')->group(function(){
			Route::get('/login', 'LoginController@showLoginForm')->name('login');
			Route::post('/login', 'LoginController@login');
			Route::post('logout', 'LoginController@logout')->name('logout');
		});
	});

// rutas al admin configuraciones
// controllers dentro de Controllers/Admin/
	Route::prefix('config')->name('config.')->group(function(){
		Route::get('index','ConfiguracionController@index')->name('index');
		Route::get('general','ConfiguracionController@general')->name('general');
		Route::get('contacto','ConfiguracionController@contact')->name('contact');
	});
	// Route::prefix('config')->name('config.')->group(function(){
	// 	Route::get('index','ConfiguracionController@index')->name('index');
	// });
});


// rutas al admin configuraciones
// controllers dentro de Controllers/
Route::prefix('admin')->group(function(){
	
	
	Route::prefix('config')->name('config.')->group(function(){
		
		Route::prefix('colores')->name('color.')->group(function(){
			Route::get('/','ColorController@index')->name('index');
			Route::post('/','ColorController@store')->name('store');
			Route::get('editar/{id}','ColorController@edit')->name('edit');
			Route::put('{id}','ColorController@update')->name('update');
			Route::delete('/','ColorController@destroy')->name('delete');
		});

		Route::prefix('sliders')->name('slider.')->group(function(){
			Route::get('/{seccion?}','CarruselController@index')->name('index');
			Route::post('/','CarruselController@store')->name('store');
			Route::delete('/','CarruselController@destroy')->name('delete');
		});
		Route::prefix('usuarios')->name('usuarios.')->group(function(){
			Route::get('/','HomeController@index')->name('index');
			//Route::post('/','CarruselController@store')->name('store');
			//Route::delete('/','CarruselController@destroy')->name('delete');
		});

		Route::prefix('politicas')->name('politica.')->group(function(){
			Route::get('/','PoliticaController@index')->name('index');
			Route::put('/{id}','PoliticaController@update')->name('update');
		});

		Route::prefix('secciones')->name('seccion.')->group(function(){
			Route::get('/','SeccionController@index')->name('index');
			Route::get('/{slug}','SeccionController@show')->name('show');
			Route::put('/{id}','ElementoController@update')->name('update');
			Route::put('/portada/{id}', 'SeccionController@update')->name('updatePortada');

			Route::post('/imgStatic','SeccionController@imgStatic')->name('imgStatic');

			Route::post('/categoriaSide','SeccionController@categoriaSide')->name('categoriaSide');
			Route::post('/subCategoriaSide','SeccionController@subCategoriaSide')->name('subCategoriaSide');
			Route::post('/productoSide','SeccionController@productoSide')->name('productoSide');
			Route::put('/textoProducto/{producto}','SeccionController@textoProducto')->name('textoProducto');
			Route::put('/categoriaProductoSide/{producto}','SeccionController@categoriaProductoSide')->name('categoriaProductoSide');
			Route::delete('/delProductoSide/{producto}','SeccionController@delProductoSide')->name('delProductoSide');
			
			Route::get('/usersList','SeccionController@usersList')->name('usersList');
			Route::get('/usuario_detalle/{usuario}','SeccionController@usuario_detalle')->name('usuario_detalle');
			Route::get('/lista_usuarios','SeccionController@lista_usuarios')->name('lista_usuarios');
			Route::put('/check/{order}', 'SeccionController@checkUpdate')->name('check');

			Route::get('/galeriaSide/{producto}','SeccionController@galeriaSide')->name('galeriaSide');
			Route::post('/addGaleriaSide','SeccionController@addGaleriaSide')->name('addGaleriaSide');
			Route::delete('/delGaleriaSide/{galeria}','SeccionController@delGaleriaSide')->name('delGaleriaSide');
			
			Route::put('/imgProducto/{producto}','SeccionController@imgProducto')->name('imgProducto');
			Route::put('/imgSolucion/{solucion}','SeccionController@imgSolucion')->name('imgSolucion');
			Route::post('/imgSiderGaleria','SeccionController@imgSiderGaleria')->name('imgSiderGaleria');
			Route::post('/imgSider','SeccionController@imgSider')->name('imgSider');
			Route::delete('/delSide/{slider}','SeccionController@delSide')->name('delSide');

			Route::post('/clientesSide','SeccionController@clientesSide')->name('clientesSide');
			Route::delete('/delCliente/{cliente}','SeccionController@delCliente')->name('delCliente');

			Route::put('/switchHome/{modelo}/{tipo}','SeccionController@switchHome')->name('switchHome');

			Route::post('/solucionesSide','SeccionController@solucionesSide')->name('solucionesSide');
			Route::delete('/delSolucion/{solucion}','SeccionController@delSolucion')->name('delSolucion');

			Route::delete('/delCategoriaSide/{categoria}','SeccionController@delCategoriaSide')->name('delCategoriaSide');
			Route::delete('/delSubCategoriaSide/{subcategoria}','SeccionController@delSubCategoriaSide')->name('delSubCategoriaSide');
		});

		Route::prefix('faq')->name('faq.')->group(function(){
			Route::get('/','FaqController@index')->name('index');
			Route::get('nueva','FaqController@create')->name('create');
			Route::post('/','FaqController@store')->name('store');
			Route::get('{id}','FaqController@edit')->name('edit');
			Route::put('{id}','FaqController@update')->name('update');
			Route::delete('/','FaqController@destroy')->name('delete');
		});

		Route::prefix('dimension')->name('size.')->group(function(){
			// NOTE:  falta method edit
			Route::get('/','CategTamanoController@index')->name('index');
			Route::post('/','CategTamanoController@store')->name('store');
			Route::delete('/','CategTamanoController@destroy')->name('delete');

			Route::name('dimension.')->group(function(){
				// NOTE:  falta method edit
				Route::get('/{slug?}','SizeController@index')->name('index');
				Route::post('t','SizeController@store')->name('store');
				Route::delete('t','SizeController@destroy')->name('delete');
			});
		});

		Route::prefix('cupones')->name('cupons.')->group(function(){
			// NOTE:  falta method edit
			Route::get('/','CuponController@index')->name('index');
			Route::post('/','CuponController@store')->name('store');
			Route::delete('d','CuponController@destroy')->name('delete');
		});
	});

	
	Route::prefix('servicios')->name('productos.')->group(function () {
		
		Route::get('/', 'ProductoController@index')->name('index');
		Route::get('nuevo', 'ProductoController@create')->name('create');
		Route::post('nuevo', 'ProductoController@store')->name('store');
		Route::get('detalle/{id}', 'ProductoController@show')->name('show');
		Route::get('{id}', 'ProductoController@edit')->name('edit');
		Route::put('{id}', 'ProductoController@update')->name('update');
		Route::put('upimg/{id}', 'ProductoController@updateimg')->name('updateimg');
		Route::post('delete', 'ProductoController@destroy')->name('delete');

		Route::name('pic.')->group(function () {
			Route::post('newpic/{id}', 'ProductosPhotoController@store')->name('store');
			Route::delete('/', 'ProductosPhotoController@destroy')->name('delete');
		});

		Route::name('version.')->group(function () {
			
			Route::post('newvar/', 'ProductoVarianteController@store')->name('store');
			Route::get('variante/{id_var}', 'ProductoVarianteController@show')->name('show');
			Route::get('variante/edit/{id_var}', 'ProductoVarianteController@edit')->name('edit');
			Route::put('variante/{id_var}', 'ProductoVarianteController@update')->name('update');
		// 	Route::delete('pv/', 'ProductoVersionPhotoController@destroy')->name('delete');
		});

		
		Route::name('rel.')->group(function(){
			
			Route::put('rel/{id}','ProductoRelacionController@update')->name('update');
			// Route::delete('rel/','ProductoRelacionController@destroy')->name('delete');
		});

		Route::name('categoria' )->group(function () {
			
			Route::get('categoria/{id}', 'ProductosPhotoController@store')->name('store');
		});

	});

	Route::prefix('vacantes')->name('vacante.')->group(function () {
		Route::get('/', 'VacanteController@index')->name('index');
		Route::get('nuevo', 'VacanteController@create')->name('create');
		Route::post('nuevo', 'VacanteController@store')->name('store');
		Route::get('detalle/{id}', 'VacanteController@show')->name('show');
		Route::get('{id}', 'VacanteController@edit')->name('edit');
		Route::put('{id}', 'VacanteController@update')->name('update');
		Route::put('upimg/{id}', 'VacanteController@updateimg')->name('updateimg');
		Route::post('delete', 'VacanteController@destroy')->name('delete');

	});

	Route::prefix('categorias')->name('categ.')->group(function(){
		Route::get('/','CategoriaController@index')->name('index');
		Route::post('/','CategoriaController@store')->name('store');
		Route::get('/{id}','CategoriaController@show')->name('show');
		Route::get('subcategoria/{id}','CategoriaController@sub')->name('sub');
		Route::post('/delete','CategoriaController@destroy')->name('delete');
	});

});

// rutas funciones generales
Route::prefix('varios')->name('func.')->group(function(){
	Route::post('editarajax','FuncGenController@editajax')->name('editajax');
	Route::post('orderajax','FuncGenController@orderajax')->name('orderajax');
	Route::post('toggleajax','FuncGenController@toggleajax')->name('toggleajax');

	Route::post('addcart','CartController@addcart')->name('addcart');
	Route::get('emptycart','CartController@emptycart')->name('emptycart');
	Route::post('getcart','CartController@getcart')->name('getcart');
	Route::get('updatecart','CartController@updatecart')->name('updatecart');
});

// rutas test
Route::prefix('test')->group(function(){
	Route::get('strand',function(){
		return Str::random(15);
	});
	Route::get('uuid',function(){
		return Str::uuid();
	});
	Route::get('correo',function(){

		return view('front.mailcontact',compact('data'));
	});

	Route::get('slug/{key}', function ($llave) {
		return Str::slug($llave,'-');
	});
});

/** rutas de los formularios de contacto */
Route::post('/formularioContac', 'FrontController@mailcontact')->name('formularioContac');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('clear')->group(function(){
	//Clear Cache facade value:
	Route::get('/clear-cache', function() {
		$exitCode = Artisan::call('cache:clear');
		return '<h1>Cache facade value cleared</h1>';
	});

	//Reoptimized class loader:
	Route::get('/optimize', function() {
		$exitCode = Artisan::call('optimize');
		return '<h1>Reoptimized class loader</h1>';
	});

	//Route cache:
	Route::get('/route-cache', function() {
		$exitCode = Artisan::call('route:cache');
		return '<h1>Routes cached</h1>';
	});

	//Clear Route cache:
	Route::get('/route-clear', function() {
		$exitCode = Artisan::call('route:clear');
		return '<h1>Route cache cleared</h1>';
	});

	//Clear View cache:
	Route::get('/view-clear', function() {
		$exitCode = Artisan::call('view:clear');
		return '<h1>View cache cleared</h1>';
	});

	//Clear Config cache:
	Route::get('/config-cache', function() {
		$exitCode = Artisan::call('config:cache');
		return '<h1>Clear Config cleared</h1>';
	});
});


// USUARIOS (LOGIN REGISTER)
Route::get('/signup', 'UserController@getSignup')->name('user.signup')->middleware('guest');
Route::post('/signup', 'UserController@postSignup')->name('user.signup')->middleware('guest');
Route::get('/signin', 'UserController@getSignin')->name('user.signin')->middleware('guest');
Route::post('/signin', 'UserController@postSignin')->name('user.signin')->middleware('guest');
Route::get('/perfil', 'UserController@getProfile')->name('user.profile')->middleware('auth');
Route::get('/logout', 'UserController@getLogout')->name('user.logout')->middleware('auth');

// CARRITO DE COMPRAS
Route::get('/add-to-cart/{id}/{pag?}', 'CarritoController@getAddToCart')->name('addToCart')->middleware('auth');
Route::get('/shopping-cart/{mensaje?}', 'CarritoController@getCart')->name('shoppingCart')->middleware('auth');
Route::get('/reduce/{id}', 'CarritoController@getReduceByOne')->name('reduceByOne')->middleware('auth');
Route::get('/remove/{id}', 'CarritoController@getRemoveItem')->name('remove')->middleware('auth');

// PASARELA DE PAGOS 
Route::get('checkoutStripe', 'CarritoController@getCheckoutStripe')->name('checkoutStripe')->middleware('auth');
Route::post('checkoutStripe', 'CarritoController@postCheckoutStripe')->name('checkoutStripe')->middleware('auth');

Route::get('getcheckoutConekta', 'CarritoController@getCheckoutConekta')->name('getcheckoutConekta')->middleware('auth');
Route::post('postcheckoutConekta', 'CarritoController@postCheckoutConekta')->name('postcheckoutConekta')->middleware('auth');
Route::get('paysuccess', 'CarritoController@paySuccess')->name('paysuccess')->middleware('auth');
Route::get('payerror/{msg?}', 'CarritoController@payError')->name('payerror')->middleware('auth');


