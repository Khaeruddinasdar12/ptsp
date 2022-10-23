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
          Detail Data Pendidikan
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
          <p>Jenis Perizinan : <b>{{ $data->pendidikan->subizin->nama }}</b></p>
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
              <td valign="center">Nama</td>
              <td>{{ $data->pendidikan->nama }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->nama =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->nama != '1')
              <td> {{$data->pendidikan->reason->nama}} </td>
              <td>
                <form method="POST" action="{{ route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id]) }}">
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
              <td>Alamat</td>
              <td>{{ $data->pendidikan->alamat }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->alamat =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->alamat == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->alamat != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->alamat != '1')
              <td> {{$data->pendidikan->reason->alamat}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
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
              <td>Nama Yayasan</td>
              <td>{{ $data->pendidikan->nama_yayasan }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->nama_yayasan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama_yayasan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama_yayasan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->nama_yayasan != '1')
              <td> {{$data->pendidikan->reason->nama_yayasan}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="nama_yayasan">
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
              <td>Nama Pendidikan</td>
              <td>{{ $data->pendidikan->nama_pendidikan }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->nama_pendidikan != '1')
              <td> {{$data->pendidikan->reason->nama_pendidikan}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="nama_pendidikan">
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

            @if($data->pendidikan->subizin->nama == 'Program Pendidikan Kursus Dan Pelatihan')
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jenis Proram</td>
              <td>{{ $data->pendidikan->jenis_program }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->jenis_program =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->jenis_program == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->jenis_program != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->jenis_program != '1')
              <td> {{$data->pendidikan->reason->jenis_program}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="jenis_program">
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

            <tr>
              <td>{{$no = $no+1}}</td>
              <td>No NPSN</td>
              <td>{{ $data->pendidikan->no_npsn }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->no_npsn =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->no_npsn == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->no_npsn != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->no_npsn != '1')
              <td> {{$data->pendidikan->reason->no_npsn}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="no_npsn">
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
              <td>Jalan</td>
              <td>{{ $data->pendidikan->jalan }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->jalan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->jalan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->jalan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->jalan != '1')
              <td> {{$data->pendidikan->reason->jalan}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
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
              <td>Kec. {{ $data->pendidikan->klh->kecamatan }}, Kel. {{ $data->pendidikan->klh->kelurahan }} </td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->kelurahan =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->kelurahan == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->kelurahan != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->kelurahan != '1')
              <td> {{$data->pendidikan->reason->jalan}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
                  <div class="input-group">                  
                    @csrf
                    @method('PUT')
                    <!-- PILIH KACAMATAN -->
                    <select class="form-control" name="kecamatan" id="kecamatan" onchange="show_kelurahan(this.value)" required>
                      <option value="Biringkanaya" @if($data->pendidikan->klh->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                      <option value="Bontoala" @if($data->pendidikan->klh->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                      <option value="Kepulauan Sangkarrang" @if($data->pendidikan->klh->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                      <option value="Makassar" @if($data->pendidikan->klh->kecamatan == 'Makassar') selected @endif>Makassar</option>
                      <option value="Mamajang" @if($data->pendidikan->klh->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                      <option value="Manggala" @if($data->pendidikan->klh->kecamatan == 'Manggala') selected @endif>Manggala</option>
                      <option value="Mariso" @if($data->pendidikan->klh->kecamatan == 'Mariso') selected @endif>Mariso</option>
                      <option value="Panakkukang" @if($data->pendidikan->klh->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                      <option value="Rappocini" @if($data->pendidikan->klh->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                      <option value="Tallo" @if($data->pendidikan->klh->kecamatan == 'Tallo') selected @endif>Tallo</option>
                      <option value="Tamalanrea" @if($data->pendidikan->klh->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                      <option value="Tamalate" @if($data->pendidikan->klh->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                      <option value="Ujung Pandang" @if($data->pendidikan->klh->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                      <option value="Ujung Tanah" @if($data->pendidikan->klh->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                      <option value="Wajo" @if($data->pendidikan->klh->kecamatan == 'Wajo') selected @endif>Wajo</option>
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
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kode Pos</td>
              <td>{{ $data->pendidikan->kode_pos }}</td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->kode_pos =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->kode_pos == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->kode_pos != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->kode_pos != '1')
              <td> {{$data->pendidikan->reason->kode_pos}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}">
                  <div class="input-group">
                    @csrf
                    @method('PUT')
                    <input type="text" class="form-control" name="revisi" required>
                    <input type="hidden" class="form-control" name="key" value="kode_pos">
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
              <td><a href="{{ asset('storage/'.$data->pendidikan->ktp) }}" target="_blank">Lihat Berkas</a></td>
              <td>
                @if($data->pendidikan->reason && $data->pendidikan->reason->ktp =='1') {!! $terima !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->ktp == '') {!! $belumperiksa !!}
                @elseif($data->pendidikan->reason && $data->pendidikan->reason->ktp != '1') {!! $tolak !!}
                @else {!! $belumperiksa !!} @endif
              </td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->ktp != '1')
              <td> {{$data->pendidikan->reason->ktp}} </td>
              <td>
                <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
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
              <td><a href="{{ asset('storage/'.$data->pendidikan->pas_foto) }}" target="_blank">Lihat Berkas</a></td>
              <td>
               @if($data->pendidikan->reason && $data->pendidikan->reason->pas_foto =='1') {!! $terima !!}
               @elseif($data->pendidikan->reason && $data->pendidikan->reason->pas_foto == '') {!! $belumperiksa !!}
               @elseif($data->pendidikan->reason && $data->pendidikan->reason->pas_foto != '1') {!! $tolak !!}
               @else {!! $belumperiksa !!} @endif
             </td>
             @if($data->pendidikan->reason && $data->pendidikan->reason->pas_foto != '1')
             <td> {{$data->pendidikan->reason->pas_foto}} </td>
             <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="pas_foto" accept="image/jpeg,image/jpg,image/png" required>
                  <input type="hidden" class="form-control" name="key" value="pas_foto">
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
              <td>IMB</td>
              <td><a href="{{ asset('storage/'.$data->pendidikan->imb) }}" target="_blank">Lihat Berkas</a></td>
              <td>
               @if($data->pendidikan->reason && $data->pendidikan->reason->imb =='1') {!! $terima !!}
               @elseif($data->pendidikan->reason && $data->pendidikan->reason->imb == '') {!! $belumperiksa !!}
               @elseif($data->pendidikan->reason && $data->pendidikan->reason->imb != '1') {!! $tolak !!}
               @else {!! $belumperiksa !!} @endif
             </td>
             @if($data->pendidikan->reason && $data->pendidikan->reason->imb != '1')
             <td> {{$data->pendidikan->reason->imb}} </td>
             <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="imb" accept="image/jpeg,image/jpg,image/png" required>
                  <input type="hidden" class="form-control" name="key" value="imb">
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
            <td>Akta Pendirian Yayasan</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->akta) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->akta =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->akta == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->akta != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->akta != '1')
            <td> {{$data->pendidikan->reason->akta}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="akta" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="akta">
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
            <td>Kurikulum</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->kurikulum) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->kurikulum =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->kurikulum == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->kurikulum != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->kurikulum != '1')
            <td> {{$data->pendidikan->reason->akta}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="kurikulum" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="kurikulum">
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
            <td>Struktur Organisasi</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->struktur_organisasi) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->struktur_organisasi != '1')
            <td> {{$data->pendidikan->reason->struktur_organisasi}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="struktur_organisasi" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="struktur_organisasi">
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
            <td>SK Penanggung Jawab & Pengajar</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->sk) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->sk =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sk == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sk != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->sk != '1')
            <td> {{$data->pendidikan->reason->sk}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="sk" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="sk">
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
            <td>Sertifikat Tanah</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->sertifikat_tanah) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->sertifikat_tanah != '1')
            <td> {{$data->pendidikan->reason->sertifikat_tanah}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="sertifikat_tanah" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="sertifikat_tanah">
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
            <td>Nomor Induk Berusaha (NIB)</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->nib) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->nib =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->nib == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->nib != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->nib != '1')
            <td> {{$data->pendidikan->reason->nib}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="nib" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="nib">
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
            <td>NPNS (Perpanjangan)</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->npsn) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->npsn =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->npsn == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->npsn != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->npsn != '1')
            <td> {{$data->pendidikan->reason->npsn}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="npsn" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="npsn">
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
            <td>Izin Lama</td>
            <td><a href="{{ asset('storage/'.$data->pendidikan->izin_lama) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->izin_lama =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->izin_lama == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->izin_lama != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->izin_lama != '1')
            <td> {{$data->pendidikan->reason->izin_lama}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="input-group">
                  <input type="file" class="form-control" name="izin_lama" accept="application/pdf" required>
                  <input type="hidden" class="form-control" name="key" value="izin_lama">
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
            <td><a href="{{ asset('storage/'.$data->pendidikan->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
            <td>
              @if($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung =='1') {!! $terima !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung == '') {!! $belumperiksa !!}
              @elseif($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung != '1') {!! $tolak !!}
              @else {!! $belumperiksa !!} @endif
            </td>
            @if($data->pendidikan->reason && $data->pendidikan->reason->berkas_pendukung != '1')
            <td> {{$data->pendidikan->reason->berkas_pendukung}} </td>
            <td>
              <form method="POST" action="{{route('pendidikan.update', ['id' => $data->pendidikan->perizinan_id])}}" enctype="multipart/form-data">
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
         // $(document).ready(function () {
          curr_kel = {!! $data->pendidikan->klh->id !!};
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
