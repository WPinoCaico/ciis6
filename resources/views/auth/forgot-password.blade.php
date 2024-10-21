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
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
                <!--begin::Form-->
                <form method="POST" action="{{ route('password.email') }}" class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="kt_password_reset_form">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark fw-bolder mb-3">Has olvidado tu contraseña?</h1>
                        <!--end::Title-->
                        <!--begin::Link-->
                        <div class="text-gray-500 fw-semibold fs-6">Ingrese su correo electrónico para restablecer su contraseña.</div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-8 fv-plugins-icon-container">
                        <!--begin::Email-->
                        <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent @error('email') is-invalid @enderror">
                        <!--end::Email-->
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <!--begin::Actions-->
                    <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                        <button type="submit" id="kt_password_reset_submit" class="btn btn-primary me-4">
                            <!--begin::Indicator label-->
                            <span class="indicator-label">Enviar</span>
                            <!--end::Indicator label-->
                            <!--begin::Indicator progress-->
                            <span class="indicator-progress">Please wait... 
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator progress-->
                        </button>
                        <a href="{{ route('login') }}" class="btn btn-light">Cancelar</a>
                    </div>
                    <!--end::Actions-->
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