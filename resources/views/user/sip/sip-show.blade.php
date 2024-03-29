@extends('layouts.user.app')

@section('title', 'Perizinan')

@section('subheader')
<!-- LOADER -->
<div style="display: none;" id="loader" class="loader">
</div>
<!-- END LOADER -->

<h3 class="kt-subheader__title">
  Perizinan
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
  <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">
    Detail
  </div>

  @endsection

  @section('content')

  <div class="row justify-content-center">
    <div class="col-md-12">
      @include('layouts.user.alert')
    </div>
  </div>

  <div class="kt-portlet">
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
              fill="#000000" /></g>
            </svg>
          </span>
        </span>
        <h3 class="kt-portlet__head-title">
          Detail Data Perizinan
        </h3>
      </div>
      <div class="row align-items-center">
        <div class="col-12 kt-align-right">
          <button type="button" class="btn btn-success btn-sm" id="update" onclick="updateberkas()">
            <i class="fa fa-check"></i> Update Berkas
          </button>
        </div>
      </div>
    </div>

    <div class="kt-portlet__body">
      <div class="alert alert-secondary fade show" role="alert">
        <div class="alert-icon"><i class="fa flaticon2-check-mark"></i></div>
        <div class="alert-text">
          <strong class="text-danger">Mohon Perhatian!</strong>
          <li>Menenekan tombol Update Berkas akan mengirim berkas ke admin dan Anda tidak dapat mengubahnya lagi!</li>
        </div>
        <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>No. Tiket : <b>{{$data->no_tiket}}</b></p>
        </div>
        <div class="col-md-12">
          <p>Jenis Perizinan : <b>{{ $data->sip->subizin->nama }}</b></p>
        </div>
      </div>

      <div class="table-responsive">
        <!--begin: Datatable -->
        <table class="table table-striped table-bordered table-hover belum no-footer dtr-inline" role="grid" aria-describedby="table" width="100%">
          <thead>
            <tr>
              <th>No.</th>
              <th>Formulir</th>
              <th>Isi</th>
              <th>Status</th>
              <th>Ket</th>
              <th>Action</th>
            </tr>
          </thead>
          @php 
          $no = 1; 
          $terima = '<span class="badge rounded-pill bg-success text-white"><i class="fa fa-check"></i> Terima</span>' ;
          $tolak = '<span class="badge rounded-pill bg-danger text-white"><i class="fa flaticon-circle"></i> Ditolak</span>';
          $belumperiksa = '<span class="badge rounded-pill bg-warning"><i class="fa flaticon-info"></i> Belum diperiksa</span>';
          @endphp
          <tbody>

            <tr>
              <td>{{$no}}</td>
              <td valign="center">Nama Sesuai STR</td>
              <td>{{ $data->sip->gelar_awal }} {{ $data->sip->nama }} {{ $data->sip->gelar_akhir }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->nama =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->nama == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->nama != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->nama != '1')
              <td> {{$data->sip->reason->nama}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control col-3" name="gelar_awal" required placeholder="Gelar Depan">
                    <input type="text" class="form-control col-6" name="nama" required placeholder="Nama Sesuai STR">
                    <input type="text" class="form-control col-3" name="gelar_akhir" required placeholder="Gelar Belakang" >
                    <input type="hidden" class="form-control" name="key" value="nama">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>

            <tr>
              <td>{{$no = $no+1}}</td>
              <td valign="center">Konsultan</td>
              <td>{{ $data->sip->konsultan }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->konsultan =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->konsultan == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->konsultan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->konsultan != '1')
              <td> {{$data->sip->reason->konsultan}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="konsultan">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>

            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tempat Lahir</td>
              <td>{{ $data->sip->tempat_lahir }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->tempat_lahir =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->tempat_lahir == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->tempat_lahir != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->tempat_lahir != '1')
              <td> {{$data->sip->reason->tempat_lahir}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="tempat_lahir">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Lahir</td>
              <td>{{ $data->sip->tanggal_lahir }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->tanggal_lahir =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->tanggal_lahir == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->tanggal_lahir != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->tanggal_lahir != '1')
              <td> {{$data->sip->reason->tanggal_lahir}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="date" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="tanggal_lahir">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Alamat Rumah</td>
              <td>{{ $data->sip->alamat }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->alamat =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->alamat == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->alamat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->alamat != '1')
              <td> {{$data->sip->reason->alamat}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="alamat">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>No. Rekomendasi OP</td>
              <td>{{ $data->sip->no_str }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->rekomendasi_op =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->rekomendasi_op == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->rekomendasi_op != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->rekomendasi_op != '1')
              <td> {{$data->sip->reason->rekomendasi_op}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="rekomendasi_op">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nomor STR</td>
              <td>{{ $data->sip->no_str }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->no_str =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->no_str == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->no_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->no_str != '1')
              <td> {{$data->sip->reason->no_str}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="no_str">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Mulai Berlaku STR</td>
              <td>{{ $data->sip->awal_str }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->awal_str =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->awal_str == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->awal_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->awal_str != '1')
              <td> {{$data->sip->reason->awal_str}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="date" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="awal_str">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Berakhir STR</td>
              <td>{{ $data->sip->akhir_str }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->akhir_str =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->akhir_str == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->akhir_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->akhir_str != '1')
              <td> {{$data->sip->reason->akhir_str}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="date" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="akhir_str">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>

            <!-- PRAKTEK 1, JALAN 1, KELURAHAN & KECAMATAN 1 -->
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Praktek 1</td>
              <td>{{ $data->sip->nama_praktek1 }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->nama_praktek1 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->nama_praktek1 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->nama_praktek1 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->nama_praktek1 != '1')
              <td> {{$data->sip->reason->nama_praktek1}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="nama_praktek1">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jejaring</td>
              <td>{{ $data->sip->jejaring1 }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->jejaring1 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->jejaring1 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->jejaring1 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->jejaring1 != '1')
              <td> {{$data->sip->reason->jejaring1}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="jejaring1">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan 1</td>
              <td>{{ $data->sip->jalan1 }}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->jalan1 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->jalan1 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->jalan1 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->jalan1 != '1')
              <td> {{$data->sip->reason->jalan1}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="jalan1">
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek 1</td>
              <td>Kec. {{ $data->sip->klh1->kecamatan }}, Kel. {{ $data->sip->klh1->kelurahan }} </td>
              <td>
                @if($data->sip->reason && $data->sip->reason->kelurahan1 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->kelurahan1 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->kelurahan1 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->kelurahan1 != '1')
              <td> {{$data->sip->reason->jalan1}} </td>
              <td>
                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                  <div class="input-group">                  
                    @csrf
                    @method('PUT')
                    <!-- PILIH KACAMATAN -->
                    <select class="form-control" name="kecamatan1" id="kecamatan1" onchange="show_kelurahan1(this.value)" required>
                      <option value="Biringkanaya" @if($data->sip->klh1->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                      <option value="Bontoala" @if($data->sip->klh1->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                      <option value="Kepulauan Sangkarrang" @if($data->sip->klh1->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                      <option value="Makassar" @if($data->sip->klh1->kecamatan == 'Makassar') selected @endif>Makassar</option>
                      <option value="Mamajang" @if($data->sip->klh1->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                      <option value="Manggala" @if($data->sip->klh1->kecamatan == 'Manggala') selected @endif>Manggala</option>
                      <option value="Mariso" @if($data->sip->klh1->kecamatan == 'Mariso') selected @endif>Mariso</option>
                      <option value="Panakkukang" @if($data->sip->klh1->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                      <option value="Rappocini" @if($data->sip->klh1->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                      <option value="Tallo" @if($data->sip->klh1->kecamatan == 'Tallo') selected @endif>Tallo</option>
                      <option value="Tamalanrea" @if($data->sip->klh1->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                      <option value="Tamalate" @if($data->sip->klh1->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                      <option value="Ujung Pandang" @if($data->sip->klh1->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                      <option value="Ujung Tanah" @if($data->sip->klh1->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                      <option value="Wajo" @if($data->sip->klh1->kecamatan == 'Wajo') selected @endif>Wajo</option>
                    </select>
                    <select class="form-control" name="revisi" id="kelurahan1">
                      <option></option>
                    </select>
                    <input type="hidden" name="key" value="kelurahan1" required>
                    <button type="submit" class="btn btn-outline-secondary">Update
                    </button>
                  </div>
                </form>
              </td>
              @else
              <td></td>
              <td></td>
              @endif
            </tr>

            @if($data->sip->subizin_id == '7')
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jadwal Praktek 1</td>
              <td>{{ $data->sip->hari_buka1 }} s/d {{ $data->sip->hari_tutup1 }}, {{$data->sip->jam_buka1}} - {{$data->sip->jam_tutup1}}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->jadwal1 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->jadwal1 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->jadwal1 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->jadwal1 != '1')
              <td> {{$data->sip->reason->jadwal1}} </td>
              <td>

                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                 <input type="hidden" name="key" value="jadwal1">
                 <div class="row">
                  @csrf
                  @method('PUT')
                  <div class="col-lg-6 form-floating">
                    @php $hari_buka1 = null; @endphp
                    @if($data->sip->hari_buka1)
                    @php $hari_buka1 = $data->sip->hari_buka1; @endphp
                    @endif
                    <label for="floatingInputInvalid">Hari Buka</label>
                    <select class="form-control" name="hari_buka1" required="" id="hari_buka1">
                      <option value="">Pilih hari</option>
                      <option value="Senin" @if($hari_buka1 == 'Senin') selected @endif>Senin</option>
                      <option value="Selasa" @if($hari_buka1 == 'Selasa') selected @endif>Selasa</option>
                      <option value="Rabu" @if($hari_buka1 == 'Rabu') selected @endif>Rabu</option>
                      <option value="Kamis" @if($hari_buka1 == 'Kamis') selected @endif>Kamis</option>
                      <option value="Jumat" @if($hari_buka1 == 'Jumat') selected @endif>Jumat</option>
                      <option value="Sabtu" @if($hari_buka1 == 'Sabtu') selected @endif>Sabtu</option>
                      <option value="Minggu" @if($hari_buka1 == 'Minggu') selected @endif>Minggu</option>
                    </select>
                  </div>
                  <div class="col-lg-6 form-floating">
                    @php $hari_tutup1 = null; @endphp
                    @if($data->sip->hari_tutup1)
                    @php $hari_tutup1 = $data->sip->hari_tutup1; @endphp
                    @endif
                    <label for="floatingInputInvalid">Hari Tutup</label>
                    <select class="form-control" name="hari_tutup1" required="" id="hari_tutup1">
                      <option value="">Pilih hari</option>
                      <option value="Senin" @if($hari_tutup1 == 'Senin') selected @endif>Senin</option>
                      <option value="Selasa" @if($hari_tutup1 == 'Selasa') selected @endif>Selasa</option>
                      <option value="Rabu" @if($hari_tutup1 == 'Rabu') selected @endif>Rabu</option>
                      <option value="Kamis" @if($hari_tutup1 == 'Kamis') selected @endif>Kamis</option>
                      <option value="Jumat" @if($hari_tutup1 == 'Jumat') selected @endif>Jumat</option>
                      <option value="Sabtu" @if($hari_tutup1 == 'Sabtu') selected @endif>Sabtu</option>
                      <option value="Minggu" @if($hari_tutup1 == 'Minggu') selected @endif>Minggu</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 form-floating">
                    @php $jam_buka1 = null; $menitbuka1 = null; @endphp
                    @if($data->sip->jam_buka1)
                    @php 
                    $jam_buka1 = strtok($data->sip->jam_buka1, ':');  
                    $menitbuka1 = substr($data->sip->jam_buka1, strpos($data->sip->jam_buka1, ":") + 1);
                    @endphp
                    @endif
                    <label for="floatingInputInvalid">Jam Buka</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="jam_buka1">
                        @php $i = 0; @endphp
                        @for($i; $i < 24; $i++)
                        <option value="{{$i}}" @if($jam_buka1 == $i) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                      <select class="form-control" name="menitbuka1">
                        <option value="00" @if($menitbuka1 == '00') selected @endif>00</option>
                        <option value="15" @if($menitbuka1 == '15') selected @endif>15</option>
                        <option value="30" @if($menitbuka1 == '30') selected @endif>30</option>
                        <option value="45" @if($menitbuka1 == '45') selected @endif>45</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 form-floating">
                    @php $jam_tutup1 = null; $menittutup1 = null; @endphp
                    @if($data->sip->jam_tutup1)
                    @php 
                    $jam_tutup1 = strtok($data->sip->jam_tutup1, ':');  
                    $menittutup1 = substr($data->sip->jam_tutup1, strpos($data->sip->jam_tutup1, ":") + 1);
                    @endphp
                    @endif
                    <label for="floatingInputInvalid">Jam Tutup</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="jam_tutup1">
                        @php $i = 0; @endphp
                        @for($i; $i < 24; $i++)
                        <option value="{{$i}}" @if($jam_tutup1 == $i) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                      <select class="form-control" name="menittutup1">
                        <option value="00" @if($menittutup1 == '00') selected @endif>00</option>
                        <option value="15" @if($menittutup1 == '15') selected @endif>15</option>
                        <option value="30" @if($menittutup1 == '30') selected @endif>30</option>
                        <option value="45" @if($menittutup1 == '45') selected @endif>45</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-12 kt-align-right">
                    <button type="submit" class="btn btn-outline-secondary">
                       Update
                    </button>
                  </div>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          @else
          @endif
          <!-- END OF PRAKTEK 1, JALAN 1, KELURAHAN & KECAMATAN 1 -->


          <!-- PRAKTEK 2, JALAN 2, KELURAHAN & KECAMATAN 2 -->
          @if($data->sip->nama_praktek2 && $data->sip->jalan2 && $data->sip->kelurahan2)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Nama Praktek 2</td>
            <td>{{ $data->sip->nama_praktek2 }}</td>
            <td>
              @if($data->sip->reason && $data->sip->reason->nama_praktek2 =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->nama_praktek2 == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->nama_praktek2 != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->nama_praktek2 != '1')
            <td> {{$data->sip->reason->nama_praktek2}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                <div class="input-group">
                  @csrf
                  @method('PUT')
                  <input type="text" class="form-control" name="revisi" required>
                  <input type="hidden" class="form-control" name="key" value="nama_praktek2">
                  <button type="submit" class="btn btn-outline-secondary">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Jalan 2</td>
            <td>{{ $data->sip->jalan2 }}</td>
            <td>
              @if($data->sip->reason && $data->sip->reason->jalan2 =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->jalan2 == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->jalan2 != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->jalan2 != '1')
            <td> {{$data->sip->reason->jalan2}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                <div class="input-group">
                  @csrf
                  @method('PUT')
                  <input type="text" class="form-control" name="revisi" required>
                  <input type="hidden" class="form-control" name="key" value="jalan2">
                  <button type="submit" class="btn btn-outline-secondary">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Kecamatan & Kelurahan Praktek 2</td>
            <td>Kec. {{ $data->sip->klh2->kecamatan }}, Kel. {{ $data->sip->klh2->kelurahan }} </td>
            <td>
              @if($data->sip->reason && $data->sip->reason->kelurahan2 =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->kelurahan2 == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->kelurahan2 != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->kelurahan2 != '1')
            <td> {{$data->sip->reason->jalan2}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                <div class="input-group">                  
                  @csrf
                  @method('PUT')
                  <!-- PILIH KACAMATAN -->
                  <select class="form-control" name="kecamatan2" id="kecamatan2" onchange="show_kelurahan2(this.value)" required>
                    <option value="Biringkanaya" @if($data->sip->klh2->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                    <option value="Bontoala" @if($data->sip->klh2->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                    <option value="Kepulauan Sangkarrang" @if($data->sip->klh2->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                    <option value="Makassar" @if($data->sip->klh2->kecamatan == 'Makassar') selected @endif>Makassar</option>
                    <option value="Mamajang" @if($data->sip->klh2->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                    <option value="Manggala" @if($data->sip->klh2->kecamatan == 'Manggala') selected @endif>Manggala</option>
                    <option value="Mariso" @if($data->sip->klh2->kecamatan == 'Mariso') selected @endif>Mariso</option>
                    <option value="Panakkukang" @if($data->sip->klh2->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                    <option value="Rappocini" @if($data->sip->klh2->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                    <option value="Tallo" @if($data->sip->klh2->kecamatan == 'Tallo') selected @endif>Tallo</option>
                    <option value="Tamalanrea" @if($data->sip->klh2->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                    <option value="Tamalate" @if($data->sip->klh2->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                    <option value="Ujung Pandang" @if($data->sip->klh2->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                    <option value="Ujung Tanah" @if($data->sip->klh2->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                    <option value="Wajo" @if($data->sip->klh2->kecamatan == 'Wajo') selected @endif>Wajo</option>
                  </select>
                  <select class="form-control" name="revisi" id="kelurahan2">
                    <option></option>
                  </select>
                  <input type="hidden" name="key" value="kelurahan2" required>
                  <button type="submit" class="btn btn-outline-secondary">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          @endif

          <!-- Jadwal Praktek 2 -->
          @if($data->sip->subizin_id == '7')
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jadwal Praktek 2</td>
              <td>{{ $data->sip->hari_buka2 }} s/d {{ $data->sip->hari_tutup2 }}, {{$data->sip->jam_buka2}} - {{$data->sip->jam_tutup2}}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->jadwal2 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->jadwal2 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->jadwal2 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->jadwal2 != '1')
              <td> {{$data->sip->reason->jadwal2}} </td>
              <td>

                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                 <input type="hidden" name="key" value="jadwal2">
                 <div class="row">
                  @csrf
                  @method('PUT')
                  <div class="col-lg-6 form-floating">
                    @php $hari_buka2 = null; @endphp
                    @if($data->sip->hari_buka2)
                    @php $hari_buka2 = $data->sip->hari_buka2; @endphp
                    @endif
                    <label for="floatingInputInvalid">Hari Buka</label>
                    <select class="form-control" name="hari_buka2" required="" id="hari_buka2">
                      <option value="">Pilih hari</option>
                      <option value="Senin" @if($hari_buka2 == 'Senin') selected @endif>Senin</option>
                      <option value="Selasa" @if($hari_buka2 == 'Selasa') selected @endif>Selasa</option>
                      <option value="Rabu" @if($hari_buka2 == 'Rabu') selected @endif>Rabu</option>
                      <option value="Kamis" @if($hari_buka2 == 'Kamis') selected @endif>Kamis</option>
                      <option value="Jumat" @if($hari_buka2 == 'Jumat') selected @endif>Jumat</option>
                      <option value="Sabtu" @if($hari_buka2 == 'Sabtu') selected @endif>Sabtu</option>
                      <option value="Minggu" @if($hari_buka2 == 'Minggu') selected @endif>Minggu</option>
                    </select>
                  </div>
                  <div class="col-lg-6 form-floating">
                    @php $hari_tutup2 = null; @endphp
                    @if($data->sip->hari_tutup2)
                    @php $hari_tutup2 = $data->sip->hari_tutup2; @endphp
                    @endif
                    <label for="floatingInputInvalid">Hari Tutup</label>
                    <select class="form-control" name="hari_tutup2" required="" id="hari_tutup2">
                      <option value="">Pilih hari</option>
                      <option value="Senin" @if($hari_tutup2 == 'Senin') selected @endif>Senin</option>
                      <option value="Selasa" @if($hari_tutup2 == 'Selasa') selected @endif>Selasa</option>
                      <option value="Rabu" @if($hari_tutup2 == 'Rabu') selected @endif>Rabu</option>
                      <option value="Kamis" @if($hari_tutup2 == 'Kamis') selected @endif>Kamis</option>
                      <option value="Jumat" @if($hari_tutup2 == 'Jumat') selected @endif>Jumat</option>
                      <option value="Sabtu" @if($hari_tutup2 == 'Sabtu') selected @endif>Sabtu</option>
                      <option value="Minggu" @if($hari_tutup2 == 'Minggu') selected @endif>Minggu</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 form-floating">
                    @php $jam_buka2 = null; $menitbuka2 = null; @endphp
                    @if($data->sip->jam_buka2)
                    @php 
                    $jam_buka2 = strtok($data->sip->jam_buka2, ':');  
                    $menitbuka2 = substr($data->sip->jam_buka2, strpos($data->sip->jam_buka2, ":") + 1);
                    @endphp
                    @endif
                    <label for="floatingInputInvalid">Jam Buka</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="jam_buka2">
                        @php $i = 0; @endphp
                        @for($i; $i < 24; $i++)
                        <option value="{{$i}}" @if($jam_buka2 == $i) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                      <select class="form-control" name="menitbuka2">
                        <option value="00" @if($menitbuka2 == '00') selected @endif>00</option>
                        <option value="15" @if($menitbuka2 == '15') selected @endif>15</option>
                        <option value="30" @if($menitbuka2 == '30') selected @endif>30</option>
                        <option value="45" @if($menitbuka2 == '45') selected @endif>45</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 form-floating">
                    @php $jam_tutup2 = null; $menittutup2 = null; @endphp
                    @if($data->sip->jam_tutup2)
                    @php 
                    $jam_tutup2 = strtok($data->sip->jam_tutup2, ':');  
                    $menittutup2 = substr($data->sip->jam_tutup2, strpos($data->sip->jam_tutup2, ":") + 1);
                    @endphp
                    @endif
                    <label for="floatingInputInvalid">Jam Tutup</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="jam_tutup2">
                        @php $i = 0; @endphp
                        @for($i; $i < 24; $i++)
                        <option value="{{$i}}" @if($jam_tutup1 == $i) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                      <select class="form-control" name="menittutup2">
                        <option value="00" @if($menittutup2 == '00') selected @endif>00</option>
                        <option value="15" @if($menittutup2 == '15') selected @endif>15</option>
                        <option value="30" @if($menittutup2 == '30') selected @endif>30</option>
                        <option value="45" @if($menittutup2 == '45') selected @endif>45</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-12 kt-align-right">
                    <button type="submit" class="btn btn-outline-secondary">
                       Update
                    </button>
                  </div>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          @else
          @endif
          <!-- End praktek 2 -->
          <!-- END OF PRAKTEK 2, JALAN 2, KELURAHAN & KECAMATAN 2-->


          <!-- PRAKTEK 3, JALAN 3, KELURAHAN & KECAMATAN 3 -->
          @if($data->sip->nama_praktek3 && $data->sip->jalan3 && $data->sip->kelurahan3)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Nama Praktek 3</td>
            <td>{{ $data->sip->nama_praktek3 }}</td>
            <td>
              @if($data->sip->reason && $data->sip->reason->nama_praktek3 =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->nama_praktek3 == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->nama_praktek3 != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->nama_praktek3 != '1')
            <td> {{$data->sip->reason->nama_praktek3}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                <div class="input-group">
                  @csrf
                  @method('PUT')
                  <input type="text" class="form-control" name="revisi" required>
                  <input type="hidden" class="form-control" name="key" value="nama_praktek3">
                  <button type="submit" class="btn btn-outline-secondary">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Jalan 3</td>
            <td>{{ $data->sip->jalan3 }}</td>
            <td>
              @if($data->sip->reason && $data->sip->reason->jalan3 =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->jalan3 == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->jalan3 != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->jalan3 != '1')
            <td> {{$data->sip->reason->jalan3}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                <div class="input-group">
                  @csrf
                  @method('PUT')
                  <input type="text" class="form-control" name="revisi" required>
                  <input type="hidden" class="form-control" name="key" value="jalan3">
                  <button type="submit" class="btn btn-outline-secondary">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Kecamatan & Kelurahan Praktek 3</td>
            <td>Kec. {{ $data->sip->klh3->kecamatan }}, Kel. {{ $data->sip->klh3->kelurahan }} </td>
            <td>
              @if($data->sip->reason && $data->sip->reason->kelurahan3 =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->kelurahan3 == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->kelurahan3 != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->kelurahan3 != '1')
            <td> {{$data->sip->reason->jalan3}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                <div class="input-group">                  
                  @csrf
                  @method('PUT')
                  <!-- PILIH KACAMATAN -->
                  <select class="form-control" name="kecamatan3" id="kecamatan3" onchange="show_kelurahan3(this.value)" required>
                    <option value="Biringkanaya" @if($data->sip->klh3->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                    <option value="Bontoala" @if($data->sip->klh3->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                    <option value="Kepulauan Sangkarrang" @if($data->sip->klh3->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                    <option value="Makassar" @if($data->sip->klh3->kecamatan == 'Makassar') selected @endif>Makassar</option>
                    <option value="Mamajang" @if($data->sip->klh3->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                    <option value="Manggala" @if($data->sip->klh3->kecamatan == 'Manggala') selected @endif>Manggala</option>
                    <option value="Mariso" @if($data->sip->klh3->kecamatan == 'Mariso') selected @endif>Mariso</option>
                    <option value="Panakkukang" @if($data->sip->klh3->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                    <option value="Rappocini" @if($data->sip->klh3->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                    <option value="Tallo" @if($data->sip->klh3->kecamatan == 'Tallo') selected @endif>Tallo</option>
                    <option value="Tamalanrea" @if($data->sip->klh3->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                    <option value="Tamalate" @if($data->sip->klh3->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                    <option value="Ujung Pandang" @if($data->sip->klh3->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                    <option value="Ujung Tanah" @if($data->sip->klh3->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                    <option value="Wajo" @if($data->sip->klh3->kecamatan == 'Wajo') selected @endif>Wajo</option>
                  </select>
                  <select class="form-control" name="revisi" id="kelurahan3">
                    <option></option>
                  </select>
                  <input type="hidden" name="key" value="kelurahan3" required>
                  <button type="submit" class="btn btn-outline-secondary">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          @endif

           <!-- Jadwal Praktek 3 -->
          @if($data->sip->subizin_id == '7')
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jadwal Praktek 3</td>
              <td>{{ $data->sip->hari_buka3 }} s/d {{ $data->sip->hari_tutup3 }}, {{$data->sip->jam_buka3}} - {{$data->sip->jam_tutup3}}</td>
              <td>
                @if($data->sip->reason && $data->sip->reason->jadwal3 =='1') {!! $terima !!}
                @elseif($data->sip->reason && $data->sip->reason->jadwal3 == '') {!! $belumperiksa !!}
                @elseif($data->sip->reason && $data->sip->reason->jadwal3 != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sip->reason && $data->sip->reason->jadwal3 != '1')
              <td> {{$data->sip->reason->jadwal3}} </td>
              <td>

                <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}">
                 <input type="hidden" name="key" value="jadwal3">
                 <div class="row">
                  @csrf
                  @method('PUT')
                  <div class="col-lg-6 form-floating">
                    @php $hari_buka3 = null; @endphp
                    @if($data->sip->hari_buka3)
                    @php $hari_buka3 = $data->sip->hari_buka3; @endphp
                    @endif
                    <label for="floatingInputInvalid">Hari Buka</label>
                    <select class="form-control" name="hari_buka3" required="" id="hari_buka3">
                      <option value="">Pilih hari</option>
                      <option value="Senin" @if($hari_buka3 == 'Senin') selected @endif>Senin</option>
                      <option value="Selasa" @if($hari_buka3 == 'Selasa') selected @endif>Selasa</option>
                      <option value="Rabu" @if($hari_buka3 == 'Rabu') selected @endif>Rabu</option>
                      <option value="Kamis" @if($hari_buka3 == 'Kamis') selected @endif>Kamis</option>
                      <option value="Jumat" @if($hari_buka3 == 'Jumat') selected @endif>Jumat</option>
                      <option value="Sabtu" @if($hari_buka3 == 'Sabtu') selected @endif>Sabtu</option>
                      <option value="Minggu" @if($hari_buka3 == 'Minggu') selected @endif>Minggu</option>
                    </select>
                  </div>
                  <div class="col-lg-6 form-floating">
                    @php $hari_tutup3 = null; @endphp
                    @if($data->sip->hari_tutup3)
                    @php $hari_tutup3 = $data->sip->hari_tutup3; @endphp
                    @endif
                    <label for="floatingInputInvalid">Hari Tutup</label>
                    <select class="form-control" name="hari_tutup3" required="" id="hari_tutup3">
                      <option value="">Pilih hari</option>
                      <option value="Senin" @if($hari_tutup3 == 'Senin') selected @endif>Senin</option>
                      <option value="Selasa" @if($hari_tutup3 == 'Selasa') selected @endif>Selasa</option>
                      <option value="Rabu" @if($hari_tutup3 == 'Rabu') selected @endif>Rabu</option>
                      <option value="Kamis" @if($hari_tutup3 == 'Kamis') selected @endif>Kamis</option>
                      <option value="Jumat" @if($hari_tutup3 == 'Jumat') selected @endif>Jumat</option>
                      <option value="Sabtu" @if($hari_tutup3 == 'Sabtu') selected @endif>Sabtu</option>
                      <option value="Minggu" @if($hari_tutup3 == 'Minggu') selected @endif>Minggu</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 form-floating">
                    @php $jam_buka3 = null; $menitbuka3 = null; @endphp
                    @if($data->sip->jam_buka3)
                    @php 
                    $jam_buka3 = strtok($data->sip->jam_buka3, ':');  
                    $menitbuka3 = substr($data->sip->jam_buka3, strpos($data->sip->jam_buka3, ":") + 1);
                    @endphp
                    @endif
                    <label for="floatingInputInvalid">Jam Buka</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="jam_buka3">
                        @php $i = 0; @endphp
                        @for($i; $i < 24; $i++)
                        <option value="{{$i}}" @if($jam_buka3 == $i) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                      <select class="form-control" name="menitbuka3">
                        <option value="00" @if($menitbuka3 == '00') selected @endif>00</option>
                        <option value="15" @if($menitbuka3 == '15') selected @endif>15</option>
                        <option value="30" @if($menitbuka3 == '30') selected @endif>30</option>
                        <option value="45" @if($menitbuka3 == '45') selected @endif>45</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 form-floating">
                    @php $jam_tutup3 = null; $menittutup3 = null; @endphp
                    @if($data->sip->jam_tutup3)
                    @php 
                    $jam_tutup3 = strtok($data->sip->jam_tutup3, ':');  
                    $menittutup3 = substr($data->sip->jam_tutup3, strpos($data->sip->jam_tutup3, ":") + 1);
                    @endphp
                    @endif
                    <label for="floatingInputInvalid">Jam Tutup</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="jam_tutup3">
                        @php $i = 0; @endphp
                        @for($i; $i < 24; $i++)
                        <option value="{{$i}}" @if($jam_tutup3 == $i) selected @endif>{{$i}}</option>
                        @endfor
                      </select>
                      <select class="form-control" name="menittutup3">
                        <option value="00" @if($menittutup3 == '00') selected @endif>00</option>
                        <option value="15" @if($menittutup3 == '15') selected @endif>15</option>
                        <option value="30" @if($menittutup3 == '30') selected @endif>30</option>
                        <option value="45" @if($menittutup3 == '45') selected @endif>45</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-12 kt-align-right">
                    <button type="submit" class="btn btn-outline-secondary">
                       Update
                    </button>
                  </div>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          @else
          @endif
          <!-- end jadwal praktek 3 -->
          <!-- END OF PRAKTEK 3, JALAN 3, KELURAHAN & KECAMATAN 3-->


          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Foto KTP</td>
            <td><a href="{{ asset('storage/'.$data->sip->ktp) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sip->reason && $data->sip->reason->ktp =='1') {!! $terima !!}
              @elseif($data->sip->reason && $data->sip->reason->ktp == '') {!! $belumperiksa !!}
              @elseif($data->sip->reason && $data->sip->reason->ktp != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sip->reason && $data->sip->reason->ktp != '1')
            <td> {{$data->sip->reason->ktp}} </td>
            <td>
              <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="ktp" accept="image/jpeg,image/jpg,image/png" required>
                  <input type="hidden" class="form-control" name="key" value="ktp">
                  <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                  </button>
                </div>
              </form>
            </td>
            @else
            <td></td>
            <td></td>
            @endif
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Pas Foto</td>
            <td><a href="{{ asset('storage/'.$data->sip->foto) }}" target="_blank">Lihat Berkas</a></td>
            <td>
             @if($data->sip->reason && $data->sip->reason->foto =='1') {!! $terima !!}
             @elseif($data->sip->reason && $data->sip->reason->foto == '') {!! $belumperiksa !!}
             @elseif($data->sip->reason && $data->sip->reason->foto != '1') {!! $tolak !!}
             @else {!! $belumperiksa !!} @endif
           </td>
           @if($data->sip->reason && $data->sip->reason->foto != '1')
           <td> {{$data->sip->reason->foto}} </td>
           <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="foto" accept="image/jpeg,image/jpg,image/png" required>
                <input type="hidden" class="form-control" name="key" value="foto">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>
        <tr>
          <td>{{$no = $no+1}}</td>
          <td>File STR</td>
          <td><a href="{{ asset('storage/'.$data->sip->str) }}" target="_blank">Lihat Berkas</a></td>
          <td>
            @if($data->sip->reason && $data->sip->reason->str =='1') {!! $terima !!}
            @elseif($data->sip->reason && $data->sip->reason->str == '') {!! $belumperiksa !!}
            @elseif($data->sip->reason && $data->sip->reason->str != '1') {!! $tolak !!}
            @else {!! $belumperiksa !!} @endif
          </td>
          @if($data->sip->reason && $data->sip->reason->str != '1')
          <td> {{$data->sip->reason->str}} </td>
          <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="str" accept="application/pdf" required>
                <input type="hidden" class="form-control" name="key" value="str">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>
        <tr>
          <td>{{$no = $no+1}}</td>
          <td>Rekomendasi Organisasi Profesi</td>
          <td><a href="{{ asset('storage/'.$data->sip->rekomendasi_org) }}" target="_blank">Lihat Berkas</a></td>
          <td>
            @if($data->sip->reason && $data->sip->reason->rekomendasi_org =='1') {!! $terima !!}
            @elseif($data->sip->reason && $data->sip->reason->rekomendasi_org == '') {!! $belumperiksa !!}
            @elseif($data->sip->reason && $data->sip->reason->rekomendasi_org != '1') {!! $tolak !!}
            @else {!! $belumperiksa !!} @endif
          </td>
          @if($data->sip->reason && $data->sip->reason->rekomendasi_org != '1')
          <td> {{$data->sip->reason->rekomendasi_org}} </td>
          <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="rekomendasi_org" accept="application/pdf" required>
                <input type="hidden" class="form-control" name="key" value="rekomendasi_org">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>
        <tr>
          <td>{{$no = $no+1}}</td>
          <td>Surat Keterangan Pelayanan Kesehatan - Tempat Kerja</td>
          <td><a href="{{ asset('storage/'.$data->sip->surat_keterangan) }}" target="_blank">Lihat Berkas</a></td>
          <td>
            @if($data->sip->reason && $data->sip->reason->surat_keterangan =='1') {!! $terima !!}
            @elseif($data->sip->reason && $data->sip->reason->surat_keterangan == '') {!! $belumperiksa !!}
            @elseif($data->sip->reason && $data->sip->reason->surat_keterangan != '1') {!! $tolak !!}
            @else {!! $belumperiksa !!} @endif
          </td>
          @if($data->sip->reason && $data->sip->reason->surat_keterangan != '1')
          <td> {{$data->sip->reason->surat_keterangan}} </td>
          <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="surat_keterangan" accept="application/pdf" required>
                <input type="hidden" class="form-control" name="key" value="surat_keterangan">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>

        <!-- OPSIONAL -->
        <tr>
          <td>{{$no = $no+1}}</td>
          <td>SK Jejaring</td>
          <td><a href="{{ asset('storage/'.$data->sip->berkas_jejaring1) }}" target="_blank">Lihat Berkas</a></td>
          <td>
            @if($data->sip->reason && $data->sip->reason->berkas_jejaring1 =='1') {!! $terima !!}
            @elseif($data->sip->reason && $data->sip->reason->berkas_jejaring1 == '') {!! $belumperiksa !!}
            @elseif($data->sip->reason && $data->sip->reason->berkas_jejaring1 != '1') {!! $tolak !!}
            @else {!! $belumperiksa !!} @endif
          </td>
          @if($data->sip->reason && $data->sip->reason->berkas_jejaring1 != '1')
          <td> {{$data->sip->reason->berkas_jejaring1}} </td>
          <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="berkas_jejaring1" accept="application/pdf" required>
                <input type="hidden" class="form-control" name="key" value="berkas_jejaring1">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>

        <tr>
          <td>{{$no = $no+1}}</td>
          <td>Surat Persetujuan Pimpinan Instansi</td>
          <td><a href="{{ asset('storage/'.$data->sip->surat_persetujuan) }}" target="_blank">Lihat Berkas</a></td>
          <td>
            @if($data->sip->reason && $data->sip->reason->surat_persetujuan =='1') {!! $terima !!}
            @elseif($data->sip->reason && $data->sip->reason->surat_persetujuan == '') {!! $belumperiksa !!}
            @elseif($data->sip->reason && $data->sip->reason->surat_persetujuan != '1') {!! $tolak !!}
            @else {!! $belumperiksa !!} @endif
          </td>
          @if($data->sip->reason && $data->sip->reason->surat_persetujuan != '1')
          <td> {{$data->sip->reason->surat_persetujuan}} </td>
          <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="surat_persetujuan" accept="application/pdf" required>
                <input type="hidden" class="form-control" name="key" value="surat_persetujuan">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>

        <tr>
          <td>{{$no = $no+1}}</td>
          <td>Berkas Pendukung</td>
          <td><a href="{{ asset('storage/'.$data->sip->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
          <td>
            @if($data->sip->reason && $data->sip->reason->berkas_pendukung =='1') {!! $terima !!}
            @elseif($data->sip->reason && $data->sip->reason->berkas_pendukung == '') {!! $belumperiksa !!}
            @elseif($data->sip->reason && $data->sip->reason->berkas_pendukung != '1') {!! $tolak !!}
            @else {!! $belumperiksa !!} @endif
          </td>
          @if($data->sip->reason && $data->sip->reason->berkas_pendukung != '1')
          <td> {{$data->sip->reason->berkas_pendukung}} </td>
          <td>
            <form method="POST" action="{{route('sip.update', ['id' => $data->sip->perizinan_id])}}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="input-group">
                <input type="file" class="form-control" name="berkas_pendukung" accept="application/pdf" required>
                <input type="hidden" class="form-control" name="key" value="berkas_pendukung">
                <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update
                </button>
              </div>
            </form>
          </td>
          @else
          <td></td>
          <td></td>
          @endif
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
@endsection

@section('page_script')

<script type="text/javascript">
  function updateberkas() { // verifikasi berkas berhasil
    $(document).on('click', '#update', function(){
      Swal.fire({
        title: 'Berkas Telah Sesuai ?',
        text: "Berkas yang diverifikasi akan dikirim ke tahap selanjutnya dan tidak dapat lagi diubah oleh Anda!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Verifikasi!',
        timer: 6500
      }).then((result) => {
        if (result.value) {
          var endpoint= "{{route('perizinan.ditolak.update', ['no_tiket' => $data->no_tiket])}}";
          token = $('meta[name="csrf-token"]').attr('content');
          $.ajax({
            url: endpoint,
            method: "POST",
            data : {
              '_method' : 'POST',
              '_token'  : token
            },
            beforeSend: function(){
              $('#loader').attr("style", "");
            },
            success:function(data){
              if(data.status == 'success') {
                successToRelaoad(data.status, data.pesan);
              } else {
                berhasil(data.status, data.pesan);
              }
            },
            complete:function(data) {
              $('#loader').attr("style", "display:none");
            },
            error: function(xhr, status, error){
              var error = xhr.responseJSON; 
              if ($.isEmptyObject(error) == false) {
                $.each(error.errors, function(key, value) {
                  gagal(key, value);
                });
              }
            } 
          }); 
        }
      });
    });
  }

  curr_kel1 = {!! $data->sip->klh1->id !!};
  var kec1 = $('#kecamatan1').val();
  show_kelurahan1(kec1);       
        // });

// menampilkan kelurahan1 setelah memilih kecamatan1
function show_kelurahan1(kec) {
  $("#kelurahan1").empty();
  $("#kelurahan1").append("<option value=''>--Pilih kelurahan1--</option>");
  $.ajax({
    'url': "../../cek-kelurahan/" + kec,
    'dataType': 'json',
    success: function(data) {
      jQuery.each(data, function(i, val) {
        if(val.id == curr_kel1) {
          check = 'selected';
        } else {
          check = '';
        }
        $('#kelurahan1').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
      });
    },
    error: function(xhr, status, error) {
      var error = xhr.responseJSON;
      if ($.isEmptyObject(error) == false) {
        $.each(error.errors, function(key, value) {
          alert(key + value);
        });
      }
    }
  })
}
//end menampilkan kelurahan1 setelah memilih kecamatan1

// menampilkan kelurahan2 setelah memilih kecamatan2
function show_kelurahan2(kec) {
  $("#kelurahan2").empty();
  $("#kelurahan2").append("<option value=''>--Pilih kelurahan2--</option>");
  $.ajax({
    'url': "../../cek-kelurahan/" + kec,
    'dataType': 'json',
    success: function(data) {
      jQuery.each(data, function(i, val) {
        if(val.id == curr_kel2) {
          check = 'selected';
        } else {
          check = '';
        }
        $('#kelurahan2').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
      });
    },
    error: function(xhr, status, error) {
      var error = xhr.responseJSON;
      if ($.isEmptyObject(error) == false) {
        $.each(error.errors, function(key, value) {
          alert(key + value);
        });
      }
    }
  })
}
//end menampilkan kelurahan2 setelah memilih kecamatan2

// menampilkan kelurahan3 setelah memilih kecamatan3
function show_kelurahan3(kec) {
  $("#kelurahan3").empty();
  $("#kelurahan3").append("<option value=''>--Pilih kelurahan3--</option>");
  $.ajax({
    'url': "../../cek-kelurahan/" + kec,
    'dataType': 'json',
    success: function(data) {
      jQuery.each(data, function(i, val) {
        if(val.id == curr_kel3) {
          check = 'selected';
        } else {
          check = '';
        }
        $('#kelurahan3').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
      });
    },
    error: function(xhr, status, error) {
      var error = xhr.responseJSON;
      if ($.isEmptyObject(error) == false) {
        $.each(error.errors, function(key, value) {
          alert(key + value);
        });
      }
    }
  })
}
//end menampilkan kelurahan3 setelah memilih kecamatan3



function ceklisSuccess(status, pesan) {
  Swal.fire({
    type: status,
    title: pesan,
    showConfirmButton: true,
    button: "Ok"
  }).then((result) => {
    location.reload();
  })
}

function successToRelaoad(status, pesan) {
  Swal.fire({
    type: status,
    title: pesan,
    showConfirmButton: true,
    button: "Ok"
  }).then((result) => {
    window.location.href = "{{URL::to('perizinan')}}"
  })
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


@if($data->sip->klh2)
<script type="text/javascript">
  curr_kel2 = {!! $data->sip->klh2->id !!};
  var kec2 = $('#kecamatan2').val();
  show_kelurahan2(kec2);
</script>
@endif

@if($data->sip->klh3)
<script>
  curr_kel3 = {!! $data->sip->klh3->id !!};
  var kec3 = $('#kecamatan3').val();
  show_kelurahan3(kec3);
</script>
@endif

@endsection
