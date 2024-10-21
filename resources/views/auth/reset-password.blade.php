@extends('layouts.app')

@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <!--begin::Aside-->
    <div class="d-flex flex-lg-row-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <!--begin::Image-->
            {{-- <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="/metronic8/demo1/assets/media/auth/agency.png" alt="">
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="/metronic8/demo1/assets/media/auth/agency-dark.png" alt=""> --}}
            <!--end::Image-->
            <!--begin::Title-->
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Sistema de Admisión UNDC</h1>
            <!--end::Title-->
            <!--begin::Text-->
            {{-- <div class="text-gray-600 fs-base text-center fw-semibold">In this kind of post, 
            <a href="#" class="opacity-75-hover text-primary me-1">the blogger</a>introduces a person they’ve interviewed 
            <br>and provides some background information about 
            <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>and their 
            <br>work following this is a transcript of the interview.</div> --}}
            <!--end::Text-->
        </div>
        <!--end::Content-->
    </div>
    <!--begin::Aside-->
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <!--begin::Wrapper-->
        <div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
            <!--begin::Content-->
            <div class="w-md-400px">
                <!--begin::Form-->
                <form method="POST" action="{{ route('password.update') }}" class="form w-100">
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ request()->token }}">
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3">Configurar nueva contraseña</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-500 fw-semibold fs-6">¿Ya has restablecido la contraseña?
                        <a href="{{ route('login') }}" class="link-primary fw-bold">Iniciar sesión</a></div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--end::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Repeat Password-->
                        {{-- <input id="email" type="email" placeholder="Email" name="email" autocomplete="off" class="form-control @error('email') is-invalid @enderror bg-transparent" value="{{ $email ?? old('email') }}"  required autocomplete="email" autofocus> --}}
                        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        <!--end::Repeat Password-->
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-8" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control bg-transparent @error('password') is-invalid @enderror" type="password" placeholder="Contraseña" name="password" autocomplete="off" required>
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="bi bi-eye-slash fs-2"></i>
                                    <i class="bi bi-eye fs-2 d-none"></i>
                                </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!--end::Input wrapper-->
                            <!--begin::Meter-->
                            {{-- <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                            </div> --}}
                            <!--end::Meter-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Hint-->
                        {{-- <div class="text-muted">Use 8 o más caracteres con una combinación de letras, números &amp; simbolos.</div> --}}
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--end::Input group=-->
                    <div class="fv-row mb-8">
                        <!--begin::Repeat Password-->
                        <input type="password" placeholder="Repita la contraseña" name="password_confirmation" autocomplete="off" class="form-control bg-transparent" required>
                        <!--end::Repeat Password-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8">
                        <label class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" required />
                            <span class="form-check-label fw-semibold text-gray-700 fs-base ms-1">Acepto los
                            <a href="https://portal.undc.edu.pe/terminos-y-condiciones/" class="ms-1 link-primary" target="_blank">Terminos y condiciones</a> y la 
                            <a href="https://portal.undc.edu.pe/pdatospersonales/" class="ms-1 link-primary" target="_blank">Política de privacidad de los datos</a>.</span>
                        </label>
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Action-->
                    <div class="d-grid mb-10">
                        <button type="submit" id="kt_new_password_submit" class="btn btn-primary">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Enviar</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Espere por favor... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Action-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>
@endsection