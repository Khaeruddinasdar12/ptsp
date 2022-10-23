@extends('layouts.user.app')

@section('title', 'Buat Izin Praktik')

@section('subheader')
<link href="{{ asset('css/pages/wizard/wizard-1.css') }} " rel="stylesheet" type="text/css" />
<h3 class="kt-subheader__title">
  Perizinan
</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
  <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
  <span class="kt-subheader__breadcrumbs-separator"></span>
  <a href="" class="kt-subheader__breadcrumbs-link">
  Buat Surat Izin Praktik (SIP) </a>
  <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
</div>

@endsection

@section('content')

<!-- LOADER -->
<div style="display: none;" id="loader" class="loader">
</div>
<!-- END LOADER -->

<div class="row justify-content-center">
  <div class="col-12">
    @include('layouts.user.alert')
    <div class="alert alert-secondary fade show" role="alert">
      <div class="alert-icon"><i class="fa flaticon-warning"></i></div>
      <div class="alert-text text-danger">
        <strong>Mohon bawa STR Asli ke tim Teknis (Kantor PTSP) setelah mengirim berkas.</strong>
      </div>
      <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
      </div>
    </div>
  </div>
</div>

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
  <div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
      <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
        <div class="kt-grid__item">
          <div class="card card-custom gutter-b">
            <div class="card-header card-header-tabs-line">
              <div class="card-toolbar">
                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1">
                      <span class="nav-icon"><i class="fa fa-user"></i></span>
                      <span class="nav-text">Data Pemohon</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2">
                      <span class="nav-icon"><i class="fa fa-tag"></i></span>
                      <span class="nav-text">Data Perizinan (SIP)</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">
                      <span class="nav-icon"><i class="fa fa-home"></i></span>
                      <span class="nav-text">Data Praktik</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_4">
                      <span class="nav-icon"><i class="fa fa-folder"></i></span>
                      <span class="nav-text">Upload Berkas</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_5">
                      <span class="nav-icon"><i class="fa fa-exclamation"></i></span>
                      <span class="nav-text">Kirim Data Dan Berkas</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="card-body">
              <div class="tab-content">
                <!-- TAB 1 -->
                <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                  <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                    <div class="container">
                      <form action="{{route('sip.tab1')}}" method="POST" id="tab1">
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Gelar Awal:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="gelar_awal" value="@if($old){{$old->sip->gelar_awal}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Lengkap Sesuai STR:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama" value="@if($old){{$old->sip->nama}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Gelar Akhir:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="gelar_akhir" value="@if($old){{$old->sip->gelar_akhir}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">No HP:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nohp" value="@if($old){{$old->sip->nohp}}@endif" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Tempat Lahir:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="tempat_lahir" value="@if($old){{$old->sip->tempat_lahir}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Tanggal Lahir:*</label>
                          <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal_lahir" value="@if($old){{$old->sip->tanggal_lahir}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Alamat Rumah:*</label>
                          <div class="col-lg-9">
                            <textarea class="form-control" name="alamat">@if($old){{$old->sip->alamat}}@endif</textarea>
                          </div>
                        </div>
                        <div class="row align-items-center">
                          <div class="col-12 kt-align-right">
                            <button type="submit" class="btn btn-outline-info btn-sm" title="Terima Berkas">
                              <i class="fa fa-check"></i> Simpan & Selanjutnya
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END TAB 1 -->

                <!-- TAB 2 -->
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                 <div class="container">
                  <form method="POST" action="{{route('sip.tab2')}}" id="tab2">
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jenis Perizinan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="jenis_izin" id="jenis_izin" onchange="jenis(this.value)">
                          @foreach($data as $datas)
                          <option value="{{$datas->id}}" @if($old && $old->sip->subizin_id == $datas->id) selected @endif>{{$datas->nama}}</option>
                          @endforeach

                          <option value="Dokter Spesialis" @if($old && $old->sip->subizin && $old->sip->subizin->nama == 'Dokter Spesialis') selected @endif>Dokter Spesialis</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row" id="list-spesialis">
                      <label class="col-lg-3 col-form-label">Sepsialis:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="spesialis" id="spesialis">
                          <option></option>
                        </select>
                      </div>
                    </div>
                    
                    <div id="konsultan"></div>

                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">No. Rekomendasi OP*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="rekomendasi_op" value="@if($old){{$old->sip->rekomendasi_op}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">No. STR:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="no_str" value="@if($old){{$old->sip->no_str}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanggal Mulai Berlaku STR:*</label>
                      <div class="col-lg-9">
                        <input type="date" class="form-control" name="awal_str" value="@if($old){{$old->sip->awal_str}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanggal Berakhir STR:*</label>
                      <div class="col-lg-9">
                        <input type="date" class="form-control" name="akhir_str" value="@if($old){{$old->sip->akhir_str}}@endif">
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-12 kt-align-right">
                        <button type="submit" class="btn btn-outline-info btn-sm">
                          <i class="fa fa-check"></i> Simpan & Selanjutnya
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- END TAB 2 -->

              <!-- TAB 3 -->
              <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                <div class="container">
                  <div class="card-body">
                    <div class="alert alert-secondary fade show" role="alert">
                      <div class="alert-icon"><i class="fa flaticon-warning"></i></div>
                      <div class="alert-text">
                        <strong>Jika permohonan ini adalah tempat praktek ke-2 Anda, maka mohon isi data Praktek 1 Anda.</strong>
                      </div>
                      <div class="alert-close">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true"><i class="la la-close"></i></span>
                        </button>
                      </div>
                    </div>
                    <h5 class="font-size-lg text-dark font-weight-bold mb-6">Praktek 1</h5>
                    <div class="container">

                      
                      
                      <form method="POST" id="praktik1">                    
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Praktek:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama_praktek1" value="@if($old){{$old->sip->nama_praktek1}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Jejaring:</label>
                          <div class="col-lg-9">
                            <textarea class="form-control" name="jejaring1" placeholder="isi dengan format jejaring 1: nama_jejaring, alamat_jejaring; jejaring 2: nama_jejaring, alamat_jejaring; dst">@if($old){{$old->sip->jejaring1}}@endif</textarea>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="kecamatan1" id="kecamatan1" onchange="show_kelurahan1(this.value)">
                              <option value="Biringkanaya" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                              <option value="Bontoala" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                              <option value="Kepulauan Sangkarrang" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                              <option value="Makassar" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Makassar') selected @endif>Makassar</option>
                              <option value="Mamajang" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                              <option value="Manggala" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Manggala') selected @endif>Manggala</option>
                              <option value="Mariso" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Mariso') selected @endif>Mariso</option>
                              <option value="Panakkukang" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                              <option value="Rappocini" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                              <option value="Tallo" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Tallo') selected @endif>Tallo</option>
                              <option value="Tamalanrea" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                              <option value="Tamalate" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                              <option value="Ujung Pandang" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                              <option value="Ujung Tanah" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                              <option value="Wajo" @if($old && $old->sip && $old->sip->klh1 && $old->sip->klh1->kecamatan == 'Wajo') selected @endif>Wajo</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Kelurahan:*</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="kelurahan1" id="kelurahan1">
                              <option></option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Jalan:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="jalan1" value="@if($old){{$old->sip->jalan1}}@endif">
                          </div>
                        </div>  
                        <!-- jadwal 1 -->
                        <div id="jadwal1" style="display: none">
                          <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jadwal:*</label>

                            <div class="col-lg-2 form-floating">
                              @php $hari_buka1 = null; @endphp
                              @if($old && $old->sip->hari_buka1)
                              @php $hari_buka1 = $old->sip->hari_buka1; @endphp
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
                            <div class="col-lg-2 form-floating">
                              @php $hari_tutup1 = null; @endphp
                              @if($old && $old->sip->hari_tutup1)
                              @php $hari_tutup1 = $old->sip->hari_tutup1; @endphp
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
                            <div class="col-lg-2 form-floating">


                              @php $jam_buka1 = null; $menitbuka1 = null; @endphp
                              @if($old && $old->sip->jam_buka1)
                              @php 
                              $jam_buka1 = strtok($old->sip->jam_buka1, ':');  
                              $menitbuka1 = substr($old->sip->jam_buka1, strpos($old->sip->jam_buka1, ":") + 1);
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
                            <div class="col-lg-2 form-floating">
                              @php $jam_tutup1 = null; $menittutup1 = null; @endphp
                              @if($old && $old->sip->jam_tutup1)
                              @php 
                              $jam_tutup1 = strtok($old->sip->jam_tutup1, ':');  
                              $menittutup1 = substr($old->sip->jam_tutup1, strpos($old->sip->jam_tutup1, ":") + 1);
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
                        </div>
                        <!-- end jadwal1 -->
                        <div class="row align-items-center">
                          <div class="col-12 kt-align-right">
                            <button type="submit" class="btn btn-outline-info btn-sm">
                              <i class="fa fa-check"></i> Simpan Praktek 1
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  <hr>

                  <h5 class="font-size-lg text-dark font-weight-bold mb-6">Praktek 2 (jika ada)</h5>
                  <div class="card-body">
                    <div class="container">
                      <form action="" id="praktik2">
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Praktek:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama_praktek2" value="@if($old){{$old->sip->nama_praktek2}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="kecamatan2" id="kecamatan2" onchange="show_kelurahan2(this.value)">
                              <option value="Biringkanaya" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                              <option value="Bontoala" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                              <option value="Kepulauan Sangkarrang" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                              <option value="Makassar" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Makassar') selected @endif>Makassar</option>
                              <option value="Mamajang" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                              <option value="Manggala" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Manggala') selected @endif>Manggala</option>
                              <option value="Mariso" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Mariso') selected @endif>Mariso</option>
                              <option value="Panakkukang" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                              <option value="Rappocini" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                              <option value="Tallo" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Tallo') selected @endif>Tallo</option>
                              <option value="Tamalanrea" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                              <option value="Tamalate" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                              <option value="Ujung Pandang" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                              <option value="Ujung Tanah" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                              <option value="Wajo" @if($old && $old->sip && $old->sip->klh2 && $old->sip->klh2->kecamatan == 'Wajo') selected @endif>Wajo</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Kelurahan:*</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="kelurahan2" id="kelurahan2">
                              <option></option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Jalan:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="jalan2" value="@if($old){{$old->sip->jalan2}}@endif">
                          </div>
                        </div>   
                        <div id="jadwal2" style="display: none">
                          <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jadwal:*</label>
                            <div class="col-lg-2 form-floating">
                              @php $hari_buka2 = null; @endphp
                              @if($old && $old->sip->hari_buka2)
                              @php $hari_buka2 = $old->sip->hari_buka2; @endphp
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
                            <div class="col-lg-2 form-floating">
                              @php $hari_tutup2 = null; @endphp
                              @if($old && $old->sip->hari_tutup2)
                              @php $hari_tutup2 = $old->sip->hari_tutup2; @endphp
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
                            <div class="col-lg-2 form-floating">
                              @php $jam_buka2 = null; $menitbuka2 = null; @endphp
                              @if($old && $old->sip->jam_buka2)
                              @php 
                              $jam_buka2 = strtok($old->sip->jam_buka2, ':');  
                              $menitbuka2 = substr($old->sip->jam_buka2, strpos($old->sip->jam_buka2, ":") + 1);
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
                            <div class="col-lg-2 form-floating">
                              @php $jam_tutup2 = null; $menittutup2 = null; @endphp
                              @if($old && $old->sip->jam_tutup2)
                              @php 
                              $jam_tutup2 = strtok($old->sip->jam_tutup2, ':');  
                              $menittutup2 = substr($old->sip->jam_tutup2, strpos($old->sip->jam_tutup2, ":") + 1);
                              @endphp
                              @endif
                              <label for="floatingInputInvalid">Jam Tutup</label>
                              <div class="input-group mb-3">
                                <select class="form-control" name="jam_tutup2">
                                  @php $i = 0; @endphp
                                  @for($i; $i < 24; $i++)
                                  <option value="{{$i}}" @if($jam_tutup2 == $i) selected @endif>{{$i}}</option>
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
                        </div>
                        <div class="row align-items-center">
                          <div class="col-12 kt-align-right">
                            <button type="submit" class="btn btn-outline-info btn-sm">
                              <i class="fa fa-check"></i> Simpan Praktek 2
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <hr>

                  <h5 class="font-size-lg text-dark font-weight-bold mb-6">Praktek 3 (jika ada)</h5>
                  <div class="card-body">
                    <div class="container">
                      <form action="" id="praktik3">
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Praktek:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama_praktek3" value="@if($old){{$old->sip->nama_praktek3}}@endif" required="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="kecamatan3" id="kecamatan3" onchange="show_kelurahan3(this.value)">
                              <option value="Biringkanaya" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                              <option value="Bontoala" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh1->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                              <option value="Kepulauan Sangkarrang" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                              <option value="Makassar" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Makassar') selected @endif>Makassar</option>
                              <option value="Mamajang" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                              <option value="Manggala" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Manggala') selected @endif>Manggala</option>
                              <option value="Mariso" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Mariso') selected @endif>Mariso</option>
                              <option value="Panakkukang" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                              <option value="Rappocini" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                              <option value="Tallo" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Tallo') selected @endif>Tallo</option>
                              <option value="Tamalanrea" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                              <option value="Tamalate" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                              <option value="Ujung Pandang" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                              <option value="Ujung Tanah" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                              <option value="Wajo" @if($old && $old->sip && $old->sip->klh3 && $old->sip->klh3->kecamatan == 'Wajo') selected @endif>Wajo</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Kelurahan:*</label>
                          <div class="col-lg-9">
                            <select class="form-control" name="kelurahan3" id="kelurahan3">
                              <option></option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Jalan:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="jalan3" value="@if($old){{$old->sip->jalan3}}@endif" required="">
                          </div>
                        </div>
                        <div id="jadwal3" style="display: none">
                          <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Jadwal:*</label>
                            <div class="col-lg-2 form-floating">
                              @php $hari_buka3 = null; @endphp
                              @if($old && $old->sip->hari_buka3)
                              @php $hari_buka3 = $old->sip->hari_buka3; @endphp
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
                            <div class="col-lg-2 form-floating">
                              @php $hari_tutup3 = null; @endphp
                              @if($old && $old->sip->hari_tutup3)
                              @php $hari_tutup3 = $old->sip->hari_tutup3; @endphp
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
                            <div class="col-lg-2 form-floating">
                              @php $jam_buka3 = null; $menitbuka3 = null; @endphp
                              @if($old && $old->sip->jam_buka3)
                              @php 
                              $jam_buka3 = strtok($old->sip->jam_buka3, ':');  
                              $menitbuka3 = substr($old->sip->jam_buka3, strpos($old->sip->jam_buka3, ":") + 1);
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
                            <div class="col-lg-2 form-floating">
                              @php $jam_tutup3 = null; $menittutup3 = null; @endphp
                              @if($old && $old->sip->jam_tutup3)
                              @php 
                              $jam_tutup3 = strtok($old->sip->jam_tutup3, ':');  
                              $menittutup3 = substr($old->sip->jam_tutup3, strpos($old->sip->jam_tutup3, ":") + 1);
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
                        </div>
                        <div class="row align-items-center">
                          <div class="col-12 kt-align-right">
                            <button type="submit" class="btn btn-outline-info btn-sm">
                              <i class="fa fa-check"></i> Simpan Praktek 3
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>

                  <hr>
                  <div class="row align-items-center">
                    <div class="col-12 kt-align-right">
                      <button type="button" class="btn btn-outline-info btn-sm" onclick="to_tab_4()">
                        <i class="fa fa-check"></i> Selanjutnya
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END TAB 3 -->

              <!-- TAB 4 -->
              <div class="tab-pane fade" id="kt_tab_pane_4" role="tabpanel" aria-labelledby="kt_tab_pane_4">
                <div class="container">

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Foto KTP: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="ktp">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="ktp" id="file-ktp" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-ktp" class="form-control" id="label-ktp">@if($old && $old->sip->ktp)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="ktp" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-ktp">
                        @if($old && $old->sip->ktp)
                        <a href="{{asset('storage/'.$old->sip->ktp)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Pas Foto: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="foto">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="foto" id="file-foto" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-foto" class="form-control" id="label-foto">@if($old && $old->sip->foto)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="foto" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-foto">
                        @if($old && $old->sip->foto)
                        <a href="{{asset('storage/'.$old->sip->foto)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">STR: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="str">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="str" id="file-str" style="display:none;" accept="application/pdf">
                          <label for="file-str" class="form-control" id="label-str">@if($old && $old->sip->str)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="str" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-str">
                        @if($old && $old->sip->str)
                        <a href="{{asset('storage/'.$old->sip->str)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Rekomendasi Organisasi Profesi: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="rekomendasi_org">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="rekomendasi_org" id="file-rekomendasi_org" style="display:none;" accept="application/pdf">
                          <label for="file-rekomendasi_org" class="form-control" id="label-rekomendasi_org">@if($old && $old->sip->rekomendasi_org)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="rekomendasi_org" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-rekomendasi_org">
                        @if($old && $old->sip->rekomendasi_org)
                        <a href="{{asset('storage/'.$old->sip->rekomendasi_org)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Surat Keterangan Pelayanan Kesehatan - Tempat Kerja: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="surat_keterangan">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="surat_keterangan" id="file-surat_keterangan" style="display:none;" accept="application/pdf">
                          <label for="file-surat_keterangan" class="form-control" id="label-surat_keterangan">@if($old && $old->sip->surat_keterangan)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="surat_keterangan" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-surat_keterangan">
                        @if($old && $old->sip->surat_keterangan)
                        <a href="{{asset('storage/'.$old->sip->surat_keterangan)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <hr>
                  <h6>Opsional</h6>
                  <hr>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">SK Jejaring: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="berkas_jejaring1">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="berkas_jejaring1" id="file-berkas_jejaring1" style="display:none;" accept="application/pdf">
                          <label for="file-berkas_jejaring1" class="form-control" id="label-berkas_jejaring1">@if($old && $old->sip->str)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="berkas_jejaring1" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-berkas_jejaring1">
                        @if($old && $old->sip->berkas_jejaring1)
                        <a href="{{asset('storage/'.$old->sip->berkas_jejaring1)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Surat Persetujuan Pimpinan Instansi: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="surat_persetujuan">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="surat_persetujuan" id="file-surat_persetujuan" style="display:none;" accept="application/pdf">
                          <label for="file-surat_persetujuan" class="form-control" id="label-surat_persetujuan">@if($old && $old->sip->surat_persetujuan)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="surat_persetujuan" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-surat_persetujuan">
                        @if($old && $old->sip->surat_persetujuan)
                        <a href="{{asset('storage/'.$old->sip->surat_persetujuan)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Berkas Pendukung Lainnya: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="berkas_pendukung">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="berkas_pendukung" id="file-berkas_pendukung" style="display:none;" accept="application/pdf">
                          <label for="file-berkas_pendukung" class="form-control" id="label-berkas_pendukung">@if($old && $old->sip->berkas_pendukung)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="berkas_pendukung" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-berkas_pendukung">
                        @if($old && $old->sip->berkas_pendukung)
                        <a href="{{asset('storage/'.$old->sip->berkas_pendukung)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row align-items-center">
                    <div class="col-12 kt-align-right">
                      <button type="button" class="btn btn-outline-info btn-sm" onclick="to_tab_5()" title="Terima Berkas">
                        <i class="fa fa-check"></i> Simpan & Selanjutnya
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- END TAB 4 -->

              <!-- TAB 5 -->
              <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel" aria-labelledby="kt_tab_pane_4">
                <div class="container">
                  <form id=tab5>
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Pernyataan: </label>
                      <div class="col-lg-9">
                        <input type="checkbox" class="" name="ceklis" required="">  Dengan ini menyatakan bahwa data yang dikirim merupakan data yang sebenarnya dan apabila dikemudian hari terdapat ketidaksesuain maka saya siap untuk menerima konsekuensi.
                      </div>
                    </div>
                    <div class="row align-items-center">
                      <div class="col-12 kt-align-right">
                        <button type="submit" class="btn btn-outline-info btn-sm" title="Kirim Berkas">
                          <i class="fa fa-check"></i> Kirim Berkas
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- END TAB 5 -->
            </div>
          </div>
       <!--    <div class="card-footer">
            halsjfohasjf
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
</div>

@endsection
<script type="text/javascript">
  kel_id1 = null;
</script>
@if($old && $old->sip && $old->sip->klh1)
<script type="text/javascript">
  kel_id1 = '{!! $old->sip->klh1->id !!}';
</script>
@endif

<script type="text/javascript">
  kel_id2 = null;
</script>
@if($old && $old->sip && $old->sip->klh2)
<script type="text/javascript">
  kel_id2 = '{!! $old->sip->klh2->id !!}';
</script>
@endif

<script type="text/javascript">
  kel_id3 = null;
</script>
@if($old && $old->sip && $old->sip->klh3)
<script type="text/javascript">
  kel_id3 = '{!! $old->sip->klh3->id !!}';
</script>
@endif


<script type="text/javascript">
  jenis_izin_old = null;
  id_jenis_izin_old = null;
</script>
@if($old && $old->sip)
<script type="text/javascript">
  sip_id = '{!! $old->sip->id !!}';
</script>
@else
<script type="text/javascript">
  sip_id = null;
</script>
@endif

@section('page_script')
<script type="text/javascript">
  const route1= "{{ route('sip.tab1') }}";
  const route2= "{{ route('sip.tab2') }}";
  const route3= "{{ route('sip.tab3') }}";
  const praktik1= "{{ route('sip.praktik1') }}";
  const praktik2= "{{ route('sip.praktik2') }}";
  const praktik3= "{{ route('sip.praktik3') }}";
  const route4= "{{ route('sip.tab4') }}";
  const route5= "{{ route('sip.tab5') }}"; 

  function show_konsultan() {
    $('#konsultan').append('<div class="form-group row"><label class="col-lg-3 col-form-label">Konsultan*</label><div class="col-lg-9"><input type="text" class="form-control" name="konsultan" value="@if($old){{$old->sip->rekomendasi_op}}@endif"></div></div>')
  }
</script>

<script type="text/javascript" src="{{asset('js/user/sip-create.js')}}"></script>

@if($old && $old->sip->subizin_id == '7')
<script type="text/javascript">
  jenis(7);
</script>
@else
<script type="text/javascript">
  jenis(0);
</script>
@endif


<script type="text/javascript">
  subizin_id = null;
</script>
@if($old && $old->sip->subizin && $old->sip->subizin->nama == 'Dokter Spesialis') 
<script type="text/javascript">
  subizin_id = '{!! $old->sip->subizin->id !!}';
  jenis('Dokter Spesialis');
</script>
@endif

<script type="text/javascript">
  function show_konsultan() {
    $('#konsultan').append('<div class="form-group row"><label class="col-lg-3 col-form-label">Konsultan*</label><div class="col-lg-9"><input type="text" class="form-control" name="konsultan" value="@if($old){{$old->sip->rekomendasi_op}}@endif"></div></div>')
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
    key = '';
    Swal.fire({
      type: 'error',
      title: key + pesan,
      showConfirmButton: true,
      timer: 25500,
      button: "Ok"
    })
  }
</script>
@endsection