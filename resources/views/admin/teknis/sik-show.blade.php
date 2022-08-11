@extends('layouts.admin.app')

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
      @include('layouts.admin.alert')
    </div>
  </div>

  <form action="" method="POST" class="horizontal-form">
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
            Detail Perizinan Surat Izin Kerja (SIK)
          </h3>
        </div>
        <div class="row align-items-center">
          <div class="col-12 kt-align-right">
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-verifikasi">
              <i class="fa fa-times"></i> Tolak Berkas</button>
              <button type="button" class="btn btn-success btn-sm" id="verif" onclick="verifikasi()" title="Terima Berkas">
                <i class="fa fa-check"></i> Verifikasi Berkas</button>
              </div>
            </div>

          </div>
          <div class="kt-portlet__body">
            <div class="row">
              <div class="col-md-12">
                <p>No. Tiket : <b>{{$data->no_tiket}}</b></p>
              </div>
            </div>
            <hr>


            <div class="row">
              <div class="col-md-6">
                <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Pribadi</h5>
                <p>Nama Lengkap Sesuai STR : <b>{{$data->sik->nama}}</b></p>
                <p>Tempat Lahir: <b>{{$data->sik->tempat_lahir}}</b></p>
                <p>Tanggal Lahir: <b>{{$data->sik->tanggal_lahir}}</b></p>
                <p>No. HP: <b>{{$data->sik->nohp}}</b></p>
                <p>Alamat Rumah: <b>{{$data->sik->alamat}}</b></p>
              </div>
              <div class="col-md-6">
                <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Perizinan</h5>
                @if($data->jenis_izin == 'sip')
                @php $surat = 'Surat Izin Praktik' @endphp
                @elseif($data->jenis_izin == 'sik')
                @php $surat = 'Surat Izin Kerja' @endphp
                @endif
                <p>Jenis Surat : <b>{{$surat}}</b></p>
                <p>No. STR : <b>{{$data->sik->no_str}}</b></p>
                <p>Tanggal Mulai Berlaku STR : <b>{{$data->sik->awal_str}}</b></p>
                <p>Tanggal Berakhir STR : <b>{{$data->sik->akhir_str}}</b></p>
                <!-- <p>Status Kepegawaian : <span class="badge badge-pill badge-success">Aktif</span></p> -->
              </div>
            </div>
            <hr> 

            <h5 class="font-size-lg text-dark font-weight-bold mb-6">Data Praktik</h5>
            <div class="row">
              <div class="col-md-4">
                <p>Nama Praktik : <b>{{$data->sik->nama_praktek}}</b></p>
                <p>Jalan : <b>{{$data->sik->jalan}}</b></p>
                <p>Kelurahan : <b>{{$data->sik->klh->kelurahan}}</b></p>
                <p>Kecamatan : <b>{{$data->sik->klh->kecamatan}}</b></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-md-6 text-center">
                <h5 class="font-size-lg text-dark font-weight-bold mb-6">Foto KTP</h5>
                <a href="{{ asset('storage/'.$data->sik->ktp) }}" target="_blank">
                  <img src="{{ asset('storage/'.$data->sik->ktp) }}" class="rounded img-fluid" alt="..." height="100px" width="120px">
                </a>
              </div>
              <div class="col-md-6 text-center">
                <h5 class="font-size-lg text-dark font-weight-bold mb-6">Pas Foto</h5>
                <a href="{{ asset('storage/'.$data->sik->ktp) }}" target="_blank">
                  <img src="{{ asset('storage/'.$data->sik->foto) }}" class="rounded img-fluid" alt="..." height="100px" width="120px">
                </a>
              </div>
            </div>
            <hr>

            <h5 class="font-size-lg text-dark font-weight-bold mb-6">File STR</h5>
            <div class="row">
              <div class="col-md-12 text-center">
                <embed src="{{asset('storage/'.$data->sik->str)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                </div>
              </div>
              <hr>

              <h5 class="font-size-lg text-dark font-weight-bold mb-6">File Rekomendasi Organisasi Profesi</h5>
              <div class="row">
                <div class="col-md-12 text-center">
                  <embed src="{{asset('storage/'.$data->sik->rekomendasi_org)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                  </div>
                </div>
                <hr>

                <h5 class="font-size-lg text-dark font-weight-bold mb-6">File Surat Keterangan Pelayanan Kesehatan</h5>
                <div class="row">
                  <div class="col-md-12 text-center">
                    <embed src="{{asset('storage/'.$data->sik->surat_keterangan)}}#toolbar=0" type="application/pdf" width="80%" height="500px">
                    </div>
                  </div>
                  <hr>

                  <!-- OPSIONAL -->
                  <!-- Surat Keluasan -->
                  @if($data->sik->surat_keluasan)
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

                <!-- Modal Tambah Keluhan -->
                <div class="modal fade bd-example-modal" id="modal-verifikasi" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content ">
                      <div class="modal-header">
                        <h5 class="modal-title"> Tolak Pengajuan Berkah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form method="post" action="{{ route('perizinan.teknis.tolak', ['no_tiket' => $data->no_tiket]) }}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                          <div class="mb-3">
                            <label for="message-text" class="col-form-label">Pesan:</label>
                            <textarea class="form-control" rows="8" name="ket" required></textarea>
                          </div>

                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
                @endsection

                @section('page_script')

                <script type="text/javascript">
    function verifikasi() { // verifikasi berkas berhasil
      $(document).on('click', '#verif', function(){
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
            var me = $(this),
            url = "{{ route('perizinan.teknis.verif', ['no_tiket' => $data->no_tiket]) }}",
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              url: url,
              method: "POST",
              data : {
                '_method' : 'PUT',
                '_token'  : token
              },
              success:function(data){
                if(data.status == 'success') {
                  successToRelaoad(data.status, data.pesan)
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
        window.location.href = "{{URL::to('admin/perizinan-teknis')}}"
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
