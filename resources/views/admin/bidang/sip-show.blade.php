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
          Detail Perizinan Surat Izin Praktik (SIP)
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
          <div class="table-responsive">
            <!--begin: Datatable -->
            <table class="table table-striped table-bordered table-hover belum no-footer dtr-inline" role="grid" aria-describedby="table" width="100%">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Formulir</th>
                  <th>Isi</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Nama Sesuai STR</td>
                  <td>{{ $data->sip->nama }}</td>
                  <td>@if($data->sip->reason->nama) <span class="badge rounded-pill bg-danger"><i class="fa fa-times"></i></span> @endif</td>
                  <td>
                    <button class="btn btn-outline-primary btn-sm" onclick="reason('nama', 'Nama')"><i class="fa fa-comment"></i></button>&nbsp;
                    <button class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i></button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Tempat Lahir</td>
                    <td>{{ $data->sip->tempat_lahir }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Tanggal Lahir</td>
                    <td>{{ $data->sip->tanggal_lahir }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Alamat Rumah</td>
                    <td>{{ $data->sip->alamat }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Jenis Perizinan</td>
                    <td>{{ $data->sip->subizin->jenis }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Nomor STR</td>
                    <td>{{ $data->sip->no_str }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Tanggal Mulai Berlaku STR</td>
                    <td>{{ $data->sip->awal_str }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Tanggal Berakhir STR</td>
                    <td>{{ $data->sip->akhir_str }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Nama Praktek 1</td>
                    <td>{{ $data->sip->nama_praktek1 }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Kelurahan Praktek 1</td>
                    <td>{{ $data->sip->klh1->kelurahan }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>11</td>
                    <td>Kecamatan Praktek 1</td>
                    <td>{{ $data->sip->klh1->kecamatan }}</td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>12</td>
                    <td>Foto KTP</td>
                    <td><a href="{{ asset('storage/'.$data->sip->ktp) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>13</td>
                    <td>Pas Foto</td>
                    <td><a href="{{ asset('storage/'.$data->sip->ktp) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>14</td>
                    <td>File STR</td>
                    <td><a href="{{ asset('storage/'.$data->sip->str) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>15</td>
                    <td>Rekomendasi Organisasi Profesi</td>
                    <td><a href="{{ asset('storage/'.$data->sip->rekomendasi_org) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>16</td>
                    <td>Surat Keterangan Pelayanan Kesehatan</td>
                    <td><a href="{{ asset('storage/'.$data->sip->surat_keterangan) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                    <td></td>
                  </tr>

                  <!-- OPSIONAL -->
                  @if($data->sip->surat_persetujuan)
                  <tr>
                    <td>17</td>
                    <td>Surat Persetujuan Pimpinan Instansi</td>
                    <td><a href="{{ asset('storage/'.$data->sip->surat_persetujuan) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endif

                  @if($data->sip->berkas_pendukung)
                  <tr>
                    <td>18</td>
                    <td>Berkas Pendukung</td>
                    <td><a href="{{ asset('storage/'.$data->sip->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
                    <td></td>
                    <td></td>
                  </tr>
                  @endif
                </tbody>

              </table>
              <!--end: Datatable -->
            </div>



          </div>
        </div>

        <!-- Modal Tambah Keluhan -->
        <div class="modal fade bd-example-modal" id="modal-reason" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content ">
              <div class="modal-header">
                <h5 class="modal-title" id="judul-modal"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form method="post" action="" id="post-reason">
                @csrf
                @method('PUT')
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Pesan:</label>
                    <textarea class="form-control" rows="8" name="pesan" required></textarea>
                  </div>
                  <input type="hidden" name="" id="field">
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
          const route= "{{ route('reason.sip.store', ['id' => $data->id]) }}";
          function reason(key, head) {

            $('#field').attr('value', key);
            $('#field').attr('name', key);
            $('#post-reason').attr('action', route);
            $('#judul-modal').html("Tolak "+head);
            $("#modal-reason").modal("show");
          }

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
            url = "{{ route('perizinan.bidang.verif', ['no_tiket' => $data->no_tiket]) }}",
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
        window.location.href = "{{URL::to('admin/perizinan-bidang')}}"
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
