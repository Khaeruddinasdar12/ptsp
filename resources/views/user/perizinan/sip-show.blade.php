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
                <input type="text" class="form-control" name="nama" value="{{old('nama',$data->sip->nama)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tempat Lahir:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="tempat_lahir" value="{{old('tempat_lahir', $data->sip->tempat_lahir)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Lahir:*</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="tanggal_lahir" value="{{old('tanggal_lahir', $data->sip->tanggal_lahir)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Alamat Rumah:*</label>
              <div class="col-lg-9">
                <textarea class="form-control" name="alamat">{{old('alamat', $data->sip->alamat)}}</textarea>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Perizinan</h5>

            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jenis Perizinan:*</label>
              <div class="col-lg-9">
                <select class="form-control" name="jenis_izin">
                  <option value="Dokter" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                  <option value="Dokter Spesialis" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Dokter Spesialis' ? 'selected' : '' }}>Dokter Spesialis</option>
                  <option value="Dokter Gigi" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Dokter Gigi' ? 'selected' : '' }}>Dokter Gigi</option>
                  <option value="Dokter Gigi Spesialis" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Dokter Gigi Spesialis' ? 'selected' : '' }}>Dokter Gigi Spesialis</option>
                  <option value="Dokter Internis" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Dokter Internis' ? 'selected' : '' }}>Dokter Internis</option>
                  <option value="Teknisi Kardiovaskuler" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Teknisi Kardiovaskuler' ? 'selected' : '' }}>Teknisi Kardiovaskuler</option>
                  <option value="Apoteker" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Apoteker' ? 'selected' : '' }}>Apoteker</option>
                  <option value="Asisten Apoteker" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Asisten Apoteker' ? 'selected' : '' }}>Asisten Apoteker</option>
                  <option value="Pranata Laboratorium Kesehatan" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Pranata Laboratorium Kesehatan' ? 'selected' : '' }}>Pranata Laboratorium Kesehatan</option>
                  <option value="Psikolog Klinik" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Psikolog Klinik' ? 'selected' : '' }}>Psikolog Klinik</option>
                  <option value="Teknik Elektromedik" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Teknik Elektromedik' ? 'selected' : '' }}>Teknik Elektromedik</option>
                  <option value="Fisioterapis" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Fisioterapis' ? 'selected' : '' }}>Fisioterapis</option>
                  <option value="Terdaftar Penyehat Tradiosional" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Terdaftar Penyehat Tradiosional' ? 'selected' : '' }}>Terdaftar Penyehat Tradiosional</option>
                  <option value="Bidan Praktek Mandiri" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Bidan Praktek Mandiri' ? 'selected' : '' }}>Bidan Praktek Mandiri</option>
                  <option value="Fisioterapi Praktek Mandiri (Nos OSS)" {{ old('jenis_izin', $data->sip->jenis_izin) == 'Fisioterapi Praktek Mandiri (Nos OSS)' ? 'selected' : '' }}>Fisioterapi Praktek Mandiri (Nos OSS)</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">No. STR:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="no_str" value="{{old('no_str', $data->sip->no_str)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Mulai Berlaku STR:*</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="awal_str" value="{{old('akhir_str', $data->sip->getRawOriginal('awal_str') )}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Tanggal Berakhir STR:*</label>
              <div class="col-lg-9">
                <input type="date" class="form-control" name="akhir_str" value="{{old('akhir_str', $data->sip->getRawOriginal('akhir_str') )}}">
              </div>
            </div>
          </div>
        </div>
        <hr> 

        <h5 class="font-size-lg text-dark font-weight-bold mb-6">Alamat Praktik</h5>
        <div class="row">
          <div class="col-md-4">
            <h6 class="font-size-lg text-dark font-weight-bold mb-6">Alamat Praktik 1</h6>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Jalan:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="jalan1" value="{{old('jalan1', $data->sip->jalan1)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kelurahan:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kelurahan1" value="{{old('jalan1', $data->sip->kelurahan1)}}">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-lg-3 col-form-label">Kecamatan:*</label>
              <div class="col-lg-9">
                <input type="text" class="form-control" name="kecamatan1" value="{{old('jalan1', $data->sip->kecamatan1)}}">
              </div>
            </div>
          </div>

          @if($data->sip->jalan2 != '')
          <div class="col-md-4">
            <h6 class="font-size-lg text-dark font-weight-bold mb-6">Alamat Praktik 2</h6>
            <p>Jalan : <b>{{$data->sip->jalan2}}</b></p>
            <p>Kelurahan : <b>{{$data->sip->kelurahan2}}</b></p>
            <p>Kecamatan : <b>{{$data->sip->kecamatan2}}</b></p>
          </div>
          @elseif($data->sip->jalan3 != '')
          <div class="col-md-4">
            <h6 class="font-size-lg text-dark font-weight-bold mb-6">Alamat Praktik 3</h6>
            <p>Jalan : <b>{{$data->sip->jalan3}}</b></p>
            <p>Kelurahan : <b>{{$data->sip->kelurahan3}}</b></p>
            <p>Kecamatan : <b>{{$data->sip->kecamatan3}}</b></p>
          </div>
          @endif
        </div>
        <hr>
        <h5 class="font-size-lg text-dark font-weight-bold mb-6">Lampiran Berkas</h5>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Foto KTP:*</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" name="ktp">
              </div>
            </div>
            <img src="{{ asset('storage/'.$data->sip->ktp) }}" class="rounded img-fluid" alt="...">
          </div>
          <div class="col-md-6 text-center">
            <div class="form-group row">
              <label class="col-md-2 col-form-label">Pas Foto:*</label>
              <div class="col-lg-6">
                <input type="file" class="form-control" name="foto">
              </div>
            </div>
            <img src="{{ asset('storage/'.$data->sip->foto) }}" class="rounded img-fluid" alt="...">
          </div>
        </div>
        <hr>
        <div class="form-group row">
          <label class="col-md-2 col-form-label">STR:*</label>
          <div class="col-lg-4">
            <input type="file" class="form-control" name="str">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <embed src="{{asset('storage/'.$data->sip->str)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
            </div>
          </div>
          <hr>
          <hr>

          <div class="form-group row">
            <label class="col-md-2 col-form-label">Rekomendasi IDI:*</label>
            <div class="col-lg-4">
              <input type="file" class="form-control" name="rekomendasi_idi">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
              <embed src="{{asset('storage/'.$data->sip->rekomendasi_idi)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
              </div>
            </div>
            <hr>
            <hr>

            <div class="form-group row">
              <label class="col-md-2 col-form-label">Surat Keterangan Pelayanan Kesehatan:</label>
              <div class="col-lg-4">
                <input type="file" class="form-control" name="surat_keterangan">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">
                <embed src="{{asset('storage/'.$data->sip->surat_keterangan)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                </div>
              </div>
              <hr>
              <hr>

            </div>
          </div>
        </form>
        @endsection

        @section('page_script')

        <script type="text/javascript">

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
                  // alert('hahah')
                  // $('#berkas-form').submit(function(e){ // update berkas
                    // e.preventDefault();
                    // alert('hahah')
                    var request = new FormData(document.getElementById("berkas-form"));
                    var endpoint= "{{route('perizinan.ditolak.update', ['no_tiket' => $data->no_tiket])}}";
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
                  // });
                }
              });
            });
          }

          // $(document).ready(function(){
    // $('#update-form').submit(function(e){ // update berkas
    //   e.preventDefault();
    //   var request = new FormData(this);
    //   var endpoint= "{{route('perizinan.ditolak.update', ['no_tiket' => $data->no_tiket])}}";
    //     $.ajax({
    //       url: endpoint,
    //       method: "POST",
    //       data: request,
    //       contentType: false,
    //       cache: false,
    //       processData: false,
    //       success:function(data){
    //         if(data.status == 'success') {
    //           successToRelaoad(data.status, data.pesan);
    //         } else {
    //           berhasil(data.status, data.pesan);
    //         }
    //       },
    //       error: function(xhr, status, error){
    //         var error = xhr.responseJSON; 
    //         if ($.isEmptyObject(error) == false) {
    //           $.each(error.errors, function(key, value) {
    //             gagal(key, value);
    //           });
    //         }
    //       } 
    //     }); 
    //   });
  // }
  function successToRelaoad(status, pesan) {
    Swal.fire({
      type: status,
      title: pesan,
      showConfirmButton: true,
      button: "Ok"
    }).then((result) => {
      window.location.href = "{{URL::to('perizinan/ditolak')}}"
        // location.reload();
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
