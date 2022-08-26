@extends('layouts.user.app')

@section('title', 'Buat SIK')

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
  Buat Surat Izin Kerja (SIK) </a>
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
                    <i class="flaticon-open-box"></i>
                  </div>
                  <div class="kt-wizard-v1__nav-label">
                    2) Data Perizinan (SIK)
                  </div>
                </div>
              </a>
              <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                <div class="kt-wizard-v1__nav-body">
                  <div class="kt-wizard-v1__nav-icon">
                    <i class="flaticon-home-2"></i>
                  </div>
                  <div class="kt-wizard-v1__nav-label">
                    3) Data Praktik
                  </div>
                </div>
              </a>
              <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                <div class="kt-wizard-v1__nav-body">
                  <div class="kt-wizard-v1__nav-icon">
                    <i class="flaticon-folder-3"></i>
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
          <form class="kt-form" id="kt_form" method="POST" action="{{route('sik.store')}}">
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
                <label class="col-lg-3 col-form-label">No HP:*</label>
                <div class="col-lg-9">
                  <input type="input" class="form-control" name="nohp" {{$required}}>
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
                    @foreach($data as $datas)
                    <option value="{{$datas->id}}">{{$datas->nama}}</option>
                    @endforeach
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
              <h4 class="font-size-lg text-dark font-weight-bold mb-6">Data Praktik</h4>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Nama Praktek:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="nama_praktek" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Kecamatan:*</label>
                <div class="col-lg-9">
                  <select class="form-control" name="kecamatan" id="kecamatan" onchange="show_kelurahan(this.value)">
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
                  <select class="form-control" name="kelurahan" id="kelurahan">
                    <option>--Pilih kelurahan--</option>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Jalan:*</label>
                <div class="col-lg-9">
                  <input type="text" class="form-control" name="jalan" {{$required}}>
                </div>
              </div> 
            </div>
            <!--end: Form Wizard Step 3-->

            <!--begin: Form Wizard Step 4-->
            <div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
              <h4 class="font-size-lg text-dark font-weight-bold mb-6">Upload Berkas</h4>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Foto KTP: (jpeg, jpg, png) max 1MB*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="ktp" accept="image/jpeg,image/jpg,image/png" {{$required}}>
                </div>

              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Pas Foto: (jpeg, jpg, png) max 1MB*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="foto" accept="image/jpeg,image/jpg,image/png">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Ijazah: (jpeg, jpg, png) max 1MB*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="ijazah" accept="image/jpeg,image/jpg,image/png">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">STR: (pdf) max 1MB*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="str" accept="application/pdf" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Rekomendasi Organisasi Profesi: (pdf) max 1MB*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="rekomendasi_org" accept="application/pdf" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Surat Keterangan Dari Pimpinan Fasilitas Pelayanan Kesehatan: (pdf) max 1MB*</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="surat_keterangan" accept="application/pdf" {{$required}}>
                </div>
              </div>

              <hr>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Surat Keterangan Keluasan (jika PNS): (pdf) max 1MB</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="surat_keluasan" accept="application/pdf" {{$required}}>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-3 col-form-label">Berkas Pendukung Lainnya: (pdf) max 1MB</label>
                <div class="col-lg-9">
                  <input type="file" class="form-control" name="berkas_pendukung" accept="application/pdf" {{$required}}>
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


@endsection

@section('page_script')
<script src="{{ asset('js/pages/custom/wizard/wizard-1.js') }}" type="text/javascript"></script>

<script type="text/javascript">

  $(document).ready(function () {
    var kec = $('#kecamatan').val();
    show_kelurahan(kec);
  });

      // menampilkan kelurahan1 setelah memilih kecamatan
      function show_kelurahan(kec) {
        $("#kelurahan").empty();
        $("#kelurahan").append("<option value=''>--Pilih kelurahan--</option>");
        // var id_provinsi = $('#provinsi').val();
        $.ajax({
          'url': "../../cek-kelurahan/" + kec,
          'dataType': 'json',
          // beforeSend: function(){
          //   $(".loader").css("display","block");
          // },
          success: function(data) {
            jQuery.each(data, function(i, val) {

              $('#kelurahan').append('<option value="' + val.id + '">' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
@endsection