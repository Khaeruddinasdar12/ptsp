@extends('admin.login_layout')

@section('title', 'Register')

@section('vendor-css')
<link href="{{ asset('css/pages/login/login-3.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- begin::Body -->

<body
class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor"
        style="background-image: url({{ asset('media/bg/bg-3.jpg') }});">
        <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
            <div class="kt-login__container">
                <div class="kt-login__logo">
                    <img src="{{ asset('img/logo-makassar.png') }}" width="15%"> 
                </div>
                <div class="kt-login__signin">
                    <div class="kt-login__head">
                        <h5 class="kt-login__title">Registrasi Perizinan Non OSS PTSP Makassar {{ date('Y') }}</h5>
                    </div>
                    <form class="kt-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group">
                            <input class="form-control @error('name') is-invalid @enderror" type="text" 
                            placeholder="Nama" name="name" value="{{ old('name') }}" required>
                            @error('name')
                            <div id="name-error" class="error invalid-feedback">
                            {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" 
                            placeholder="Email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                            <div id="email-error" class="error invalid-feedback">
                            {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="form-control @error('nik') is-invalid @enderror" type="text" 
                            placeholder="Nik" name="nik" value="{{ old('nik') }}" required>
                            @error('nik')
                            <div id="nik-error" class="error invalid-feedback">
                            {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="form-control @error('nohp') is-invalid @enderror" type="text" 
                            placeholder="No Hp" name="nohp" value="{{ old('nohp') }}" required>
                            @error('nohp')
                            <div id="nohp-error" class="error invalid-feedback">
                            {{ $message }}</div>
                            @enderror
                        </div>
                        <div class="input-group">
                            <input class="form-control" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="input-group">
                            <input class="form-control" type="password" placeholder="Konfirmasi Password" name="password_confirmation" required>
                        </div>
                        <div class="kt-login__actions">
                            <button type="submit"
                            class="btn btn-brand btn-elevate kt-login__btn-primary">Daftar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- end:: Page -->

</body>
@endsection

@section('vendor-js')
<script src="{{ asset('js/pages/custom/login/login-general.js') }}" type="text/javascript">
</script>
@endsection

@section('js')
@endsection