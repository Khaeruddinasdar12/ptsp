@extends('layouts.user.app')

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

  <div class="row justify-content-center">
    <div class="col-md-12">
      @include('layouts.user.alert')
    </div>
  </div>

  <form class="horizontal-form" id="berkas-form" method="post">
    @csrf
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
            Detail Data Perizinan
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
            <li>Pesan Administrator : {{$data->ket}}</li>
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
        </div>
        <hr>


        <div class="row">
          <div class="col-md-6">
            <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Pribadi</h5>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Lengkap Sesuai STR:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="nama" value="{{old('nama',$data->sik->nama)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tempat Lahir:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="tempat_lahir" value="{{old('tempat_lahir', $data->sik->tempat_lahir)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Lahir:*</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="tanggal_lahir" value="{{old('tanggal_lahir', $data->sik->tanggal_lahir)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No HP:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="nohp" value="{{old('nohp',$data->sik->nohp)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Rumah:*</label>
              <div class="col-lg-9">
                <textarea class="form-control" name="alamat">{{old('alamat', $data->sik->alamat)}}</textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Perizinan</h5>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Surat Perizinan:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" value="Surat Izin Kerja (SIK)" readonly>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jenis Perizinan:*</label>
              <div class="col-lg-9">
                <select class="form-control" name="jenis_izin">
                  @foreach($subizin as $dt)
                  <option value="{{$dt->id}}" {{ old('jenis_izin', $data->sik->subizin_id) == $dt->id ? 'selected' : '' }}>{{$dt->nama}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. STR:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="no_str" value="{{old('no_str', $data->sik->no_str)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai Berlaku STR:*</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="awal_str" value="{{old('akhir_str', $data->sik->getRawOriginal('awal_str') )}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Berakhir STR:*</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="akhir_str" value="{{old('akhir_str', $data->sik->getRawOriginal('akhir_str') )}}">
              </div>
            </div>
          </div>
        </div>
        <hr> 

        <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Praktik</h5>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Nama Praktek:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="nama_praktek" value="{{old('nama_praktek', $data->sik->nama_praktek)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jalan:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="jalan" value="{{old('jalan', $data->sik->jalan)}}">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kecamatan:*</label>
              <div class="col-lg-9">
                <select class="form-control" name="kecamatan" id="kecamatan" onchange="show_kelurahan(this.value)">
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
              </div>
            </div>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kelurahan:*</label>
              <div class="col-lg-9">
                <select class="form-control" name="kelurahan" id="kelurahan">
                  <option></option>
                </select>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <h5 class="font-size-lg text-dark font-weight-bold mb-6">Lampiran Berkas</h5>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto KTP: (jpg, jpeg, pdf) max 1MB*</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" name="ktp">
              </div>
            </div>
            <img src="{{ asset('storage/'.$data->sik->ktp) }}" class="rounded img-fluid" alt="..." alt="..." height="100px" width="120px">
          </div>
          <div class="col-md-6 text-center">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Pas Foto: (jpg, jpeg, pdf) max 1MB*</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" name="foto">
              </div>
            </div>
            <img src="{{ asset('storage/'.$data->sik->foto) }}" class="rounded img-fluid" alt="..." alt="..." height="100px" width="120px">
          </div>
          <div class="col-md-6 text-center">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Ijazah: (jpg, jpeg, pdf) max 1MB*</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" name="ijazah">
              </div>
            </div>
            <img src="{{ asset('storage/'.$data->sik->ijazah) }}" class="rounded img-fluid" alt="..." alt="..." height="100px" width="120px">
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-2 col-form-label">STR: (pdf) max 1MB*</label>
          <div class="col-lg-4">
            <input type="file" class="form-control" name="str">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <embed src="{{asset('storage/'.$data->sik->str)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
            </div>
          </div>
          <hr>
          <hr>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Rekomendasi Organisasi Profesi: (pdf) max 1MB*</label>
            <div class="col-lg-4">
              <input type="file" class="form-control" name="rekomendasi_org">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <embed src="{{asset('storage/'.$data->sik->rekomendasi_org)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
              </div>
            </div>
            <hr>
            <hr>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Surat Keterangan Pelayanan Kesehatan: (pdf) max 1MB*</label>
              <div class="col-lg-4">
                <input type="file" class="form-control" name="surat_keterangan">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <embed src="{{asset('storage/'.$data->sik->surat_keterangan)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                </div>
              </div>
              <hr>
              <hr>
              <!-- Surat Persetujuan Pimpinan -->
              @if($data->sik->keluasan)
              <h5 class="font-size-lg text-dark font-weight-bold mb-6">File Surat Keterangan Pelayanan Kesehatan</h5>
              <div class="row">
                <div class="col-md-12 text-center">
                  <embed src="{{asset('storage/'.$data->sik->surat_keluasan)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                  </div>
                </div>
                <hr>
                @endif


                <!-- Berkas Pendukung -->
                @if($data->sik->berkas_pendukung)
                <h5 class="font-size-lg text-dark font-weight-bold mb-6">Berkas Pendukung</h5>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <embed src="{{asset('storage/'.$data->sik->berkas_pendukung)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                    </div>
                  </div>
                  <hr>
                  @endif

                </div>
              </div>
            </form>
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
                  var request = new FormData(document.getElementById("berkas-form"));
                  var endpoint= "{{route('sik.update', ['no_tiket' => $data->no_tiket])}}";
                  $.ajax({
                    url: endpoint,
                    method: "POST",
                    data: request,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success:function(data){
                      if(data.status == 'success') {
                        successToRelaoad(data.status, data.pesan);
                      } else {
                        berhasil(data.status, data.pesan);
                      }
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
