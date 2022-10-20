@extends('layouts.user.app')

@section('title', 'Buat Izin KRK')

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
  Buat Surat Izin Keterangan Rencana Kota (KRK) </a>
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
                      <span class="nav-text">Data Pertanahan</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3">
                      <span class="nav-icon"><i class="fa fa-home"></i></span>
                      <span class="nav-text">Data Alamat</span>
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
                      <form action="{{route('krk.tab1')}}" method="POST" id="tab1">
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Gelar Awal:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="gelar_awal" value="@if($old){{$old->krk->gelar_awal}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Pemohon:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama" value="@if($old){{$old->krk->nama}}@endif" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Gelar Akhir:</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="gelar_akhir" value="@if($old){{$old->krk->gelar_akhir}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nomor KTP (NIK):*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nik" value="@if($old){{$old->krk->nik}}@endif">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nomor HP:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nohp" value="@if($old){{$old->krk->nohp}}@endif">
                          </div>
                        </div> 
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Alamat Pemohon:*</label>
                          <div class="col-lg-9">
                            <textarea class="form-control" name="alamat" >@if($old){{$old->krk->alamat}}@endif</textarea>
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

                <script type="text/javascript">
                  kel_id = null;
                </script>
                @if($old && $old->krk && $old->krk->klh)
                <script type="text/javascript">
                  kel_id = '{!! $old->krk->klh->id !!}';
                </script>
                @php $kec = $old->krk->klh->kecamatan; @endphp
                @else
                @php $kec=null; @endphp
                @endif

                <!-- TAB 2 -->
                <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                 <div class="container">
                  <form method="POST" action="{{route('krk.tab2')}}" id="tab2">
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Surat Tanah/Luasan Tanah/ : SHM / HGB / Akta Jual Beli (m<sup>2</sup>) *</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="luas" value="@if($old){{$old->krk->luas}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nama Pada Surat Tanah:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="nama_surat" value="@if($old){{$old->krk->nama_surat}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nomor/Tanggal Pada Surat Tanah:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="nomor_surat" value="@if($old){{$old->krk->nomor_surat}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Penggunaan/Fungsi Bangunan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="penggunaan">
                          <option value="Rumah Tinggal" @if($old && $old->krk->penggunaan == 'Rumah Tinggal') selected @endif>Rumah Tinggal</option>
                          <option value="Perumahan" @if($old && $old->krk->penggunaan == 'Perumahan') selected @endif>Perumahan</option>
                          <option value="Perkantoran" @if($old && $old->krk->penggunaan == 'Perkantoran') selected @endif>Perkantoran</option>
                          <option value="Perkantoran/kantor" @if($old && $old->krk->penggunaan == 'Perkantoran/kantor') selected @endif>Perkantoran/kantor</option>
                          <option value="Bank" @if($old && $old->krk->penggunaan == 'Bank') selected @endif>Bank</option>
                          <option value="Pertokoan/toko" @if($old && $old->krk->penggunaan == 'Pertokoan/toko') selected @endif>Pertokoan/toko</option>
                          <option value="Mall" @if($old && $old->krk->penggunaan == 'Mall') selected @endif>Mall</option>
                          <option value="Gudang" @if($old && $old->krk->penggunaan == 'Gudang') selected @endif>Gudang</option>
                          <option value="Hotel" @if($old && $old->krk->penggunaan == 'Hotel') selected @endif>Hotel</option>
                          <option value="Rumah Kost" @if($old && $old->krk->penggunaan == 'Rumah Kost') selected @endif>Rumah Kost</option>
                          <option value="Sekolah" @if($old && $old->krk->penggunaan == 'Sekolah') selected @endif>Sekolah</option>
                          <option value="Rumah Sakit" @if($old && $old->krk->penggunaan == 'Rumah Sakit') selected @endif>Rumah Sakit</option>
                          <option value="Rumah Ibadah" @if($old && $old->krk->penggunaan == 'Rumah Ibadah') selected @endif>Rumah Ibadah</option>
                          <option value="Pelataran" @if($old && $old->krk->penggunaan == 'Pelataran') selected @endif>Pelataran</option>
                          <option value="Pagar" @if($old && $old->krk->penggunaan == 'Pagar') selected @endif>Pagar</option>  
                          <option value="Menara" @if($old && $old->krk->penggunaan == 'Menara') selected @endif>Menara</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jenis Bangunan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="jenis">
                          <option value="Membangun Baru" @if($old && $old->krk->jenis == 'Membangun Baru') selected @endif>Membangun Baru</option>
                          <option value="Menambah" @if($old && $old->krk->jenis == 'Menambah') selected @endif>Menambah</option>
                          <option value="Merenovasi" @if($old && $old->krk->jenis == 'Merenovasi') selected @endif>Merenovasi</option>
                          <option value="Pemutihan" @if($old && $old->krk->jenis == 'Pemutihan') selected @endif>Pemutihan</option>
                          <option value="Balik Nama" @if($old && $old->krk->jenis == 'Balik Nama') selected @endif>Balik Nama</option>
                          <option value="Pergantian/salinan Izin" @if($old && $old->krk->jenis == 'Pergantian/salinan Izin') selected @endif>Pergantian/salinan Izin</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jumlah Lantai:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="jml_lantai" value="@if($old){{$old->krk->jml_lantai}}@endif">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jumlah Bangunan:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="jml_bangunan" value="@if($old){{$old->krk->jml_bangunan}}@endif">
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
              @if($old && $old->krk && $old->krk->klh)
              <script type="text/javascript">
                kel_id = '{!! $old->krk->klh->id !!}';
              </script>
              @php $kec = $old->krk->klh->kecamatan; @endphp
              @else
              @php $kec=null; @endphp
              @endif

              <!-- TAB 3 -->
              <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                <div class="container">
                  <form action="{{route('krk.tab3')}}" method="POST" id="tab3">@csrf
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kecamatan" id="kecamatan" onchange="show_kelurahan1(this.value)" required>
                          <option value=''>--Pilih kecamatan--</option>
                          <option value="Biringkanaya" @if($kec == 'Biringkanaya') selected @endif>Biringkanaya</option>
                          <option value="Bontoala" @if($kec == 'Bontoala') selected @endif>Bontoala</option>
                          <option value="Kepulauan Sangkarrang" @if($kec == 'Kepulauan Sangkarrang') selected @endif>Kepulauan Sangkarrang</option>
                          <option value="Makassar" @if($kec == 'Makassar') selected @endif>Makassar</option>
                          <option value="Mamajang" @if($kec == 'Mamajang') selected @endif>Mamajang</option>
                          <option value="Manggala" @if($kec == 'Manggala') selected @endif>Manggala</option>
                          <option value="Mariso" @if($kec == 'Mariso') selected @endif>Mariso</option>
                          <option value="Panakkukang" @if($kec == 'Panakkukang') selected @endif>Panakkukang</option>
                          <option value="Rappocini" @if($kec == 'Rappocini') selected @endif>Rappocini</option>
                          <option value="Tallo" @if($kec == 'Tallo') selected @endif>Tallo</option>
                          <option value="Tamalanrea" @if($kec == 'Tamalanrea') selected @endif>Tamalanrea</option>
                          <option value="Tamalate" @if($kec == 'Tamalate') selected @endif>Tamalate</option>
                          <option value="Ujung Pandang" @if($kec == 'Ujung Pandang') selected @endif>Ujung Pandang</option>
                          <option value="Ujung Tanah" @if($kec == 'Ujung Tanah') selected @endif>Ujung Tanah</option>
                          <option value="Wajo" @if($kec == 'Wajo') selected @endif>Wajo</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Kelurahan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jalan:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="jalan" value="@if($old){{$old->krk->jalan}}@endif" required>
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
                    <label class="col-lg-3 col-form-label">Foto KTP Pemohon: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('krk.tab4')}}" method="POST" id="ktp">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="ktp" id="file-ktp" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-ktp" class="form-control" id="label-ktp">@if($old && $old->krk->ktp)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="ktp" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      
                      <div id="reload-ktp">
                        @if($old && $old->krk->ktp)
                        <a href="{{asset('storage/'.$old->krk->ktp)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">PBB Terakhir: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="" method="POST" id="pbb">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="pbb" id="file-pbb" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-pbb" class="form-control" id="label-pbb">@if($old && $old->krk->pbb)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="pbb">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-pbb">
                        @if($old && $old->krk->pbb)
                        <a href="{{asset('storage/'.$old->krk->pbb)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Surat Tanah: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="" method="POST" id="surat_tanah">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="surat_tanah" id="file-surat_tanah" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-surat_tanah" class="form-control" id="label-surat_tanah">@if($old && $old->krk->surat_tanah)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="surat_tanah">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-surat_tanah">
                        @if($old && $old->krk->surat_tanah)
                        <a href="{{asset('storage/'.$old->krk->surat_tanah)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Peta Lokasi (Koordinat X dan Y): (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="" method="POST" id="peta">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="peta" id="file-peta" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-peta" class="form-control" id="label-peta">@if($old && $old->krk->peta)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="peta">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-peta">
                        @if($old && $old->krk->peta)
                        <a href="{{asset('storage/'.$old->krk->peta)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Gambar Bangunan Rencana: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="" method="POST" id="gambar">
                        <div class="input-group">
                          @csrf
                          <input type="file" name="gambar" id="file-gambar" style="display:none;" accept="image/jpeg,image/jpg,image/png">
                          <label for="file-gambar" class="form-control" id="label-gambar">@if($old && $old->krk->gambar)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="gambar">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-gambar">
                        @if($old && $old->krk->gambar)
                        <a href="{{asset('storage/'.$old->krk->gambar)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Berkas Pendukung: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form id="berkas_pendukung">
                        <div class="input-group">
                          @csrf
                          <!-- <input type="file" class="form-control" name="berkas_pendukung" accept="application/pdf" required> -->
                          <input type="file" name="berkas_pendukung" id="file-berkas_pendukung" style="display:none;" accept="application/pdf">
                          <label for="file-berkas_pendukung" class="form-control" id="label-berkas_pendukung">@if($old && $old->krk->berkas_pendukung)Berkas Telah Diupload - Klik untuk mengubah @else Choose File @endif</label>
                          <input type="hidden" class="form-control" name="key" value="berkas_pendukung">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-berkas_pendukung">
                        @if($old && $old->krk->berkas_pendukung)
                        <a href="{{asset('storage/'.$old->krk->berkas_pendukung)}}" target="_blank">Lihat berkas</a>
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
@if($old && $old->krk)
<script type="text/javascript">
  krk_id = '{!! $old->krk->id !!}';
</script>
@else
<script type="text/javascript">
  krk_id = null;
</script>
@endif

@section('page_script')
<script type="text/javascript">

  const route1= "{{ route('krk.tab1') }}";
  const route2= "{{ route('krk.tab2') }}";
  const route3= "{{ route('krk.tab3') }}";
  const route4= "{{ route('krk.tab4') }}";
  const route5= "{{ route('krk.tab5') }}";
  
</script>

<script type="text/javascript" src="{{asset('js/user/krk-create.js')}}"></script>

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