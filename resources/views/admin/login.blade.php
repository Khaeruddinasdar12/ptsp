@extends('admin.login_layout')

@section('title', 'Login')

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
                            <a href="#">
                                <img src="{{ asset('img/logo-makassar.png') }}" width="20%">
                            </a>
                        </div>
                        <div class="kt-login__signin">
                            <div class="kt-login__head">
                                <h3 class="kt-login__title">Administrasi PTSP Makassar {{ date('Y') }}</h3>
                            </div>
                            <form class="kt-form" method="POST" action="{{ route('admin.loginPost') }}">
                                @csrf
                                <div class="input-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" 
                                        placeholder="Email" name="email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div id="email-error" class="error invalid-feedback">
                                        {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <input class="form-control" type="password" placeholder="Password" name="password" required id="showpassword">
                                    @error('email')
                                    <div id="password-error" class="error invalid-feedback">
                                        {{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="row kt-login__extra">
                                    <div class="col">
                                        <label class="kt-checkbox">
                                            <input type="checkbox" name="remember" onclick="viewpassword()"> Tampilkan Password
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="kt-login__actions">
                                    <button type="submit"
                                        class="btn btn-brand btn-elevate kt-login__btn-primary">Login</button>
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
<script>
    function viewpassword() {
        var x = document.getElementById("showpassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script src="{{ asset('js/pages/custom/login/login-general.js') }}" type="text/javascript">
</script>
@endsection

@section('js')
@endsection