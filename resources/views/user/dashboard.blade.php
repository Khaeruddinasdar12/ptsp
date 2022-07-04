@extends('layouts.user.app')

@section('title', 'Home')

@section('page_style')
<link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('subheader')
<link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
<h3 class="kt-subheader__title">
  Home
</h3>
@endsection

@section('content')
<div class="row justify-content-center">
  <div class="col-12">
    @include('layouts.user.alert')
  </div>
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
      <div class="kt-portlet__body">
        <div class="kt-iconbox__body">
          <div class="kt-iconbox__icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
              </g>
            </svg> </div>
            <div class="kt-iconbox__desc">
              <h3 class="kt-iconbox__title">
                <a class="kt-link" href="#">Semua Perizinan</a>
              </h3>
              <div class="kt-iconbox__content">
                87
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slow">
        <div class="kt-portlet__body">
          <div class="kt-iconbox__body">
            <div class="kt-iconbox__icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"/>
                  <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
                  <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
                </g>
              </svg> </div>
              <div class="kt-iconbox__desc">
                <h3 class="kt-iconbox__title">
                  <a class="kt-link" href="#">Perizinan Dalam Proses</a>
                </h3>
                <div class="kt-iconbox__content">
                  87
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
    <div class="kt-portlet kt-iconbox kt-iconbox--success kt-iconbox--animate-slow">
      <div class="kt-portlet__body">
        <div class="kt-iconbox__body">
          <div class="kt-iconbox__icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
              </g>
            </svg> </div>
            <div class="kt-iconbox__desc">
              <h3 class="kt-iconbox__title">
                <a class="kt-link" href="#">Perizinan Ditolak</a>
              </h3>
              <div class="kt-iconbox__content">
                87
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="kt-portlet kt-iconbox kt-iconbox--brand kt-iconbox--animate-slow">
        <div class="kt-portlet__body">
          <div class="kt-iconbox__body">
            <div class="kt-iconbox__icon">
              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <rect x="0" y="0" width="24" height="24"/>
                  <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
                  <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
                </g>
              </svg> </div>
              <div class="kt-iconbox__desc">
                <h3 class="kt-iconbox__title">
                  <a class="kt-link" href="#">Karyawan</a>
                </h3>
                <div class="kt-iconbox__content">
                  87
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="kt-portlet kt-iconbox kt-iconbox--danger kt-iconbox--animate-slow">
          <div class="kt-portlet__body">
            <div class="kt-iconbox__body">
              <div class="kt-iconbox__icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
                    <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"/>
                  </g>
                </svg> </div>
                <div class="kt-iconbox__desc">
                  <h3 class="kt-iconbox__title">
                    <a class="kt-link" href="#">Jumlah Asrama</a>
                  </h3>
                  <div class="kt-iconbox__content">
                    87
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>

        @endsection

        @section('page_script')
        <script src="{{ asset('js/pages/crud/forms/widgets/select2.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
        <script type="text/javascript">
  // berhasil('success', 'halo');
    function deleteAsrama() { // cek validity santri
      $(document).on('click', '#asrama', function(){
        Swal.fire({
          title: 'Hapus Asrama ?',
          text: "Akan tidak dapat mengembalikan data yang dihapus!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Lanjutkan!',
          timer: 6500
        }).then((result) => {
          if (result.value) {
            var me = $(this),
            url = me.attr('href'),
            token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
              url: url,
              method: "POST",
              data : {
                '_method' : 'DELETE',
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
        location.reload();
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

