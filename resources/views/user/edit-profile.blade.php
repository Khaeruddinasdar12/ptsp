@extends('layouts.user.app')

@section('title', 'Edit Profile')

@section('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('subheader')
<h3 class="kt-subheader__title">
  User
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
  <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">
  Detail - Edit Profile </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    @include('layouts.admin.alert')
  </div>
</div>
<div class="row justify-content-center">
  <div class="col-12">
    <div class="kt-portlet kt-portlet--mobile">
      <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
          <span class="kt-portlet__head-icon">
            <span class="kt-font-brand">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <path
                d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z"
                fill="#000000" opacity="0.3" />
                <path
                d="M10.875,15.75 C10.6354167,15.75 10.3958333,15.6541667 10.2041667,15.4625 L8.2875,13.5458333 C7.90416667,13.1625 7.90416667,12.5875 8.2875,12.2041667 C8.67083333,11.8208333 9.29375,11.8208333 9.62916667,12.2041667 L10.875,13.45 L14.0375,10.2875 C14.4208333,9.90416667 14.9958333,9.90416667 15.3791667,10.2875 C15.7625,10.6708333 15.7625,11.2458333 15.3791667,11.6291667 L11.5458333,15.4625 C11.3541667,15.6541667 11.1145833,15.75 10.875,15.75 Z"
                fill="#000000" />
                <path
                d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z"
                fill="#000000" />
              </g>
            </svg>
          </span>
        </span>
        <h3 class="kt-portlet__head-title">
          Detail -Edit Profile
        </h3>
      </div>
    </div>

    <div class="kt-portlet__body">
      <form method="POST" action="{{route('update.profile')}}">
        <div class="tab-content">
          {{ method_field('PUT') }}
          @csrf
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Nama Lengkap:*</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" value="{{Auth::user()->name}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">NIK:*</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" value="{{Auth::user()->nik}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Email:*</label>
            <div class="col-lg-9">
              <input type="text" class="form-control" value="{{Auth::user()->email}}" disabled>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Password Baru:*</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" name="password" id="showpassword">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label">Konfirmasi Password:*</label>
            <div class="col-lg-9">
              <input type="password" class="form-control" name="password_confirmation" id="showpassword1">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-3 col-form-label"></label>
            <div class="col-lg-9">
              <input type="checkbox" name="remember" onclick="viewpass()"> Tampilkan Password
                                            <span></span>
            </div>
          </div>

        </div>
        <div class="row align-items-center">
          <div class="col-12 kt-align-right">
            <button type="submit" class="btn btn-outline-info btn-sm" >
              <i class="fa fa-check"></i> Update
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection

<script>
    function viewpass() {
        var x = document.getElementById("showpassword");
        var y = document.getElementById("showpassword1");
        if (x.type === "password" && x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
</script>




