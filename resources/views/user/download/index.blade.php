@extends('layouts.user.app')

@section('title', 'Download')

@section('page_style')
@endsection

@section('subheader')
<h3 class="kt-subheader__title">
  Perizinan
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
  <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">
  Tabel Data Perizinan Telah Terbit </a>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    @include('layouts.user.alert')
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
          Tabel Data Perizinan Telah Terbit
        </h3>
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
                <th>No. Tiket</th>
                <th>Jenis Izin</th>
                <th>Sub Izin</th>
                <th>Status</th>
                <th>Tanggal Terbit</th>
                <th>Sertifikat</th>
              </tr>
            </thead>
            <tbody>
              @php $no=1; $ext = '.pdf'; @endphp
              @foreach($data as $datas)
              <tr>
                <td>{{ $no++; }}</td>
                <td>{{ $datas->no_tiket}}</td>
                <td>{{ $datas->jenis_izin}} </td>
                <td></td>
                <td>
                  <span class="badge rounded-pill bg-success text-white">Telah Terbit</span>
                </td>
                <td>{{ $datas->updated_at }}</td>
                <td><a href="{{asset('storage/sertifikat/'.$datas->no_tiket.$ext) }}" target="_blank" class="btn btn-outline-danger btn-sm" title="sertifikat">
                  <i class="fa fa-file-pdf"></i>
                </a></td>
              </tr>
              @endforeach
            </tbody>

          </table>
          <!--end: Datatable -->
        </div>
        {{ $data->links('vendor.pagination.bootstrap-4') }}
      </div>
    </div>
  </div>
</div>
</div>
@endsection