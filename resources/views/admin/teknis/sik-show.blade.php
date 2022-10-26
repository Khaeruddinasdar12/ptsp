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
          Detail Perizinan Surat Izin Kerja (SIK)
        </h3>
      </div>

    </div>
    <div class="kt-portlet__body">
      <div class="row">
        <div class="col-md-12">
          <p>No. Tiket : <b>{{$data->no_tiket}}</b></p>
        </div>

        <div class="col-md-12">
          <p>Jenis Perizinan : <b>{{ $data->sik->subizin->nama }}</b></p>
        </div>
        <div class="col-md-12">
          <p>No HP : <b>{{ $data->sik->nohp }}</b></p>
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
              <td>{{ $data->sik->gelar_awal }} {{ $data->sik->nama }}, {{ $data->sik->gelar_akhir }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->nama =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->nama == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->nama != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->nama != '1') {{$data->sik->reason->nama}} @endif</td>
              <td>
                <button class="btn btn-outline-danger btn-sm" onclick="reason('nama', 'Nama')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nama', 'Nama')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tempat Lahir</td>
              <td>{{ $data->sik->tempat_lahir }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->tempat_lahir =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->tempat_lahir == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->tempat_lahir != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->tempat_lahir != '1') {{$data->sik->reason->tempat_lahir}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('tempat_lahir', 'Tempat Lahir')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('tempat_lahir', 'Tempat Lahir')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Lahir</td>
              <td>{{ $data->sik->tanggal_lahir }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->tanggal_lahir =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->tanggal_lahir == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->tanggal_lahir != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->tanggal_lahir != '1') {{$data->sik->reason->tanggal_lahir}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('tanggal_lahir', 'Tanggal Lahir')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('tanggal_lahir', 'Tanggal Lahir')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Alamat Rumah</td>
              <td>{{ $data->sik->alamat }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->alamat =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->alamat == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->alamat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->alamat != '1') {{$data->sik->reason->alamat}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('alamat', 'Alamat')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('alamat', 'Alamat')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>No. Rekomendasi OP</td>
              <td>{{ $data->sik->rekomendasi_op }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->rekomendasi_op =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->rekomendasi_op == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->rekomendasi_op != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->rekomendasi_op != '1') {{$data->sik->reason->rekomendasi_op}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('rekomendasi_op', 'No. Rekomendasi OP')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('rekomendasi_op', 'No Rekomendasi OP')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nomor STR</td>
              <td>{{ $data->sik->no_str }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->no_str =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->no_str == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->no_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->no_str != '1') {{$data->sik->reason->no_str}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('no_str', 'Nomor STR')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('no_str', 'Nomor STR')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Mulai Berlaku STR</td>
              <td>{{ $data->sik->awal_str }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->awal_str =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->awal_str == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->awal_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->awal_str != '1') {{$data->sik->reason->awal_str}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('awal_str', 'Tanggal Mulai Berlaku STR')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('awal_str', 'Tanggal Mulai Berlaku STR')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Berakhir STR</td>
              <td>{{ $data->sik->akhir_str }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->akhir_str =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->akhir_str == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->akhir_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->akhir_str != '1') {{$data->sik->reason->akhir_str}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('akhir_str', 'Tanggal Berakhir STR')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('akhir_str', 'Tanggal Berakhir STR')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Praktek </td>
              <td>{{ $data->sik->nama_praktek }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->nama_praktek =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->nama_praktek == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->nama_praktek != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->nama_praktek != '1') {{$data->sik->reason->nama_praktek}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('nama_praktek', 'Nama Praktek')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nama_praktek', 'Nama Praktek')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan</td>
              <td>{{ $data->sik->jalan }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->jalan =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->jalan == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->jalan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->jalan != '1') {{$data->sik->reason->jalan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('jalan', 'Jalan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('jalan', 'Jalan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek</td>
              <td>Kec. {{ $data->sik->klh->kelurahan }}, Kel. {{ $data->sik->klh->kelurahan }} </td>
              <td>
                @if($data->sik->reason && $data->sik->reason->kelurahan =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->kelurahan == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->kelurahan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->kelurahan != '1') {{$data->sik->reason->kelurahan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('kelurahan', 'Kecamatan & Kelurahan Praktek')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('kelurahan', 'Kecamatan & Kelurahan Praktek')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>

            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Foto KTP</td>
              <td><a href="{{ asset('storage/'.$data->sik->ktp) }}" target="_blank">Lihat Berkas</a></td>
              <td>
                @if($data->sik->reason && $data->sik->reason->ktp =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->ktp == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->ktp != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->sik->reason && $data->sik->reason->ktp != '1') {{$data->sik->reason->ktp}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('ktp', 'KTP')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('ktp', 'KTP')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Pas Foto</td>
              <td><a href="{{ asset('storage/'.$data->sik->foto) }}" target="_blank">Lihat Berkas</a></td>
              <td>
               @if($data->sik->reason && $data->sik->reason->foto =='1') {!! $terima !!}
               @elseif($data->sik->reason && $data->sik->reason->foto == '') {!! $belumperiksa !!}
               @elseif($data->sik->reason && $data->sik->reason->foto != '1') {!! $tolak !!}
               @else {!! $belumperiksa !!} @endif
             </td>
             <td>@if($data->sik->reason && $data->sik->reason->foto != '1') {{$data->sik->reason->foto}} @endif</td>
             <td><button class="btn btn-outline-danger btn-sm" onclick="reason('foto', 'Pas Foto')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('foto', 'Pas Foto')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>File STR</td>
            <td><a href="{{ asset('storage/'.$data->sik->str) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->str =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->str == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->str != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->sik->reason && $data->sik->reason->str != '1') {{$data->sik->reason->str}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('str', 'File STR')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('str', 'File STR')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Ijazah</td>
            <td><a href="{{ asset('storage/'.$data->sik->ijazah) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->ijazah =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->ijazah == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->ijazah != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->sik->reason && $data->sik->reason->ijazah != '1') {{$data->sik->reason->ijazah}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('ijazah', 'Ijazah')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('ijazah', 'Ijazah')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Rekomendasi Organisasi Profesi</td>
            <td><a href="{{ asset('storage/'.$data->sik->rekomendasi_org) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->rekomendasi_org =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->rekomendasi_org == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->rekomendasi_org != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->sik->reason && $data->sik->reason->rekomendasi_org != '1') {{$data->sik->reason->rekomendasi_org}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('rekomendasi_org', 'Rekomendasi Organisasi Profesi')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('rekomendasi_org', 'Rekomendasi Organisasi Profesi')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Surat Keterangan Pimpinan Fasilitas Pelayanan Kesehatan</td>
            <td><a href="{{ asset('storage/'.$data->sik->surat_keterangan) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->surat_keterangan =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keterangan == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keterangan != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->sik->reason && $data->sik->reason->surat_keterangan != '1') {{$data->sik->reason->surat_keterangan}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('surat_keterangan', 'Surat Keterangan Pelayanan Kesehatan')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('surat_keterangan', 'Surat Keterangan Pimpinan Fasilitas Pelayanan Kesehatan')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <!-- OPSIONAL -->

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Surat Keterangan Keluasan</td>
            @if($data->sik->surat_keluasan)
            <td><a href="{{ asset('storage/'.$data->sik->surat_keluasan) }}" target="_blank">Lihat Berkas</a></td>
            @else 
            <td class="text-danger">Tidak Ada Berkas</td>
            @endif
            <td>
              @if($data->sik->reason && $data->sik->reason->surat_keluasan =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keluasan == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keluasan != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->sik->reason && $data->sik->reason->surat_keluasan != '1') {{$data->sik->reason->surat_keluasan}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('surat_keluasan', 'Surat Keterangan Keluasan')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('surat_keluasan', 'Surat Keterangan Keluasan')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>


          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Berkas Pendukung</td>
            @if($data->sik->berkas_pendukung)
            <td><a href="{{ asset('storage/'.$data->sik->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
            @else 
            <td class="text-danger">Tidak Ada Berkas</td>
            @endif
            <td>
              @if($data->sik->reason && $data->sik->reason->berkas_pendukung =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->berkas_pendukung == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->berkas_pendukung != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->sik->reason && $data->sik->reason->berkas_pendukung != '1') {{$data->sik->reason->berkas_pendukung}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('berkas_pendukung', 'Berkas Pendukung')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('berkas_pendukung', 'Berkas Pendukung')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

        </tbody>
      </table>
    </div>
    <br>
    <div class="row align-items-center">
      <div class="col-12 kt-align-right">
        <button type="button" class="btn btn-danger btn-sm" onclick="tolak()" id="tolak">
          <i class="fa fa-times"></i> Tolak Berkas</button>
          <button type="button" class="btn btn-success btn-sm" id="verif" onclick="verifikasi()" title="Terima Berkas">
            <i class="fa fa-check"></i> Verifikasi Berkas</button>
          </div>
        </div>
      </div>
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
            const route= "{{ route('reason.teknis', ['id' => $data->sik->id, 'jenis' => 'sik']) }}";
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
                $('#modal-reason').modal("hide");
                $('#loader').attr("style", "");
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
            url = "{{ route('perizinan.teknis.tolak', ['no_tiket' => $data->no_tiket]) }}",
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
            url = "{{ route('perizinan.teknis.verif', ['no_tiket' => $data->no_tiket]) }}",
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
            url = "{{ route('ceklis.teknis', ['id' => $data->sik->id, 'jenis' => 'sik']) }}",
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
                'izin' : 'sik'
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
        window.location.href = "{{URL::to('admin/perizinan-teknis')}}"
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