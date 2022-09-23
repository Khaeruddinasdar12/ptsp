@extends('layouts.user.app')

@section('title', 'Buat Izin Pendidikan')

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
  Buat Surat Izin Pendidikan </a>
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
                      <span class="nav-text">Data Perizinan Pendidikan</span>
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
                      <form action="{{route('pendidikan.tab1')}}" method="POST" id="tab1">
                        @csrf
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nama Penanggung Jawab:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nama" value="@if($old){{$old->pendidikan->nama}}@endif" >
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Nomor HP:*</label>
                          <div class="col-lg-9">
                            <input type="text" class="form-control" name="nohp" value="@if($old){{$old->pendidikan->nohp}}@endif">
                          </div>
                        </div> 
                        <div class="form-group row">
                          <label class="col-lg-3 col-form-label">Alamat Rumah:*</label>
                          <div class="col-lg-9">
                            <textarea class="form-control" name="alamat" >@if($old){{$old->pendidikan->alamat}}@endif</textarea>
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
                  <form method="POST" action="{{route('pendidikan.tab2')}}" id="tab2">
                    @csrf
                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Jenis Perizinan:*</label>
                      <div class="col-lg-9">
                        <select class="form-control" id="jenis_izin" onchange="jenis(this.value)" name="jenis_izin">
                          <option value="">pilih jenis perizinan</option>
                          @foreach($data as $datas)
                          <option value="{{$datas->nama}}" @if($old && $old->pendidikan && $old->pendidikan->subizin->nama == $datas->nama)selected @endif>{{$datas->nama}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>

                    <div class="form-group row" style="display: none;" id="layout-kategori">
                      <label class="col-lg-3 col-form-label">Kategori:*</label>
                      <div class="col-lg-9" id="kategori">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-lg-3 col-form-label">Nama Pendidikan:*</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" name="nama_pendidikan" value="@if($old){{$old->pendidikan->nama_pendidikan}}@endif">
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
              @if($old && $old->pendidikan && $old->pendidikan->klh)
              <script type="text/javascript">
                kel_id = '{!! $old->pendidikan->klh->id !!}';
              </script>
              @php $kec = $old->pendidikan->klh->kecamatan; @endphp
              @else
              @php $kec=null; @endphp
              @endif

              <!-- TAB 3 -->
              <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                <div class="container">
                  <form action="{{route('pendidikan.tab3')}}" method="POST" id="tab3">@csrf
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
                        <input type="text" class="form-control" name="jalan" value="@if($old){{$old->pendidikan->jalan}}@endif" required>
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
                    <label class="col-lg-3 col-form-label">Foto KTP Penanggung Jawab: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="{{route('pendidikan.tab4')}}" method="POST" id="ktp">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="ktp" required accept="image/jpeg,image/jpg,image/png">
                          <input type="hidden" class="form-control" name="key" value="ktp" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      
                      <div id="reload-ktp">
                        @if($old && $old->pendidikan->ktp)
                        <a href="{{asset('storage/'.$old->pendidikan->ktp)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                      
                    </div>

                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Pas Foto Penanggung Jawab: (jpeg, jpg, png) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="" method="POST" id="foto">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="foto" required accept="image/png, image/gif, image/jpeg">
                          <input type="hidden" class="form-control" name="key" value="foto">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>

                      <div id="reload-foto">
                        @if($old && $old->pendidikan->pas_foto)
                        <a href="{{asset('storage/'.$old->pendidikan->pas_foto)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Akta Pendirian Yayasan: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form action="" method="POST" id="akta">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="akta" required accept="application/pdf">
                          <input type="hidden" class="form-control" name="key" value="akta">
                          <button type="submit" class="btn btn-outline-secondary">Simpan 
                          </button>
                        </div>
                      </form>

                      <div id="reload-akta">
                        @if($old && $old->pendidikan->akta)
                        <a href="{{asset('storage/'.$old->pendidikan->akta)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Kurikulum: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form id="kurikulum">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="kurikulum" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="kurikulum" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>

                      <div id="reload-kurikulum">
                        @if($old && $old->pendidikan->kurikulum)
                        <a href="{{asset('storage/'.$old->pendidikan->kurikulum)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Struktur Organisasi: (pdf) max 1MB*</label>
                    <div class="col-lg-9">
                      <form id="struktur-organisasi">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="struktur_organisasi" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="struktur_organisasi" >
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-struktur-organisasi">
                        @if($old && $old->pendidikan->struktur_organisasi)
                        <a href="{{asset('storage/'.$old->pendidikan->struktur_organisasi)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">SK Penanggung Jawab Dan Pengajar: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form id="sk">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="sk" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="sk">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-sk">
                        @if($old && $old->pendidikan->sk)
                        <a href="{{asset('storage/'.$old->pendidikan->sk)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Sertifikat Tanah / Surat Perjanjian Sewa: (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form id="sertifikat-tanah">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="sertifikat_tanah" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="sertifikat_tanah">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-sertifikat-tanah">
                        @if($old && $old->pendidikan->sertifikat_tanah)
                        <a href="{{asset('storage/'.$old->pendidikan->sertifikat_tanah)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Nomor Induk Berusaha (NIB): (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form id="nib">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="nib" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="nib">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-nib">
                        @if($old && $old->pendidikan->nib)
                        <a href="{{asset('storage/'.$old->pendidikan->nib)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <!-- OPSIONAL -->
                  <hr>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">NPSN (Perpanjangan): (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form id="npsn">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="npsn" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="npsn">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-npsn">
                        @if($old && $old->pendidikan->npsn)
                        <a href="{{asset('storage/'.$old->pendidikan->npsn)}}" target="_blank">Lihat berkas</a>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-lg-3 col-form-label">Izin Lama (Perpanjangan): (pdf) max 1MB</label>
                    <div class="col-lg-9">
                      <form id="izin_lama">
                        <div class="input-group">
                          @csrf
                          <input type="file" class="form-control" name="izin_lama" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="izin_lama">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-izin_lama">
                        @if($old && $old->pendidikan->izin_lama)
                        <a href="{{asset('storage/'.$old->pendidikan->izin_lama)}}" target="_blank">Lihat berkas</a>
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
                          <input type="file" class="form-control" name="berkas_pendukung" accept="application/pdf" required>
                          <input type="hidden" class="form-control" name="key" value="berkas_pendukung">
                          <button type="submit" class="btn btn-outline-secondary">Simpan
                          </button>
                        </div>
                      </form>
                      <div id="reload-berkas_pendukung">
                        @if($old && $old->pendidikan->berkas_pendukung)
                        <a href="{{asset('storage/'.$old->pendidikan->berkas_pendukung)}}" target="_blank">Lihat berkas</a>
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
@if($old && $old->pendidikan && $old->pendidikan->subizin)
<script type="text/javascript">
  jenis_izin_old = '{!! $old->pendidikan->subizin->nama !!}';
  id_jenis_izin_old = '{!! $old->pendidikan->subizin->id !!}';
  pendidikan_id = '{!! $old->pendidikan->id !!}';
</script>
@endif

@section('page_script')
<script type="text/javascript">

  const route1= "{{ route('pendidikan.tab1') }}";
  const route2= "{{ route('pendidikan.tab2') }}";
  const route3= "{{ route('pendidikan.tab3') }}";
  const route4= "{{ route('pendidikan.tab4') }}";
  const route5= "{{ route('pendidikan.tab5') }}";
  
</script>

<script type="text/javascript" src="{{asset('js/user/pendidikan-create.js')}}"></script>

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