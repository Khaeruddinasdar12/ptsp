@extends('layouts.user.app')

@section('title', 'Buat Izin Kerja')

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
  Buat Surat Izin Kerja </a>
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
                      <span class="nav-text">Data Perizinan (SIK)</span>
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
                      <form action="{{route('sik.tab1')}}" method="POST" id="tab1">
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Lengkap Sesuai STR:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama" value="@if($old){{$old->sik->nama}}@endif" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Tempat Lahir:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="tempat_lahir" value="@if($old){{$old->sik->tempat_lahir}}@endif" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Tanggal Lahir:*</label>
                          <div class="col-lg-9">
                            <input type="date" class="form-control" name="tanggal_lahir" value="@if($old){{$old->sik->tanggal_lahir}}@endif" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">No HP:*</label>
                          <div class="col-lg-9">
                            <input type="input" class="form-control" name="nohp" value="@if($old){{$old->sik->nohp}}@endif" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Alamat Rumah:*</label>
                          <div class="col-lg-9">
                            <textarea class="form-control" name="alamat" required>@if($old){{$old->sik->alamat}}@endif</textarea>
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
                  <form method="POST" action="{{route('sik.tab2')}}" id="tab2">
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jenis Perizinan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="jenis_izin" required>
                          @foreach($data as $datas)
                          <option value="{{$datas->id}}" @if($old && $old->sik->subizin_id == $datas->id) selected @endif>{{$datas->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">No. Rekomondasi OP:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="rekomendasi_op" value="@if($old){{$old->sik->rekomendasi_op}}@endif" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">No. STR:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="no_str" value="@if($old){{$old->sik->no_str}}@endif" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanggal Mulai Berlaku STR:*</label>
                      <div class="col-lg-9">
                        <input type="date" class="form-control" name="awal_str" value="@if($old){{$old->sik->awal_str}}@endif" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Tanggal Berakhir STR:*</label>
                      <div class="col-lg-9">
                        <input type="date" class="form-control" name="akhir_str" value="@if($old){{$old->sik->akhir_str}}@endif" required>
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
                  <form method="POST" id="tab3">                    
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nama Praktek:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="nama_praktek" value="@if($old){{$old->sik->nama_praktek}}@endif" required>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kecamatan" id="kecamatan" onchange="show_kelurahan(this.value)" required>
                          <option value="Biringkanaya" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Biringkanaya') selected @endif>Biringkanaya</option>
                          <option value="Bontoala" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Bontoala') selected @endif>Bontoala</option>
                          <option value="Kepulauan Sangkarrang" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                          <option value="Makassar" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Makassar') selected @endif>Makassar</option>
                          <option value="Mamajang" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Mamajang') selected @endif>Mamajang</option>
                          <option value="Manggala" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Manggala') selected @endif>Manggala</option>
                          <option value="Mariso" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Mariso') selected @endif>Mariso</option>
                          <option value="Panakkukang" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Panakkukang') selected @endif>Panakkukang</option>
                          <option value="Rappocini" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Rappocini') selected @endif>Rappocini</option>
                          <option value="Tallo" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Tallo') selected @endif>Tallo</option>
                          <option value="Tamalanrea" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Tamalanrea') selected @endif>Tamalanrea</option>
                          <option value="Tamalate" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Tamalate') selected @endif>Tamalate</option>
                          <option value="Ujung Pandang" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                          <option value="Ujung Tanah" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                          <option value="Wajo" @if($old && $old->sik && $old->sik->klh && $old->sik->klh->kecamatan == 'Wajo') selected @endif>Wajo</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kelurahan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                          <option>--Pilih kelurahan--</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jalan:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="jalan" value="@if($old){{$old->sik->jalan}}@endif" required>
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
                      <form action="{{route('sik.tab4')}}" method="POST" id="ktp">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="ktp" id="file-ktp" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-ktp" class="form-control" id="label-ktp">@if($old && $old->sik->ktp)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="ktp" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-ktp">
                        @if($old && $old->sik->ktp)
                        <a href="{{asset('storage/'.$old->sik->ktp)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Pas Foto: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="foto">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="foto" id="file-foto" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-foto" class="form-control" id="label-foto">@if($old && $old->sik->foto)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="foto" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-foto">
                        @if($old && $old->sik->foto)
                        <a href="{{asset('storage/'.$old->sik->foto)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Ijazah: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="ijazah">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="ijazah" id="file-ijazah" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-ijazah" class="form-control" id="label-ijazah">@if($old && $old->sik->ijazah)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="ijazah" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-ijazah">
                        @if($old && $old->sik->ijazah)
                        <a href="{{asset('storage/'.$old->sik->ijazah)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">STR: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="str">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="str" id="file-str" style="display:none;" accept="application/pdf">
                          <label for="file-str" class="form-control" id="label-str">@if($old && $old->sik->str)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="str" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-str">
                        @if($old && $old->sik->str)
                        <a href="{{asset('storage/'.$old->sik->str)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Rekomendasi Organisasi Profesi: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="rekomendasi_org">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="rekomendasi_org" id="file-rekomendasi_org" style="display:none;" accept="application/pdf">
                          <label for="file-rekomendasi_org" class="form-control" id="label-rekomendasi_org">@if($old && $old->sik->rekomendasi_org)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="rekomendasi_org" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-rekomendasi_org">
                        @if($old && $old->sik->rekomendasi_org)
                        <a href="{{asset('storage/'.$old->sik->rekomendasi_org)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Surat Keterangan Dari Pimpinan Fasilitas Pelayanan Kesehatan: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="surat_keterangan">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="surat_keterangan" id="file-surat_keterangan" style="display:none;" accept="application/pdf">
                          <label for="file-surat_keterangan" class="form-control" id="label-surat_keterangan">@if($old && $old->sik->surat_keterangan)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="surat_keterangan" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-surat_keterangan">
                        @if($old && $old->sik->surat_keterangan)
                        <a href="{{asset('storage/'.$old->sik->surat_keterangan)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <hr>
                  <h6>Opsional</h6>
                  <hr>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Surat Keterangan Keluasan (jika PNS): (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="surat_keluasan">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="surat_keluasan" id="file-surat_keluasan" style="display:none;" accept="application/pdf">
                          <label for="file-surat_keluasan" class="form-control" id="label-surat_keluasan">@if($old && $old->sik->surat_keluasan)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="surat_keluasan" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-surat_keluasan">
                        @if($old && $old->sik->surat_keluasan)
                        <a href="{{asset('storage/'.$old->sik->surat_keluasan)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Berkas Pendukung Lainnya: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form action="{{route('sik.tab4')}}" method="POST" id="berkas_pendukung">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="berkas_pendukung" id="file-berkas_pendukung" style="display:none;" accept="application/pdf">
                          <label for="file-berkas_pendukung" class="form-control" id="label-berkas_pendukung">@if($old && $old->sik->berkas_pendukung)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="berkas_pendukung" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-berkas_pendukung">
                        @if($old && $old->sik->berkas_pendukung)
                        <a href="{{asset('storage/'.$old->sik->berkas_pendukung)}}" target="_blank">Lihat berkas</a>
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
  kel_id = null;
</script>
@if($old && $old->sik && $old->sik->klh)
<script type="text/javascript">
  kel_id = '{!! $old->sik->klh->id !!}';
</script>
@php $kec = $old->sik->klh->kecamatan; @endphp
@else
@php $kec=null; @endphp
@endif

<script type="text/javascript">
  jenis_izin_old = null;
  id_jenis_izin_old = null;
</script>
@if($old && $old->sik && $old->sik->subizin)
<script type="text/javascript">
  jenis_izin_old = '{!! $old->sik->subizin->nama !!}';
  id_jenis_izin_old = '{!! $old->sik->subizin->id !!}';
  sik_id = '{!! $old->sik->id !!}';
</script>
@else
<script type="text/javascript">
  sik_id = null;
</script>
@endif

@section('page_script')
<script type="text/javascript">

  const route1= "{{ route('sik.tab1') }}";
  const route2= "{{ route('sik.tab2') }}";
  const route3= "{{ route('sik.tab3') }}";
  const route4= "{{ route('sik.tab4') }}";
  const route5= "{{ route('sik.tab5') }}";
  
</script>

<script type="text/javascript" src="{{asset('js/user/sik-create.js')}}"></script>

<script type="text/javascript">

  $(document).ready(function () {
    var kec = $('#kecamatan').val();
    show_kelurahan(kec);
  });

      // menampilkan kelurahan1 setelah memilih kecamatan
      function show_kelurahan(kec) {
        $("#kelurahan").empty();
        // var id_provinsi = $('#provinsi').val();
        $.ajax({
          'url': "../../cek-kelurahan/" + kec,
          'dataType': 'json',
          // beforeSend: function(){
          //   $(".loader").css("display","block");
          // },
          success: function(data) {
            jQuery.each(data, function(i, val) {
              if(val.id == kel_id) {
                check = 'selected';
              } else {
                check = '';
              }
              $('#kelurahan').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
            });
            // $(".loader").css("display","none");
          },
          error: function(xhr, status, error) {
            var error = xhr.responseJSON;
            if ($.isEmptyObject(error) == false) {
              $.each(error.errors, function(key, value) {
                // toastgagal(key, value);
                alert(key + value);
              });
              // $(".loader").css("display","none");
            }
          }
        })
      }
  //end menampilkan kelurahan setelah memilih kecamatan

</script>

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