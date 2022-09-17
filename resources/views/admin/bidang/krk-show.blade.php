@extends('layouts.admin.app')

@section('title', 'Perizinan')

@section('subheader')

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

  <!-- LOADER -->
  <div style="display: none;" id="loader" class="loader">
  </div>
  <!-- END LOADER -->
  
  <div class="row justify-content-center">
    <div class="col-md-12">
      @include('layouts.admin.alert')
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
          Detail Perizinan Keterangan Rencana Kota (KRK)
        </h3>
      </div>


    </div>
    <div class="kt-portlet__body">
      <div class="row">
        <div class="col-md-12">
          <p>No. Tiket : <b>{{$data->no_tiket}}</b></p>
        </div>

        <div class="col-md-12">
          <p>Jenis Perizinan : <b></b></p>
        </div>
        <div class="col-md-12">
          <p>No HP : <b>{{ $data->krk->nohp }}</b></p>
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
              <td valign="center">Nama Pemohon</td>
              <td>{{ $data->krk->nama }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->nama =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->nama == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->nama != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->nama != '1') {{$data->krk->reason->nama}} @endif</td>
              <td>
                <button class="btn btn-outline-danger btn-sm" onclick="reason('nama', 'Nama')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nama', 'Nama')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nomor KTP (NIK)</td>
              <td>{{ $data->krk->nik }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->nik =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->nik == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->nik != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->nik != '1') {{$data->krk->reason->nik}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('nik', 'Nomor KTP (NIK)')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nik', 'Nomor KTP (NIK)')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no}}</td>
              <td valign="center">Alamat Pemohon</td>
              <td>{{ $data->krk->alamat }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->alamat =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->alamat == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->alamat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->alamat != '1') {{$data->krk->reason->nama}} @endif</td>
              <td>
                <button class="btn btn-outline-danger btn-sm" onclick="reason('alamat', 'Alamat')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('alamat', 'Alamat')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Luas Tanah</td>
              <td>{{ $data->krk->luas }} m<sup>2</sup></td>
              <td>
                @if($data->krk->reason && $data->krk->reason->luas =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->luas == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->luas != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->luas != '1') {{$data->krk->reason->luas}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('luas', 'Luasan Tanah')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('luas', 'Luasan Tanah')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Pada Surat Tanah</td>
              <td>{{ $data->krk->nama_surat }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->nama_surat =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->nama_surat == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->nama_surat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->nama_surat != '1') {{$data->krk->reason->nama_surat}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('nama_surat', 'Nama Pada Surat Tanah')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nama_surat', 'Nama Pada Surat Tanah')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nomor/Tanggal Pada Surat Tanah</td>
              <td>{{ $data->krk->nomor_surat }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->nomor_surat =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->nomor_surat == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->nomor_surat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->nomor_surat != '1') {{$data->krk->reason->nomor_surat}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('nomor_surat', 'Nomor/Tanggal Pada Surat Tanah')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nomor_surat', 'Nomor/Tanggal Pada Surat Tanah')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Penggunaan/Fungsi Bangunan</td>
              <td>{{ $data->krk->penggunaan }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->penggunaan =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->penggunaan == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->penggunaan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->penggunaan != '1') {{$data->krk->reason->penggunaan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('penggunaan', 'Penggunaan/Fungsi Bangunan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('penggunaan', 'Penggunaan/Fungsi Bangunan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jenis Bangunan</td>
              <td>{{ $data->krk->jenis }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->jenis =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->jenis == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->jenis != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->jenis != '1') {{$data->krk->reason->jenis}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('jenis', 'Jenis Bangunan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('jenis', 'Jenis Bangunan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jumlah Lantai</td>
              <td>{{ $data->krk->jml_lantai }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->jml_lantai =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->jml_lantai == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->jml_lantai != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->jml_lantai != '1') {{$data->krk->reason->jml_lantai}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('jml_lantai', 'Jumlah Lantai')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('jml_lantai', 'Jumlah Lantai')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jumlah Bangunan </td>
              <td>{{ $data->krk->jml_bangunan }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->jml_bangunan =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->jml_bangunan == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->jml_bangunan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->jml_bangunan != '1') {{$data->krk->reason->jml_bangunan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('jml_bangunan', 'Jumlah Bangunan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('jml_bangunan', 'Jumlah Bangunan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan</td>
              <td>{{ $data->krk->jalan }}</td>
              <td>
                @if($data->krk->reason && $data->krk->reason->jalan =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->jalan == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->jalan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->jalan != '1') {{$data->krk->reason->jalan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('jalan', 'Jalan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('jalan', 'Jalan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek</td>
              <td>Kec. {{ $data->krk->klh->kelurahan }}, Kel. {{ $data->krk->klh->kelurahan }} </td>
              <td>
                @if($data->krk->reason && $data->krk->reason->kelurahan =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->kelurahan == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->kelurahan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->kelurahan != '1') {{$data->krk->reason->kelurahan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('kelurahan', 'Kecamatan & Kelurahan Praktek')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('kelurahan', 'Kecamatan & Kelurahan Praktek')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>

            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Foto KTP</td>
              <td><a href="{{ asset('storage/'.$data->krk->ktp) }}" target="_blank">Lihat Berkas</a></td>
              <td>
                @if($data->krk->reason && $data->krk->reason->ktp =='1') {!! $terima !!}
                @elseif($data->krk->reason && $data->krk->reason->ktp == '') {!! $belumperiksa !!}
                @elseif($data->krk->reason && $data->krk->reason->ktp != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->krk->reason && $data->krk->reason->ktp != '1') {{$data->krk->reason->ktp}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('ktp', 'KTP')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('ktp', 'KTP')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>PBB Terakhir</td>
              <td><a href="{{ asset('storage/'.$data->krk->pbb) }}" target="_blank">Lihat Berkas</a></td>
              <td>
               @if($data->krk->reason && $data->krk->reason->pbb =='1') {!! $terima !!}
               @elseif($data->krk->reason && $data->krk->reason->pbb == '') {!! $belumperiksa !!}
               @elseif($data->krk->reason && $data->krk->reason->pbb != '1') {!! $tolak !!}
               @else {!! $belumperiksa !!} @endif
             </td>
             <td>@if($data->krk->reason && $data->krk->reason->pbb != '1') {{$data->krk->reason->pbb}} @endif</td>
             <td><button class="btn btn-outline-danger btn-sm" onclick="reason('pbb', 'PBB Terakhir')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('pbb', 'PBB Terakhir')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Surat Tanah</td>
            <td><a href="{{ asset('storage/'.$data->krk->surat_tanah) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->krk->reason && $data->krk->reason->surat_tanah =='1') {!! $terima !!}
              @elseif($data->krk->reason && $data->krk->reason->surat_tanah == '') {!! $belumperiksa !!}
              @elseif($data->krk->reason && $data->krk->reason->surat_tanah != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->krk->reason && $data->krk->reason->surat_tanah != '1') {{$data->krk->reason->surat_tanah}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('surat_tanah', 'Surat Tanah')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('surat_tanah', 'Surat Tanah')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Peta Lokasi (Koordinat XY)</td>
            <td><a href="{{ asset('storage/'.$data->krk->peta) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->krk->reason && $data->krk->reason->peta =='1') {!! $terima !!}
              @elseif($data->krk->reason && $data->krk->reason->peta == '') {!! $belumperiksa !!}
              @elseif($data->krk->reason && $data->krk->reason->peta != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->krk->reason && $data->krk->reason->peta != '1') {{$data->krk->reason->peta}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('peta', 'Peta Lokasi (Koordinat XY)')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('peta', 'Peta Lokasi (Koordinat XY)')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Gambar Bangunan Rencana</td>
            <td><a href="{{ asset('storage/'.$data->krk->gambar) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->krk->reason && $data->krk->reason->gambar =='1') {!! $terima !!}
              @elseif($data->krk->reason && $data->krk->reason->gambar == '') {!! $belumperiksa !!}
              @elseif($data->krk->reason && $data->krk->reason->gambar != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->krk->reason && $data->krk->reason->gambar != '1') {{$data->krk->reason->gambar}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('gambar', 'Gambar Bangunan Rencana')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('gambar', 'Gambar Bangunan Rencana')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <!-- OPSIONAL -->
          @if($data->krk->berkas_pendukung)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Berkas Pendukung</td>
            <td><a href="{{ asset('storage/'.$data->krk->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->krk->reason && $data->krk->reason->berkas_pendukung =='1') {!! $terima !!}
              @elseif($data->krk->reason && $data->krk->reason->berkas_pendukung == '') {!! $belumperiksa !!}
              @elseif($data->krk->reason && $data->krk->reason->berkas_pendukung != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->krk->reason && $data->krk->reason->berkas_pendukung != '1') {{$data->krk->reason->berkas_pendukung}} @endif</td>
            <td><button class="btn btn-outline-danger primary btn-sm" onclick="reason('berkas_pendukung', 'Berkas Pendukung')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('berkas_pendukung', 'Berkas Pendukung')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          @endif
        </tbody>
      </table>
    </div>
    <br>
    <div class="row align-items-center">
      <div class="col-12 kt-align-right">
        <button type="button" class="btn btn-danger btn-sm" onclick="tolak()" id="tolak">
          <i class="fa fa-times"></i> Tolak Berkas
        </button>
        <button type="button" class="btn btn-success btn-sm" id="verif" onclick="verifikasi()" title="Terima Berkas">
          <i class="fa fa-check"></i> Verifikasi Berkas
        </button>
      </div>
    </div>
  </div>
  <!-- <div class="kt-portlet__footer"> -->

  <!-- </div> -->
</div>


<!-- Modal Post Reason -->
<div class="modal fade bd-example-modal" id="modal-reason" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="judul-modal"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="" id="post-reason">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Pesan:</label>
            <textarea class="form-control" rows="8" name="pesan" required></textarea>
          </div>
          <input type="hidden" name="key" id="field">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- End Modal -->
@endsection

@section('page_script')

<script type="text/javascript">
// $('#loader').modal("show");
function reason(key, head) {
  $('#field').attr('value', key);
  $('#judul-modal').html("Tolak "+head);
  $("#modal-reason").modal("show");
}

          $('#post-reason').submit(function(e){ // tolak kolom
            const route= "{{ route('reason.bidang', ['id' => $data->krk->id, 'jenis' => 'krk']) }}";
            e.preventDefault();
            var request = new FormData(this);
            var endpoint= route;
            $.ajax({
              url: endpoint,
              method: "POST",
              data: request,
              contentType: false,
              cache: false,
              processData: false,
              beforeSend: function(){
                $('#loader').attr("style", "");
                $('#modal-reason').modal("hide");
              },
              success:function(data){
                $('#post-reason')[0].reset();
                if(data.status == 'success') {
                  ceklisSuccess(data.status, data.pesan)
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
          });

    function tolak() { // kirim tolak 
      $(document).on('click', '#tolak', function(){
        Swal.fire({
          title: 'Kirim Notifikasi Penolakan Ke User ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya!',
          timer: 6500
        }).then((result) => {
          if (result.value) {
            var me = $(this),
            url = "{{ route('perizinan.bidang.tolak', ['no_tiket' => $data->no_tiket]) }}",
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              url: url,
              method: "POST",
              beforeSend: function(){
                $('#loader').attr("style", "");
              },
              data : {
                '_method' : 'PUT',
                '_token'  : token
              },
              success:function(data){
                if(data.status == 'success') {
                  successToRelaoad(data.status, data.pesan)
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

    function verifikasi() { // verifikasi berkas berhasil
      $(document).on('click', '#verif', function(){
        Swal.fire({
          title: 'Berkas Telah Sesuai ?',
          text: "Pastikan semua telah diperiksa. Berkas yang diverifikasi akan dikirim ke tahap selanjutnya dan tidak dapat diubah lagi oleh Anda!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Verifikasi!',
          timer: 6500
        }).then((result) => {
          if (result.value) {
            var me = $(this),
            url = "{{ route('perizinan.bidang.verif', ['no_tiket' => $data->no_tiket]) }}",
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              url: url,
              method: "POST",
              beforeSend: function(){
                $('#loader').attr("style", "");
              },
              data : {
                '_method' : 'PUT',
                '_token'  : token
              },
              success:function(data){
                if(data.status == 'success') {
                  successToRelaoad(data.status, data.pesan)
                } else {
                  berhasil(data.status, data.pesan);
                }
              },
              complete:function(data) {
                $('#loader').attr("style", "display:none");
              },
              error: function(xhr, status, error){
                $("#loader").modal("hide");
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

    function ceklis(key, head) { // ceklis status kolom
      $(document).on('click', '#ceklis', function(){
        Swal.fire({
          title: head + ' Sesuai ?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya',
          timer: 6500
        }).then((result) => {
          if (result.value) {
            var me = $(this),
            url = "{{ route('ceklis.bidang', ['id' => $data->krk->id, 'jenis' => 'krk']) }}",
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              url: url,
              method: "POST",
              beforeSend: function(){
                $('#loader').attr("style", "");
              },
              data : {
                '_method' : 'PUT',
                '_token'  : token,
                'key' : key,
                'head' : head,
                'izin' : 'krk'
              },
              success:function(data){
                if(data.status == 'success') {
                  ceklisSuccess(data.status, data.pesan)
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
        window.location.href = "{{URL::to('admin/perizinan-bidang')}}"
      })
    }

    function berhasil(status, pesan) {
      Swal.fire({
        type: status,
        title: pesan,
        showConfirmButton: true,
        button: "Ok",
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
