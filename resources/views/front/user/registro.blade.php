{{-- @extends('layouts.front')

@section('cssExtras')
@endsection

@section('styleExtras')
@endsection

@section('content')
<div class="container mt-5 mb-5 py-5">
    <div class="row mt-5">
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9 col-9 mx-auto">
            <h1>Registro</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.signup') }}" method="POST">
                @csrf
                <div class="form-group row mt-2">
                    <div class="col-12 mx-auto">
                        <label for="email" class="fs-5">Correo electronico</label>
                        <input type="text" id="email" name="email" class="form-control fs-5" placeholder="Ingresa un correo electronico valido" required>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <div class="col-12 mx-auto">
                        <label for="password" class="fs-5">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control fs-5" placeholder="Minimo 10 caracteres" required>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <div class="col-6 mx-auto">
                        <button type="submit" class="btn w-100 btn-primary mt-5 fs-5">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('jsLibExtras2')
@endsection
 --}}
































@extends('layouts.front')

@section('content')
<style>
		.error_p{
		border-color:red;
	}
	.success_p{
		border-color:green;
	}
	.form-control:focus{
		border-color:none !important;
		box-shadow:none;
	}
</style>
	<div class="container my-5">
		<div class="col-12 mt-5 d-flex justify-content-center align-items-center">
			<div class="container">
		
				<div class="col-12 d-flex flex-column flex-md-row my-5 my-md-0" style=" min-height:700px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.237); border-radius:26px;">
					<form method="POST" action="{{ route('user.signup') }}" class="col-12 col-md-7  d-flex justify-content-center align-items-center" style="background:;">
						@csrf
						<div class="col-12 p-4 d-flex justify-content-center align-items-center flex-column text-center">
							<h4 class="mb-5">Registrate</h4>
							<div class="input_b col-12 col-md-10 col-lg-7 mb-3">
							<input type="text" class="form-control @error('name') is-invalid @enderror" id="registrodeusuarios" name="name" placeholder="Nombre" style="border-radius:10px; box-shadow: none;" required autocomplete="name" autofocus required>
							</div>
							<div class="input_b col-12 col-md-10 col-lg-7 mb-3">
								<input type="text" class="form-control @error('lastname') is-invalid @enderror" id="registrodeusuarios" name="lastname" placeholder="Apellido" style="border-radius:10px;" required autocomplete="lastname" autofocus required>
								</div>
							<div class="col-12 col-md-10 col-lg-7 mb-3">
							<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Example@email.com" style="border-radius:10px;" required>
							@error('email')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
							@enderror
							</div>
							<div class="col-12 col-md-10 col-lg-7 mb-3 ">
							<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña" style="border-radius:10px;" required autocomplete="email">
							<p id="msj_error" class="mb-0 mt-1" style="color:red; display:none;">Contraseña bastante corta</p>
							</div>
							<div class="col-12 col-md-10 col-lg-7 mb-3">
							<input type="password" class="form-control" id="password_verify" placeholder="Confirma contraseña" name="password_confirmation" style="border-radius:10px;" required autocomplete="new-password">
							<p id="msj_error2" class="mb-0 mt-1" style="color:red; display:none;">La contraseña no coincide</p>
							</div>
							<div class="col-12 col-md-10 col-lg-7 mb-3 d-flex justify-content-center align-items-center flex-column">
								<button type="submit" id="register_btn" class="col-12 btn btn-primary" style="border-radius:10px; background: #00AD61; border:none;" >Registrase</button>
							</div>
							<div class="col-12 col-md-10 col-lg-7 mb-3">
								<p>Ya tengo cuenta. <a href="{{url('login')}}" class="" uk-toggle>Sign in</a></p>
							</div>
						</div>
					</form>
					<div class="col-12 col-md-5 d-flex justify-content-center align-items-center" style="background:#00AD61; border-top-right-radius: 26px; border-bottom-right-radius:26px;">
						<div class="col-12 p-4 d-flex justify-content-center align-items-center flex-column text-center">
						<img src="{{asset('img/front/design/LogoBlanco.png')}}" class="mb-3" style="width:250px" alt="">	
						<h6 class="mb-3" style="color:white;">Encantado de verte</h6>
						<p class="mb-3 px-5" style="color:white; font-size: 12px;">Completa el formulario para registrarte y tener acceso a nuestra selección de artículos.</p>
						</div>
					</div>
				</div>
		
		
			</div>
		</div>

		<script>	$("#password").change(function() {
			var pass  = $("#password").val();
			var len   = (pass).length;
	
			if(len>6){
				$('#password').addClass("success_p");
				$('#password').removeClass("error_p");
				document.getElementById('msj_error').style.display = 'none';
			}else{
				if(len>0){
				$('#password').addClass("error_p");
				$('#password').removeClass("success_p");
				document.getElementById('msj_error').style.display = 'block';
				}else{
					$('#password').removeClass("success_p");
					$('#password').removeClass("error_p");
					document.getElementById('msj_error').style.display = 'none';
				}
				
				
			}
		});
	
		$("#password_verify").change(function() {
			var pass1  = $("#password").val();
			var pass  = $("#password_verify").val();
			var len   = (pass).length;
	
			if(len>6 && pass1 == pass){
				$('#password_verify').addClass("success_p");
				$('#password_verify').removeClass("error_p");
				document.getElementById('msj_error2').style.display = 'none';
				$('#register_btn').removeAttr('disabled');
			}else{
				if(len>0){
				$('#password_verify').addClass("error_p");
				$('#password_verify').removeClass("success_p");
				document.getElementById('msj_error2').style.display = 'block';
				}else{
					$('#password_verify').removeClass("success_p");
					$('#password_verify').removeClass("error_p");
					document.getElementById('msj_error2').style.display = 'none';
				}
				$('#register_btn').prop('disabled', true);
	
				
			}
		});</script>
		{{-- <div class="row justify-content-center py-5">

			<div class="col-md-8">
				<div class="card" style="border-radius: 26px;">
					<img src="{{asset('img/design/logoFooter.png')}}" class="card-img-top w-50 mx-auto mt-3" alt="logo.png">
					<div class="card-body">
						<div class="card-title text-center h3 py-3">{{ __('Register') }}</div>
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="name" class="col-md-4 col-form-label text-md-right">* {{ __('Name') }}</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

									@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="lastname" class="col-md-4 col-form-label text-md-right">* {{ __('Apellidos') }}</label>

								<div class="col-md-6">
									<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

									@error('lastname')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-md-4 col-form-label text-md-right">* {{ __('E-Mail Address') }}</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

									@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-md-4 col-form-label text-md-right">* {{ __('Password') }}</label>

								<div class="col-md-6">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

									@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm" class="col-md-4 col-form-label text-md-right">* {{ __('Confirm Password') }}</label>

								<div class="col-md-6">
									<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="form-group row">
								<div class="offset-md-4 col-md-6  text-right">
									* Campos obligatorios
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

		</div> --}}
	</div>
@endsection