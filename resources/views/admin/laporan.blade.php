@extends('layouts.admin.app')

@section('title', 'Laporan')

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
  Laporan </a>
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
          Laporan
        </h3>
      </div>

      <div class="row align-items-center">
        <div class="col-8 kt-align-right">
          <form method="get" action="{{route('laporan.index')}}">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Masukkan No. Tiket" name="cari" @if(Request::get('cari') != '') value="{{Request::get('cari')}}" @endif>
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
            </div>
          </form>
        </div> 
        <div class="col-4">
          <form method="get" action="{{route('laporan.pdf')}}">
            <input type="hidden" name="status" @if(Request::get('status') != '') value="{{Request::get('status')}}" @endif>
            <input type="hidden" class="form-control" name="start" required="" @if(Request::get('start') != '') value="{{Request::get('start')}}" @endif>
            <input type="hidden" name="end"  @if(Request::get('end') != '') value="{{Request::get('end')}}" @endif>
            <button type="submit" class="btn btn-outline-danger">
              <i class="fa fa-file-pdf"></i> Pdf
            </button>
          </form>
        </div>


      </div>

    </div>
    <div class="kt-portlet__body">

      <form action="{{route('laporan.index')}}" method="get">
        <div class="row">
          <div class="col-2">
            <select class="form-control" name="status" onchange="change(this.value)" required="">
              <option value="" >Pilih Status</option>
              <option value="terbit" @if(Request::get('status') == 'terbit') selected="" @endif>Terbit</option>
              <option value="gagal" @if(Request::get('status') == 'gagal') selected="" @endif>Gagal</option>
            </select>
          </div>
          <div class="col-4" id="date">
            <div class="input-group" >
              <input type="date" class="form-control" name="start" required="" @if(Request::get('start') != '') value="{{Request::get('start')}}" @endif>
              <div class="input-group-append">
                <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
              </div>
              <input type="date" class="form-control" name="end" required="" @if(Request::get('end') != '') value="{{Request::get('end')}}" @endif>
            </div>
          </div>
          <div class="col-6" id="col-hide">
          </div>

          <div class="col-2" id="btn-submit">
            <button type="submit" class="btn btn-outline-secondary">Filter</button>
          </div>

        </div>
      </form>

      <br>
      <div class="row">
        <div class="col-12">
          <h6>Jumlah : {{$jml}} Data</h6>
        </div>
      </div>

      <br>

      <div class="tab-content">
        <div class="table-responsive">
          <!--begin: Datatable -->
          <table class="table table-striped table-bordered table-hover belum no-footer dtr-inline" role="grid" aria-describedby="table" width="100%">
            <thead>
              <tr>
                <th>No.</th>
                <th>No. Tiket</th>
                <th>No. Rekomendasi</th>
                <th>Jenis Izin</th>
                <th>Nama</th>
                <th>NIK</th>
                <th>Waktu Terbit</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @php $no=1; @endphp
              @foreach($data as $datas)
              <tr>
                <td>{{ $no++; }}</td>
                <td>{{ $datas->no_tiket }}</td>
                <td>@if($datas->jenis_izin == 'sip') {{$datas->sip->no_rekomendasi}} @elseif($datas->jenis_izin == 'sik') {{$datas->sik->no_rekomendasi}} @elseif($datas->jenis_izin == 'krk') {{$datas->krk->no_rekomendasi}} @else {{$datas->pendidikan->no_rekomendasi}} @endif</td>
                <td>{{ $datas->jenis_izin }}</td>
                <td>{{ $datas->user->name}} </td>
                <td>{{ $datas->user->nik}}</td>
                <td>{{ $datas->updated_at}}</td>
                <td><a href="" class="btn btn-outline-secondary btn-sm"><i class="fa fa-eye"></i></a></td>
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


@endsection

@section('page_script')
<!-- <script src="assets/js/demo1/" type="text/javascript"></script> -->
<script type="text/javascript" src="{{asset('js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
@if(Request::get('status') == 'gagal') 
<script>
  status = "{{Request::get('status')}}";
  $('#date').attr('style', 'display:none');
  $('#btn-submit').attr('style', 'display:none');
  $('#col-hide').attr('style', '');
</script>
@elseif(Request::get('status') == 'terbit') 
<script>
  status = "{{Request::get('status')}}";
  $('#date').attr('style', '');
  $('#btn-submit').attr('style', '');
  $('#col-hide').attr('style', 'display:none');
</script>
@else
<script>
  $('#col-hide').attr('style', 'display:none');
</script>
@endif

<script>
  console.log(status);

  // change(status);
  function change(val) {
    if(val == 'terbit') {
      $('#date').attr('style', '');
      $('#btn-submit').attr('style', '');
      $('#col-hide').attr('style', 'display:none');
    } else if(val =='gagal') {
      $('#date').attr('style', 'display:none');
      $('#btn-submit').attr('style', 'display:none');
      $('#col-hide').attr('style', '');
      window.location.href = "{{route('laporan.index', ['status' => 'gagal'])}}"
    }
  }

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

