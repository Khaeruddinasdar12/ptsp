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
                          <label class="col-lg-3 col-form-label">Nama Lengkap Sesuai STR:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama" value="@if($old){{$old->sip->nama}}@endif">
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
                        <select class="form-control" name="jenis_izin" >
                          @foreach($data as $datas)
                          <option value="{{$datas->id}}" @if($old && $old->sip->subizin_id == $datas->id) selected @endif>{{$datas->nama}}</option>
                          @endforeach
                        </select>
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
              <script type="text/javascript">
                kel_id = null;
              </script>
              @if($old && $old->sip && $old->sip->klh)
              <script type="text/javascript">
                kel_id = '{!! $old->sip->klh->id !!}';
              </script>
              @php $kec = $old->sip->klh->kecamatan; @endphp
              @else
              @php $kec=null; @endphp
              @endif

              <!-- TAB 3 -->
              <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                <div class="container">
                  <form method="POST" id="tab3">                    
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nama Praktek:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="nama_praktek1" value="@if($old){{$old->sip->nama_praktek1}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kecamatan1" id="kecamatan1" onchange="show_kelurahan1(this.value)">
                          <option value="Biringkanaya" selected="">Biringkanaya</option>
                          <option value="Bontoala">Bontoala</option>
                          <option value="Kepulauan Sangkarrang">Kepulauan Sangkarrang</option>
                          <option value="Makassar">Makassar</option>
                          <option value="Mamajang">Mamajang</option>
                          <option value="Manggala">Manggala</option>
                          <option value="Mariso">Mariso</option>
                          <option value="Panakkukang">Panakkukang</option>
                          <option value="Rappocini">Rappocini</option>
                          <option value="Tallo">Tallo</option>
                          <option value="Tamalanrea">Tamalanrea</option>
                          <option value="Tamalate">Tamalate</option>
                          <option value="Ujung Pandang">Ujung Pandang</option>
                          <option value="Ujung Tanah">Ujung Tanah</option>
                          <option value="Wajo">Wajo</option>
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
                    <hr>

                    <h5 class="font-size-lg text-dark font-weight-bold mb-6">Praktek 2 (jika ada)</h5>
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
                          <option value="Biringkanaya" selected="">Biringkanaya</option>
                          <option value="Bontoala">Bontoala</option>
                          <option value="Kepulauan Sangkarrang">Kepulauan Sangkarrang</option>
                          <option value="Makassar">Makassar</option>
                          <option value="Mamajang">Mamajang</option>
                          <option value="Manggala">Manggala</option>
                          <option value="Mariso">Mariso</option>
                          <option value="Panakkukang">Panakkukang</option>
                          <option value="Rappocini">Rappocini</option>
                          <option value="Tallo">Tallo</option>
                          <option value="Tamalanrea">Tamalanrea</option>
                          <option value="Tamalate">Tamalate</option>
                          <option value="Ujung Pandang">Ujung Pandang</option>
                          <option value="Ujung Tanah">Ujung Tanah</option>
                          <option value="Wajo">Wajo</option>
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
                    <hr>

                    <h5 class="font-size-lg text-dark font-weight-bold mb-6">Praktek 3 (jika ada)</h5>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nama Praktek:</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="nama_praktek3" value="@if($old){{$old->sip->nama_praktek3}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kecamatan3" id="kecamatan3" onchange="show_kelurahan3(this.value)">
                          <option value="Biringkanaya" selected="">Biringkanaya</option>
                          <option value="Bontoala">Bontoala</option>
                          <option value="Kepulauan Sangkarrang">Kepulauan Sangkarrang</option>
                          <option value="Makassar">Makassar</option>
                          <option value="Mamajang">Mamajang</option>
                          <option value="Manggala">Manggala</option>
                          <option value="Mariso">Mariso</option>
                          <option value="Panakkukang">Panakkukang</option>
                          <option value="Rappocini">Rappocini</option>
                          <option value="Tallo">Tallo</option>
                          <option value="Tamalanrea">Tamalanrea</option>
                          <option value="Tamalate">Tamalate</option>
                          <option value="Ujung Pandang">Ujung Pandang</option>
                          <option value="Ujung Tanah">Ujung Tanah</option>
                          <option value="Wajo">Wajo</option>
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
                        <input type="text" class="form-control" name="jalan3" value="@if($old){{$old->sip->jalan3}}@endif">
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
                          <input type="file" class="form-control" name="ktp" accept="image/jpeg,image/jpg,image/png" required>
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
                          <input type="file" class="form-control" name="foto" accept="image/jpeg,image/jpg,image/png" required>
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
                          <input type="file" class="form-control" name="str" accept="application/pdf" required>
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
                          <input type="file" class="form-control" name="rekomendasi_org" accept="application/pdf" required>
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
                    <label class="col-lg-3 col-form-label">Surat Keterangan Pelayanan Kesehatan: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="surat_keterangan">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="surat_keterangan" accept="application/pdf" required>
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
                    <label class="col-lg-3 col-form-label">Surat Persetujuan Pimpinan Instansi: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form action="{{route('sip.tab4')}}" method="POST" id="surat_persetujuan">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="surat_persetujuan" accept="application/pdf" required>
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
                          <input type="file" class="form-control" name="berkas_pendukung" accept="application/pdf" required>
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
  jenis_izin_old = null;
  id_jenis_izin_old = null;
</script>
@if($old && $old->sip)
<script type="text/javascript">
  sip_id = '{!! $old->sip->id !!}';
</script>
@endif

@section('page_script')
<script type="text/javascript">

  const route1= "{{ route('sip.tab1') }}";
  const route2= "{{ route('sip.tab2') }}";
  const route3= "{{ route('sip.tab3') }}";
  const route4= "{{ route('sip.tab4') }}";
  const route5= "{{ route('sip.tab5') }}";
  
</script>

<script type="text/javascript" src="{{asset('js/user/sip-create.js')}}"></script>

<script type="text/javascript">
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