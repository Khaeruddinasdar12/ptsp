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
        @if($data->jenis_izin == 'sip')
        @php $izin = 'Surat Izin Praktik (SIP)'; @endphp
        @elseif($data->jenis_izin == 'sik')
        @php $izin = 'Surat Izin Kerja (SIK)'; @endphp
        @elseif($data->jenis_izin == 'krk')
        @php $izin = 'Keterangan Rencana Kota (KRK)'; @endphp
        @endif
        <h3 class="kt-portlet__head-title">
          Detail Perizinan {{$izin}}
        </h3>
      </div>
      <div class="row align-items-center">
        <div class="col-12 kt-align-right">
          <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modal-verifikasi">
            <i class="fa fa-eye"></i> Preview Sertifikat
          </button>
          <button type="button" class="btn btn-success btn-sm" id="verif" onclick="verifikasi()" title="Terima Berkas">
            <i class="fa fa-check"></i> Terbitkan Sertifikat
          </button>
        </div>
      </div>
    </div>

    <div class="kt-portlet__body">
      <div class="row">
        <div class="col-md-12">
          <p>No. Tiket : <b>{{$data->no_tiket}}</b></p>
        </div>

        <div class="col-md-12">
          <p>Jenis Perizinan : <b>{{ $data->sip->subizin->nama }}</b></p>
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
            </tr>
          </thead>
          @php 
          $no = 1; 
          $terima = '<span class="badge rounded-pill bg-success text-white"><i class="fa fa-check"></i> Terima</span>' ;
          $tolak = '<span class="badge rounded-pill bg-danger text-white"><i class="fa flaticon-circle"></i> Ditolak</span>';
          $belumperiksa = '<span class="badge rounded-pill bg-primary text-white"><i class="fa flaticon-info"></i> Belum diperiksa</span>';
          @endphp
          <tbody>
            <tr>
              <td>{{$no}}</td>
              <td valign="center">Nama Sesuai STR</td>
              <td>{{ $data->sip->nama }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tempat Lahir</td>
              <td>{{ $data->sip->tempat_lahir }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Lahir</td>
              <td>{{ $data->sip->tanggal_lahir }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Alamat Rumah</td>
              <td>{{ $data->sip->alamat }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nomor STR</td>
              <td>{{ $data->sip->no_str }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Mulai Berlaku STR</td>
              <td>{{ $data->sip->awal_str }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Tanggal Berakhir STR</td>
              <td>{{ $data->sip->akhir_str }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Praktek 1</td>
              <td>{{ $data->sip->nama_praktek1 }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan 1</td>
              <td>{{ $data->sip->jalan1 }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek 1</td>
              <td>Kec. {{ $data->sip->klh1->kelurahan }}, Kel. {{ $data->sip->klh1->kelurahan }} </td>
            </tr>

            <!-- JALAN 2 -->
            @if($data->sip->jalan2 && $data->sip->nama_praktek2 && $data->sip->kelurahan2)
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Praktek 2</td>
              <td>{{ $data->sip->nama_praktek2 }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan 2</td>
              <td>{{ $data->sip->jalan2 }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek 2</td>
              <td>Kec. {{ $data->sip->klh2->kelurahan }}, Kel. {{ $data->sip->klh2->kelurahan }} </td>
            </tr>
            @endif
            <!-- END JALAN 2 -->


            <!-- JALAN 3 -->
            @if($data->sip->jalan3 && $data->sip->nama_praktek3 && $data->sip->kelurahan3)
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Nama Praktek 3</td>
              <td>{{ $data->sip->nama_praktek3 }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Jalan 3</td>
              <td>{{ $data->sip->jalan3 }}</td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Kecamatan & Kelurahan Praktek 3</td>
              <td>Kec. {{ $data->sip->klh3->kelurahan }}, Kel. {{ $data->sip->klh3->kelurahan }} </td>
            </tr>
            @endif
            <!-- END JALAN 3 -->


            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Foto KTP</td>
              <td><a href="{{ asset('storage/'.$data->sip->ktp) }}" target="_blank">Lihat Berkas</a></td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Pas Foto</td>
              <td><a href="{{ asset('storage/'.$data->sip->foto) }}" target="_blank">Lihat Berkas</a></td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>File STR</td>
              <td><a href="{{ asset('storage/'.$data->sip->str) }}" target="_blank">Lihat Berkas</a></td>
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Rekomendasi Organisasi Profesi</td>
              <td><a href="{{ asset('storage/'.$data->sip->rekomendasi_org) }}" target="_blank">Lihat Berkas</a></td> 
            </tr>
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Surat Keterangan Pelayanan Kesehatan</td>
              <td><a href="{{ asset('storage/'.$data->sip->surat_keterangan) }}" target="_blank">Lihat Berkas</a></td>
            </tr>

            <!-- OPSIONAL -->
            @if($data->sip->surat_persetujuan)
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Surat Persetujuan Pimpinan Instansi</td>
              <td><a href="{{ asset('storage/'.$data->sip->surat_persetujuan) }}" target="_blank">Lihat Berkas</a></td>
            </tr>
            @endif

            @if($data->sip->berkas_pendukung)
            <tr>
              <td>{{$no = $no+1}}</td>
              <td>Berkas Pendukung</td>
              <td><a href="{{ asset('storage/'.$data->sip->berkas_pendukung) }}" target="_blank">Lihat Berkas</a></td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @endsection

  @section('page_script')

  <script type="text/javascript">
    function verifikasi() { // verifikasi berkas berhasil
      $(document).on('click', '#verif', function(){
        Swal.fire({
          title: 'Terbitkan Sertifikat ?',
          // text: "",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Terbitkan!',
          timer: 6500
        }).then((result) => {
          if (result.value) {
            var me = $(this),
            url = "{{ route('perizinan.kadis.verif', ['no_tiket' => $data->no_tiket]) }}",
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
        window.location.href = "{{URL::to('admin/perizinan-kadis')}}"
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
