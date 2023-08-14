{{-- @extends('layouts.front')

@section('cssExtras')
@endsection

@section('styleExtras')
@endsection

@section('content')
<div class="container mt-5 mb-5 py-5">
    <div class="row mt-5">
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-9 col-9 mx-auto">
            <h1>Iniciar sesión</h1>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('user.signin') }}" method="POST">
                @csrf
                <div class="form-group row mt-2">
                    <div class="col-12 mx-auto">
                        <label for="email" class="fs-5">Correo electronico</label>
                        <input type="text" id="email" name="email" class="form-control fs-5" required>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <div class="col-12 mx-auto">
                        <label for="password" class="fs-5">Contraseña</label>
                        <input type="password" id="password" name="password" class="form-control fs-5" required>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <div class="col-6 mx-auto">
                        <button type="submit" class="btn w-100 btn-primary mt-5 fs-5">Entrar a mi cuenta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('jsLibExtras2')
@endsection --}}



























@extends('layouts.front')

@section('content')
<div class="container">
	<div class="row justify-content-center py-5">
		{{-- <div class="col-md-8">
			@if (session('status'))
			<div class="alert alert-primary text-center" role="alert">
				{{ session('status') }}
			</div>
			@endif
			<div class="card">
				<div class="card-header text-center">{{ __('Iniciar Sesion') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Entrar') }}
								</button>

								@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('¿Olvidaste tu contraseña?') }}
								</a>
								@endif
							</div>
						</div>
						<div class="col-md-12 text-center mt-3">
							<a href="{{ route('register') }}" class="btn btn-sm btn-primary">
								{{ __('Regístrate aquí') }}
							</a>
						</div>
					</form>
				</div>
			</div>
		</div> --}}

		<div class="col-md-5 mb-5">
			<div class="card mb-5 py-5 px-4" style="border-radius:26px; box-shadow:1px 1px 10px rgba(0, 0, 0, 0.119); border:none;">
				<div class="row">
					<div class="col-12">
						<div class="card-body">
							<h5 class="card-title text-center">{{ __('Iniciar Sesion') }}</h5>
							<form method="POST" action="{{ route('user.signin') }}">
								@csrf
								<div class="form-group mb-2">
									<label for="email" class="text-md-right">{{ __('Correo') }}</label>
									<div class="">
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" style="box-shadow: none;" value="{{ old('email') }}" required autocomplete="email" autofocus>

										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="form-group">
									<label for="password" class="text-md-right">{{ __('Contraseña') }}</label>
									<div class="">
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" style="box-shadow: none;" name="password" required autocomplete="current-password">
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
								</div>

								<div class="form-group row mb-0">
									<div class="d-flex justify-content-center text-center flex-column">
										<button type="submit" class="btn btn-primary col-12 my-3" style="background: #00AD61; border-radius: 16px; border:none;">
											{{ __('Entrar') }}
										</button>
										@if (Route::has('password.request'))
										<a class="btn btn-link" href="{{ route('password.request') }}" style="color: black;">
											{{ __('¿Olvidaste tu contraseña?') }}
										</a>
										@endif
									</div>
								</div>
							</form>

							<p class="card-text text-center">
								<a href="{{ route('user.signup') }}" class="btn btn-sm btn-primary px-4 py-1" style="background: #00AD61; border-radius: 16px; border:none;">
									{{ __('Regístrate aquí') }}
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection