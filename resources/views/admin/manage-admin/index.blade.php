@extends('layouts.admin.app')

@section('title', 'Manage Admin')

@section('page_style')
@endsection

@section('subheader')
<h3 class="kt-subheader__title">
  Admin
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
  <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">
  Tabel Data Admin </a>
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
          Tabel Data Admin
        </h3>
      </div>
      <div class="row align-items-center">
        <div class="col-12 kt-align-right">
          <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-tambah-admin">
            <i class="fa fa-plus"></i>Tambah Admin</button>
          </div>
        </div>
      </div>
      <div class="kt-portlet__body">

        <div class="tab-content">
          <div class="table-responsive">
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover belum no-footer dtr-inline" role="grid" aria-describedby="table" width="100%">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @php $no=1; @endphp
                @foreach($data as $datas)
                <tr>
                  <td>{{ $no++; }}</td>
                  <td>{{ $datas->name }}</td>
                  <td>{{ $datas->nik }}</td>
                  <td>{{ $datas->email}} </td>
                  <td>{{ $datas->role}}</td>
                  <td></td>
                </tr>
                @endforeach
              </tbody>

            </table>
            <!--end: Datatable -->
          </div>
          {{$data->links('vendor.pagination.bootstrap-4')}}
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal Tambah Admin -->
<div class="modal fade bd-example-modal" id="modal-tambah-admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title"> Tambah Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('manage.admin.store') }}">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input type="text" class="form-control" name="name" value="{{old('name')}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">NIK:</label>
            <input type="text" class="form-control" name="nik" value="{{old('nik')}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="email" value="{{old('email')}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Password:</label>
            <input type="text" class="form-control" name="password">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Konfirmasi Password:</label>
            <input type="text" class="form-control" name="password_confirmation">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Pilih Role Akses:</label>
            <select class="form-control" name="role">
              <option value="bidang" @if(old('role') == 'bidang') selected @endif>Bidang</option>
              <option value="teknis" @if(old('role') == 'teknis') selected @endif>Teknis</option>
              <option value="kadis" @if(old('role') == 'kadis') selected @endif>Kadis</option>
              <option value="admin" @if(old('role') == 'admin') selected @endif>Admin</option>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
@endsection

@section('page_script')
<script>

    function berhasil(status, pesan) {
      Swal.fire({
        type: status,
        title: pesan,
        showConfirmButton: true,
        button: "Ok"
      })
    }

    function gagal(key, pesan) {
      Swal.fire({
        type: 'error',
        title:  key + ' : ' + pesan,
        showConfirmButton: true,
        timer: 25500,
        button: "Ok"
      })
    }
  </script>
  @endsection

