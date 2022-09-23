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
          Detail Perizinan Pendidikan
        </h3>
      </div>


    </div>
    <div class="kt-portlet__body">
      <div class="row">
        <div class="col-md-12">
          <p>No. Tiket : <b>{{$data->no_tiket}}</b></p>
        </div>

        <div class="col-md-12">
          <p>Jenis Perizinan : <b>{{ $data->pendidikan->subizin->nama }}</b></p>
        </div>
        @if($data->pendidikan->subizin->kategori)
        <div class="col-md-12">
          <p>Kategori : <b>{{ $data->pendidikan->subizin->kategori }}</b></p>
        </div>
        @endif
        <div class="col-md-12">
          <p>No HP : <b>{{ $data->pendidikan->nohp }}</b></p>
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
              <td valign="center">Nama Penanggung Jawab</td>
              <td>{{ $data->pendidikan->nama }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->nama =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->pendidikan->reason && $data->pendidikan->reason->nama != '1') {{$data->pendidikan->reason->nama}} @endif</td>
              <td>
                <button class="btn btn-outline-danger btn-sm" onclick="reason('nama', 'Nama')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nama', 'Nama')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Alamat</td>
              <td>{{ $data->pendidikan->alamat }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->alamat =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->alamat == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->alamat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->pendidikan->reason && $data->pendidikan->reason->alamat != '1') {{$data->pendidikan->reason->alamat}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('alamat', 'Alamat')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('alamat', 'Alamat')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Pendidikan</td>
              <td>{{ $data->pendidikan->nama_pendidikan }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan != '1') {{$data->pendidikan->reason->nama_pendidikan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('nama_pendidikan', 'Nama Pendidikan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('nama_pendidikan', 'Nama Pendidikan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek</td>
              <td>Kec. {{ $data->pendidikan->klh->kelurahan }}, Kel. {{ $data->pendidikan->klh->kelurahan }} </td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->kelurahan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->kelurahan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->kelurahan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->pendidikan->reason && $data->pendidikan->reason->kelurahan != '1') {{$data->pendidikan->reason->kelurahan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('kelurahan', 'Kecamatan & Kelurahan Praktek')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('kelurahan', 'Kecamatan & Kelurahan Praktek')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan</td>
              <td>{{ $data->pendidikan->jalan }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->jalan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->jalan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->jalan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->pendidikan->reason && $data->pendidikan->reason->jalan != '1') {{$data->pendidikan->reason->jalan}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('jalan', 'Jalan')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('jalan', 'Jalan')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <!-- BERKAS -->
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Foto KTP</td>
              <td><a href="{{ asset('storage/'.$data->pendidikan->ktp) }}" target="_blank">Lihat Berkas</a></td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->ktp =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->ktp == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->ktp != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              <td>@if($data->pendidikan->reason && $data->pendidikan->reason->ktp != '1') {{$data->pendidikan->reason->ktp}} @endif</td>
              <td><button class="btn btn-outline-danger btn-sm" onclick="reason('ktp', 'KTP')"><i class="fa fa-times"></i></button>&nbsp;
                <button class="btn btn-outline-success btn-sm" onclick="ceklis('ktp', 'KTP')" id="ceklis"><i class="fa fa-check"></i></button>
              </td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Pas Foto</td>
              <td><a href="{{ asset('storage/'.$data->pendidikan->pas_foto) }}" target="_blank">Lihat Berkas</a></td>
              <td>
               @if($data->pendidikan->reason && $data->pendidikan->reason->pas_foto =='1') {!! $terima !!}
               @elseif($data->pendidikan->reason && $data->pendidikan->reason->pas_foto == '') {!! $belumperiksa !!}
               @elseif($data->pendidikan->reason && $data->pendidikan->reason->pas_foto != '1') {!! $tolak !!}
               @else {!! $belumperiksa !!} @endif
             </td>
             <td>@if($data->pendidikan->reason && $data->pendidikan->reason->pas_foto != '1') {{$data->pendidikan->reason->pas_foto}} @endif</td>
             <td><button class="btn btn-outline-danger btn-sm" onclick="reason('pas_foto', 'Pas Foto')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('pas_foto', 'Pas Foto')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Akta Pendirian</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->akta) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->akta =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->akta == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->akta != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->akta != '1') {{$data->pendidikan->reason->akta}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('akta', 'Akta Pendirian Yayasan')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('akta', 'Akta Pendirian Yayasan')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Kurikulum</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->kurikulum) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->kurikulum =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->kurikulum == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->kurikulum != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->kurikulum != '1') {{$data->pendidikan->reason->kurikulum}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('kurikulum', 'Kurikulum')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('kurikulum', 'Kurikulum')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Struktur Organisasi</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->struktur_organisasi) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi != '1') {{$data->pendidikan->reason->struktur_organisasi}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('struktur_organisasi', 'Struktur Organisasi')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('struktur_organisasi', 'Struktur Organisasi')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>SK Penanggung Jawab Dan Pengajar</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->sk) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->sk =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sk == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sk != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->sk != '1') {{$data->pendidikan->reason->sk}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('sk', 'SK Penanggung Jawab Dan Pengajar')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('sk', 'SK Penanggung Jawab Dan Pengajar')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Sertifikat Tanah</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->sertifikat_tanah) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah != '1') {{$data->pendidikan->reason->sertifikat_tanah}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('sertifikat_tanah', 'Sertifikat Tanah')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('sertifikat_tanah', 'Sertifikat Tanah')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Nomor Induk Berusaha (NIB)</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->nib) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->nib =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->nib == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->nib != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->nib != '1') {{$data->pendidikan->reason->nib}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('nib', 'Nomor Induk Berusaha (NIB)')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('nib', 'Nomor Induk Berusaha (NIB)')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>

          <!-- OPSIONAL -->
          @if($data->pendidikan->npsn)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>NPSN (Perpanjangan)</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->npsn) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->npsn =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->npsn == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->npsn != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->npsn != '1') {{$data->pendidikan->reason->npsn}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('npsn', 'NPSN (Perpanjangan)')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('npsn', 'NPSN (Perpanjangan)')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          @endif

          @if($data->pendidikan->izin_lama)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Izin Lama (Perpanjangan)</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->izin_lama) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->izin_lama =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->izin_lama == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->izin_lama != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->izin_lama != '1') {{$data->pendidikan->reason->izin_lama}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('izin_lama', 'Izin Lama (Perpanjangan)')"><i class="fa fa-times"></i></button>&nbsp;
              <button class="btn btn-outline-success btn-sm" onclick="ceklis('izin_lama', 'Izin Lama (Perpanjangan)')" id="ceklis"><i class="fa fa-check"></i></button>
            </td>
          </tr>
          @endif

          @if($data->pendidikan->berkas_pendukung)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Berkas Pendukung</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            <td>@if($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung != '1') {{$data->pendidikan->reason->berkas_pendukung}} @endif</td>
            <td><button class="btn btn-outline-danger btn-sm" onclick="reason('berkas_pendukung', 'Berkas Pendukung')"><i class="fa fa-times"></i></button>&nbsp;
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
            const route= "{{ route('reason.bidang', ['id' => $data->pendidikan->id, 'jenis' => 'pendidikan']) }}";
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
              },
              success:function(data){
                $('#post-reason')[0].reset();
                $('#modal-reason').modal("hide");
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
            url = "{{ route('ceklis.bidang', ['id' => $data->pendidikan->id, 'jenis' => 'pendidikan']) }}",
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
                'izin' : 'pendidikan'
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
