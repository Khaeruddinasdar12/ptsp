 $('#tab1').submit(function(e){
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= route1;
  // if()
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
        berhasil(data.status, data.pesan);
        sip_id = data.sip_id;
        $('a[href="#kt_tab_pane_2"]').click();
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
      if(data.status == 'success') {
        berhasil(data.status, data.pesan);
        sip_id = data.sip_id;
        $('a[href="#kt_tab_pane_3"]').click();
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
});

// TAB 3
$('#praktik1').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= praktik1;
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
        berhasil(data.status, data.pesan);
        sip_id = data.sip_id;
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
});

$('#praktik2').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= praktik2;
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
        berhasil(data.status, data.pesan);
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
});

$('#praktik3').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= praktik3;
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
        berhasil(data.status, data.pesan);
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
}); 

// END TAB 3

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
      // document.getElementById('ktp').reset();
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
      // document.getElementById('foto').reset();
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
      // document.getElementById('str').reset();
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
      // document.getElementById('rekomendasi_org').reset();
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
      // document.getElementById('surat_keterangan').reset();
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

// UPLOAD JEJARING
$('#berkas_jejaring1').submit(function(e) {
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
      // document.getElementById('surat_persetujuan').reset();
      if(data.status == 'success') {
        reload(sip_id, 'reload-berkas_jejaring1', 'berkas_jejaring1');
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
// END UPLOAD JEJARING

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
      // document.getElementById('surat_persetujuan').reset();
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
      // document.getElementById('berkas_pendukung').reset();
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
              if(val.id == kel_id1) {
                check = 'selected';
              } else {
                check = '';
              }
              $('#kelurahan1').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
                if(val.id == kel_id2) {
                  check = 'selected';
                } else {
                  check = '';
                }
                $('#kelurahan2').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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
                  if(val.id == kel_id3) {
                    check = 'selected';
                  } else {
                    check = '';
                  }

                  $('#kelurahan3').append('<option value="' + val.id + '" '+check+'>' + val.kecamatan +' - '+ val.kelurahan + '</option>');
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


  // menampilkan list dokter spesialis
  function show_listspesialis() {
    $("#spesialis").empty();
    $.ajax({
      'url': "../../perizinan/list-spesialis/",
      'dataType': 'json',
      success: function(data) {
        jQuery.each(data, function(i, val) {
          if(val.id == subizin_id) {
            check = 'selected';
          } else {
            check = '';
          }
          $('#spesialis').append('<option value="' + val.id + '" '+check+'>' + val.kategori + '</option>');
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
  //end menampilkan list dokter spesialis


              // menampilkan kelurahan3 setelah memilih kecamatan3
              function jenis(jen) {
                if(jen == '7') {
                  $('#jadwal1').attr("style", "");
                  $('#hari_buka1').attr("required", "true");
                  $('#hari_tutup1').attr("required", "true");

                  $('#jadwal2').attr("style", "");
                  $('#hari_buka2').attr("required", "true");
                  $('#hari_tutup2').attr("required", "true");

                  $('#jadwal3').attr("style", "");
                  $('#hari_buka3').attr("required", "true");
                  $('#hari_tutup3').attr("required", "true");
                  $("#spesialis").empty();
                  $('#list-spesialis').attr("style", "display:none");

                  $('#konsultan').html('');
                } else if (jen == 'Dokter Spesialis') {
                  $('#list-spesialis').attr("style", "");
                  show_listspesialis();
                  show_konsultan();
                } else {
                  $('#jadwal1').attr("style", "display:none");
                  $('#hari_buka1').removeAttr('required');
                  $('#hari_tutup1').removeAttr('required');

                  $('#jadwal2').attr("style", "display:none");
                  $('#hari_buka2').removeAttr('required');
                  $('#hari_tutup2').removeAttr('required');

                  $('#jadwal3').attr("style", "display:none");
                  $('#hari_buka3').removeAttr('required');
                  $('#hari_tutup3').removeAttr('required');
                  $("#spesialis").empty();
                  $('#list-spesialis').attr("style", "display:none");

                  $('#konsultan').html('');
                }              
              }
  //end menampilkan kelurahan3 setelah memilih kecamatan3

  function to_tab_5() {
    $('a[href="#kt_tab_pane_5"]').click();
  }
  function to_tab_4() {
    $('a[href="#kt_tab_pane_4"]').click();
  }

// HANDLE INPUT FILE
$("#file-ktp").change(function(){
  $("#label-ktp").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-foto").change(function(){
  $("#label-foto").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-str").change(function(){
  $("#label-str").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-berkas_jejaring1").change(function(){
  $("#label-berkas_jejaring1").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-rekomendasi_org").change(function(){
  $("#label-rekomendasi_org").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-surat_keterangan").change(function(){
  $("#label-surat_keterangan").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-surat_persetujuan").change(function(){
  $("#label-surat_persetujuan").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-berkas_pendukung").change(function(){
  $("#label-berkas_pendukung").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});
