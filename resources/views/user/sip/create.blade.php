@extends('layouts.user.app')

@section('title', 'Buat SIP')

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
          <!--begin: Form Wizard Nav -->
          <div class="kt-wizard-v1__nav">
            <div class="kt-wizard-v1__nav-items">
              <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step" data-ktwizard-state="current">
                <div class="kt-wizard-v1__nav-body">
                  <div class="kt-wizard-v1__nav-icon">
                    <i class="flaticon-user-settings"></i>
                  </div>
                  <div class="kt-wizard-v1__nav-label">
                    1) Data Pribadi
                  </div>
                </div>
              </a>
              <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                <div class="kt-wizard-v1__nav-body">
                  <div class="kt-wizard-v1__nav-icon">
                    <i class="flaticon-home-2"></i>
                  </div>
                  <div class="kt-wizard-v1__nav-label">
                    2) Data Perizinan (SIP)
                  </div>
                </div>
              </a>
              <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                <div class="kt-wizard-v1__nav-body">
                  <div class="kt-wizard-v1__nav-icon">
                    <i class="flaticon-profile-1"></i>
                  </div>
                  <div class="kt-wizard-v1__nav-label">
                    3) Alamat Praktik
                  </div>
                </div>
              </a>
              <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                <div class="kt-wizard-v1__nav-body">
                  <div class="kt-wizard-v1__nav-icon">
                    <i class="flaticon-user"></i>
                  </div>
                  <div class="kt-wizard-v1__nav-label">
                    4) Upload Berkas
                  </div>
                </div>
              </a>           
            </div>
          </div>
          <!--end: Form Wizard Nav -->

        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">
          @php $required = ""; @endphp
          <!--begin: Form Wizard Form-->
          <form class="kt-form" id="kt_form" method="POST" action="{{route('sip.store')}}">
            @csrf
            <!--begin: Form Wizard Step 1-->
            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
              <h4 class="font-size-lg text-dark font-weight-bold mb-6">Data Pribadi</h4>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Lengkap Sesuai STR:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="nama" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tempat Lahir:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="tempat_lahir" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Lahir:*</label>
                <div class="col-lg-9">
                  <input type="date" class="form-control" name="tanggal_lahir" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Alamat Rumah:*</label>
                <div class="col-lg-9">
                  <textarea class="form-control" name="alamat"></textarea>
                </div>
              </div>
            </div>
            <!--end: Form Wizard Step 1-->

            <!--begin: Form Wizard Step 2-->
            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
              <h4 class="font-size-lg text-dark font-weight-bold mb-6">Data Perizinan</h4>

              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jenis Perizinan:*</label>
                <div class="col-lg-9">
                  <select class="form-control" name="jenis_izin" {{$required}}>
                    <option value="Dokter">Dokter</option>
                    <option value="Dokter Spesialis">Dokter Spesialis</option>
                    <option value="Dokter Gigi">Dokter Gigi</option>
                    <option value="Dokter Gigi Spesialis">Dokter Gigi Spesialis</option>
                    <option value="Dokter Internis">Dokter Internis</option>
                    <option value="Teknisi Kardiovaskuler">Teknisi Kardiovaskuler</option>
                    <option value="Apoteker">Apoteker</option>
                    <option value="Asisten Apoteker">Asisten Apoteker</option>
                    <option value="Pranata Laboratorium Kesehatan">Pranata Laboratorium Kesehatan</option>
                    <option value="Psikolog Klinik">Psikolog Klinik</option>
                    <option value="Teknik Elektromedik">Teknik Elektromedik</option>
                    <option value="Fisioterapis">Fisioterapis</option>
                    <option value="Terdaftar Penyehat Tradiosional">Terdaftar Penyehat Tradiosional</option>
                    <option value="Bidan Praktek Mandiri">Bidan Praktek Mandiri</option>
                    <option value="Fisioterapi Praktek Mandiri (Nos OSS)">Fisioterapi Praktek Mandiri (Nos OSS)</option>

                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">No. STR:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="no_str" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Mulai Berlaku STR:*</label>
                <div class="col-lg-9">
                  <input type="date" class="form-control" name="awal_str" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Tanggal Berakhir STR:*</label>
                <div class="col-lg-9">
                  <input type="date" class="form-control" name="akhir_str" {{$required}}>
                </div>
              </div>
            </div>
            <!--end: Form Wizard Step 2-->

            <!--begin: Form Wizard Step 3-->
            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
              <h4 class="font-size-lg text-dark font-weight-bold mb-6">Alamat Praktik</h4>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jalan:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="jalan1" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kelurahan:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kelurahan1" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kecamatan1" {{$required}}>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jalan:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="jalan2" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kelurahan:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kelurahan2" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kecamatan:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kecamatan2" {{$required}}>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jalan:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="jalan3" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kelurahan:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kelurahan3" >
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kecamatan:</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="kecamatan3" {{$required}}>
                </div>
              </div>
            </div>
            <!--end: Form Wizard Step 3-->

            <!--begin: Form Wizard Step 4-->
            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
              <h4 class="font-size-lg text-dark font-weight-bold mb-6">Upload Berkas</h4>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Foto KTP:*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="ktp" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pas Foto:*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="foto">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">STR:*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="str" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Rekomendasi IDI:*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="rekomendasi_idi" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Surat Keterangan Pelayanan Kesehatan:</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="surat_keterangan" {{$required}}>
                </div>
              </div>
              <hr>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Surat Persetujuan Pimpinan Instansi:</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="surat_persetujuan" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Berkas Pendukung Lainnya:</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="pelengkap" {{$required}}>
                </div>
              </div>
            </div>
            <!--end: Form Wizard Step 4-->

            <!--begin: Form Actions -->         
            <div class="kt-form__actions">
              <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                Sebelumnya
              </div>
              <button class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit" type="submit">
                Submit
              </button>
              <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                Selanjutnya
              </div>
            </div>    
            <!--end: Form Actions -->
          </form>     
          <!--end: Form Wizard Form-->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Validity -->
<div class="modal fade bd-example-modal" id="modal-validity" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Data Santri Serupa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <p id="pesan"></p>
        <table id="table">
          <tr>
            <td>Nis </td>
            <td> : </td>
            <td id="nis"></td>
          </tr>
          <tr>
            <td>Nama </td>
            <td> : </td>
            <td id="nama"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

@endsection

@section('page_script')
<script src="{{ asset('js/pages/custom/wizard/wizard-1.js') }}" type="text/javascript"></script>

<script type="text/javascript">

</script>
@endsection