@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('subheader')
<h3 class="kt-subheader__title">
  Halaman Tidak Dapat Diakses!
</h3>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    @include('layouts.admin.alert')
  </div>
</div>

@endsection



