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
          Detail Data Perizinan Surat Izin Kerja (SIK)
        </h3>
      </div>
      <div class="row align-items-center">
        <div class="col-12 kt-align-right">
          <button type="button" class="btn btn-success btn-sm" id="update-button" onclick="updateberkas()">
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
          <p>Jenis Perizinan : <b>{{ $data->sik->subizin->nama }}</b></p>
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
          $belumperiksa = '<span class="badge rounded-pill bg-primary text-white"><i class="fa flaticon-info"></i> Belum diperiksa</span>';
          @endphp
          <tbody>

            <tr>
              <td>{{$no}}</td>
              <td valign="center">Nama Sesuai STR</td>
              <td>{{ $data->sik->nama }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->nama =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->nama == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->nama != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->nama != '1')
              <td> {{$data->sik->reason->nama}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
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
              <td>Tempat Lahir</td>
              <td>{{ $data->sik->tempat_lahir }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->tempat_lahir =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->tempat_lahir == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->tempat_lahir != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->tempat_lahir != '1')
              <td> {{$data->sik->reason->tempat_lahir}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
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
              <td>{{ $data->sik->tanggal_lahir }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->tanggal_lahir =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->tanggal_lahir == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->tanggal_lahir != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->tanggal_lahir != '1')
              <td> {{$data->sik->reason->tanggal_lahir}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
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
              <td>{{ $data->sik->alamat }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->alamat =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->alamat == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->alamat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->alamat != '1')
              <td> {{$data->sik->reason->alamat}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
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
              <td>Nomor STR</td>
              <td>{{ $data->sik->no_str }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->no_str =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->no_str == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->no_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->no_str != '1')
              <td> {{$data->sik->reason->no_str}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
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
              <td>{{ $data->sik->awal_str }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->awal_str =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->awal_str == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->awal_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->awal_str != '1')
              <td> {{$data->sik->reason->awal_str}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
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
              <td>{{ $data->sik->akhir_str }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->akhir_str =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->akhir_str == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->akhir_str != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->akhir_str != '1')
              <td> {{$data->sik->reason->akhir_str}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
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
              <td>Nama Praktek </td>
              <td>{{ $data->sik->nama_praktek }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->nama_praktek =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->nama_praktek == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->nama_praktek != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->nama_praktek != '1')
              <td> {{$data->sik->reason->nama_praktek}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="nama_praktek">
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
              <td>Jalan</td>
              <td>{{ $data->sik->jalan }}</td>
              <td>
                @if($data->sik->reason && $data->sik->reason->jalan =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->jalan == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->jalan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->jalan != '1')
              <td> {{$data->sik->reason->jalan}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="jalan">
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
              <td>Kecamatan & Kelurahan Praktek </td>
              <td>Kec. {{ $data->sik->klh->kecamatan }}, Kel. {{ $data->sik->klh->kelurahan }} </td>
              <td>
                @if($data->sik->reason && $data->sik->reason->kelurahan =='1') {!! $terima !!}
                @elseif($data->sik->reason && $data->sik->reason->kelurahan == '') {!! $belumperiksa !!}
                @elseif($data->sik->reason && $data->sik->reason->kelurahan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->sik->reason && $data->sik->reason->kelurahan != '1')
              <td> {{$data->sik->reason->jalan}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}">
                  <div class="input-group">                  
                    @csrf
                    @method('PUT')
                    <!-- PILIH KACAMATAN -->
                    <select class="form-control" name="kecamatan" id="kecamatan" onchange="show_kelurahan(this.value)" required>
                      <option value="Biringkanaya" @if($data->sik->klh->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                      <option value="Bontoala" @if($data->sik->klh->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                      <option value="Kepulauan Sangkarrang" @if($data->sik->klh->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                      <option value="Makassar" @if($data->sik->klh->kecamatan == 'Makassar') selected @endif>Makassar</option>
                      <option value="Mamajang" @if($data->sik->klh->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                      <option value="Manggala" @if($data->sik->klh->kecamatan == 'Manggala') selected @endif>Manggala</option>
                      <option value="Mariso" @if($data->sik->klh->kecamatan == 'Mariso') selected @endif>Mariso</option>
                      <option value="Panakkukang" @if($data->sik->klh->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                      <option value="Rappocini" @if($data->sik->klh->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                      <option value="Tallo" @if($data->sik->klh->kecamatan == 'Tallo') selected @endif>Tallo</option>
                      <option value="Tamalanrea" @if($data->sik->klh->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                      <option value="Tamalate" @if($data->sik->klh->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                      <option value="Ujung Pandang" @if($data->sik->klh->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                      <option value="Ujung Tanah" @if($data->sik->klh->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                      <option value="Wajo" @if($data->sik->klh->kecamatan == 'Wajo') selected @endif>Wajo</option>
                    </select>
                    <select class="form-control" name="revisi" id="kelurahan">
                      <option></option>
                    </select>
                    <input type="hidden" name="key" value="kelurahan" required>
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
            <!-- END OF PRAKTEK 1, JALAN 1, KELURAHAN & KECAMATAN 1 -->

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
              @if($data->sik->reason && $data->sik->reason->ktp != '1')
              <td> {{$data->sik->reason->ktp}} </td>
              <td>
                <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
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
              <td><a href="{{ asset('storage/'.$data->sik->foto) }}" target="_blank">Lihat Berkas</a></td>
              <td>
               @if($data->sik->reason && $data->sik->reason->foto =='1') {!! $terima !!}
               @elseif($data->sik->reason && $data->sik->reason->foto == '') {!! $belumperiksa !!}
               @elseif($data->sik->reason && $data->sik->reason->foto != '1') {!! $tolak !!}
               @else {!! $belumperiksa !!} @endif
             </td>
             @if($data->sik->reason && $data->sik->reason->foto != '1')
             <td> {{$data->sik->reason->foto}} </td>
             <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
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
            <td>Ijazah</td>
            <td><a href="{{ asset('storage/'.$data->sik->ijazah) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->ijazah =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->ijazah == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->ijazah != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sik->reason && $data->sik->reason->ijazah != '1')
            <td> {{$data->sik->reason->ijazah}} </td>
            <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="ijazah" accept="image/jpeg,image/jpg,image/png" required>
                  <input type="hidden" class="form-control" name="key" value="ijazah">
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
            <td><a href="{{ asset('storage/'.$data->sik->str) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->str =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->str == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->str != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sik->reason && $data->sik->reason->str != '1')
            <td> {{$data->sik->reason->str}} </td>
            <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
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
            <td><a href="{{ asset('storage/'.$data->sik->rekomendasi_org) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->rekomendasi_org =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->rekomendasi_org == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->rekomendasi_org != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sik->reason && $data->sik->reason->rekomendasi_org != '1')
            <td> {{$data->sik->reason->rekomendasi_org}} </td>
            <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
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
            <td>Surat Keterangan Pelayanan Kesehatan</td>
            <td><a href="{{ asset('storage/'.$data->sik->surat_keterangan) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->surat_keterangan =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keterangan == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keterangan != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sik->reason && $data->sik->reason->surat_keterangan != '1')
            <td> {{$data->sik->reason->surat_keterangan}} </td>
            <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
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
          @if($data->sik->surat_keluasan)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Surat Keterangan Keluasan </td>
            <td><a href="{{ asset('storage/'.$data->sik->surat_keluasan) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->surat_keluasan =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keluasan == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->surat_keluasan != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sik->reason && $data->sik->reason->surat_keluasan != '1')
            <td> {{$data->sik->reason->surat_keluasan}} </td>
            <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="surat_keluasan" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="surat_keluasan">
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
          @endif

          @if($data->sik->berkas_pendukung)
          <tr>
            <td>{{$no = $no+1}}</td>
            <td>Berkas Pendukung</td>
            <td><a href="{{ asset('storage/'.$data->sik->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->sik->reason && $data->sik->reason->berkas_pendukung =='1') {!! $terima !!}
              @elseif($data->sik->reason && $data->sik->reason->berkas_pendukung == '') {!! $belumperiksa !!}
              @elseif($data->sik->reason && $data->sik->reason->berkas_pendukung != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->sik->reason && $data->sik->reason->berkas_pendukung != '1')
            <td> {{$data->sik->reason->berkas_pendukung}} </td>
            <td>
              <form method="POST" action="{{route('sik.update', ['id' => $data->sik->perizinan_id])}}" enctype="multipart/form-data">
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
          @endif
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

@section('page_script')

<script type="text/javascript">
         // $(document).ready(function () {
          curr_kel = {!! $data->sik->klh->id !!};
          var kec = $('#kecamatan').val();
          show_kelurahan(kec);       
        // });

// menampilkan kelurahan setelah memilih kecamatan
function show_kelurahan(kec) {
  $("#kelurahan").empty();
  $("#kelurahan").append("<option value=''>--Pilih kelurahan--</option>");
  $.ajax({
    'url': "../../cek-kelurahan/" + kec,
    'dataType': 'json',
    success: function(data) {
      jQuery.each(data, function(i, val) {
        if(val.id == curr_kel) {
          check = 'selected';
        } else {
          check = '';
        }
        $('#kelurahan').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
//end menampilkan kelurahan setelah memilih kecamatan
           function updateberkas() { // verifikasi berkas berhasil
            $(document).on('click', '#update-button', function(){
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
                  token = $('meta[name="csrf-token"]').attr('content');
                  var endpoint= "{{route('perizinan.ditolak.update', ['no_tiket' => $data->no_tiket])}}";
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
        @endsection
