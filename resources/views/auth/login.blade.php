@extends('layouts.app')
@section('content')
	<div class="d-flex flex-column flex-lg-row flex-column-fluid">
		<div class="d-flex flex-lg-row-fluid">
			<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">				
				<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">VI CONGRESO INTERNACIONAL DE INGENIERÍA DE SISTEMAS E INVESTIGACIÓN CIENTÍFICA</h1>				
			</div>
		</div>
		<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
			<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
				<div class="w-md-400px">
					<form class="form w-100" action="{{route('login')}}" novalidate="novalidate" id="kt_sign_in_form" method="POST">
						@csrf
						<div class="text-center mb-11">
							<h1 class="text-dark fw-bolder mb-3">Iniciar sesión</h1>
							<div class="text-gray-500 fw-semibold fs-6">Accede a la plataforma</div>
						</div>						
						<div class="fv-row mb-8">
							<input type="text" placeholder="Ingrese DNI o Email" name="email" value="{{ old('email') }}" autocomplete="off" class="form-control bg-transparent" />
							@error('email') <div>{{$message}}</div>@enderror
						</div>
						<div class="fv-row mb-3" data-kt-password-meter="true">
							<div class="mb-1">
								<div class="position-relative mb-3">
									<input class="form-control bg-transparent" type="password" placeholder="Contraseña" name="password" autocomplete="off" required/>
									<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
										<i class="bi bi-eye-slash fs-2"></i>
										<i class="bi bi-eye fs-2 d-none"></i>
									</span>
									@error('password') <div>{{$message}}</div>@enderror
								</div>
							</div>
						</div>
						<div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
							<div></div>
						</div>
						<div class="col-md-12">
						</div>					
						<div class="d-grid mb-5">
							<button type="submit" id="kt_sign_in_submit" value="Login" class="btn btn-primary">
								<span class="indicator-label">Iniciar sesion</span>
								<span class="indicator-progress">Please wait...
								<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection