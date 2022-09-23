 $('#tab1').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route1;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data){
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
});

$('#tab2').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route2;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data){
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
});

$('#tab3').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route3;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data){
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
});

// TAB 4

// UPLOAD KTP
$('#ktp').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('ktp').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-ktp', 'ktp');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD KTP

// UPLOAD PAS FOTO
$('#foto').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('foto').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-foto', 'foto');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD PAS FOTO

// UPLOAD PAS STR
$('#str').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('str').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-str', 'str');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD STR

// UPLOAD REKOMENDASI ORGANISASI
$('#rekomendasi_org').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('rekomendasi_org').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-rekomendasi_org', 'rekomendasi_org');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD REKOMENDASI ORGANISASI

// UPLOAD SURAT KETERANGAN
$('#surat_keterangan').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('surat_keterangan').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-surat_keterangan', 'surat_keterangan');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD SURAT KETERANGAN

// UPLOAD SURAT KETERANGAN
$('#surat_persetujuan').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('surat_persetujuan').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-surat_persetujuan', 'surat_persetujuan');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD SURAT KETERANGAN

// UPLOAD BERKAS PENDUKUNG
$('#berkas_pendukung').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route4;
  $.ajax({
    url: endpoint,
    method: "POST",
    data: request,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function(){
      $('#loader').attr("style", "");
    },
    success:function(data) {
      document.getElementById('berkas_pendukung').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-berkas_pendukung', 'berkas_pendukung');
      }
      berhasil(data.status, data.pesan);
    },
    complete:function(data) {
      $('#loader').attr("style", "display:none");
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
  return false;
});
// END UPLOAD BERKAS PENDUKUNG

// mereload tombol preview upload file
function reload(id, load, field) {
  $('#'+load).empty();
  $.ajax({
    'url': '../sip-reload/' + id,
    'dataType': 'json',
    success: function(data) {
      $('#'+load).append('<a href="../../storage/'+data[field]+'" target="_blank">Lihat berkas</a>');
    },
    error: function(xhr, status, error) {
      var error = xhr.responseJSON;
      if ($.isEmptyObject(error) == false) {
        $.each(error.errors, function(key, value) {
          alert(key + value);
        });
      }
    }
  });
}
  //end reload preview upload


// TAB 5
$('#tab5').submit(function(e) {
  e.preventDefault();
  Swal.fire({
    title: 'Kirim Berkas ?',
    text: "Pastikan semua berkas pada form telah diisi!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Kirim!',
    timer: 6500
  }).then((result) => {
    if (result.value) {
      var request = new FormData(this);
      var endpoint= route5;
      $.ajax({
        url: endpoint,
        method: "POST",
        data: request,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
          $('#loader').attr("style", "");
        },
        success:function(data){
          if(data.status == 'success') {
            successToRelaoad(data.status, data.pesan);
          } else {
            berhasil(data.status, data.pesan);
          }
          
        },
        complete:function(data) {
          $('#loader').attr("style", "display:none");
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
 // END TAB 5 

function cekTanggalMulai() {
  var start = document.getElementById("date_start").value;
  var end = document.getElementById("date_end").value;
  if(end != '') {
    if (new Date(start) > new Date(end)) {
      gagal('Tanggal mulai', 'Tanggal mulai tidak boleh lebih dari tanggal akhir');
      document.getElementById("date_start").value = '';
    }
  }
}

function cekTanggal() {
  var start = document.getElementById("date_start").value;
  var end = document.getElementById("date_end").value;
  if(start == '') {
    document.getElementById("date_end").value = '';
    gagal('Tanggal mulai', 'Pilih tanggal mulai terlebih dahulu');
  } else if(new Date(start) > new Date(end)) {
    document.getElementById("date_end").value = '';
    gagal('Tanggal mulai', 'Tanggal mulai tidak boleh lebih dari tanggal akhir');
  }
}


$(document).ready(function () {
  var kec1 = $('#kecamatan1').val();
  show_kelurahan1(kec1);

  var kec2 = $('#kecamatan2').val();
  show_kelurahan2(kec2);

  var kec3 = $('#kecamatan3').val();
  show_kelurahan3(kec3);
});

      // menampilkan kelurahan1 setelah memilih kecamatan1
      function show_kelurahan1(kec) {
        $("#kelurahan1").empty();
        $.ajax({
          'url': "../../cek-kelurahan/" + kec,
          'dataType': 'json',
          success: function(data) {
            jQuery.each(data, function(i, val) {
              $('#kelurahan1').append('<option value="' + val.id + '">' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
  //end menampilkan kelurahan1 setelah memilih kecamatan1

        // menampilkan kelurahan2 setelah memilih kecamatan2
        function show_kelurahan2(kec) {
          $("#kelurahan2").empty();
          $.ajax({
            'url': "../../cek-kelurahan/" + kec,
            'dataType': 'json',
            success: function(data) {
              jQuery.each(data, function(i, val) {

                $('#kelurahan2').append('<option value="' + val.id + '">' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
  //end menampilkan kelurahan2 setelah memilih kecamatan2

          // menampilkan kelurahan3 setelah memilih kecamatan3
          function show_kelurahan3(kec) {
            $("#kelurahan3").empty();
            $.ajax({
              'url': "../../cek-kelurahan/" + kec,
              'dataType': 'json',
              success: function(data) {
                jQuery.each(data, function(i, val) {

                  $('#kelurahan3').append('<option value="' + val.id + '">' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
  //end menampilkan kelurahan3 setelah memilih kecamatan3