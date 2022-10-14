if(jenis_izin_old != null) {
  jenis(jenis_izin_old);
}
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
      if(data.status == 'success') {
        berhasil(data.status, data.pesan);
        krk_id = data.krk_id;
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
        krk_id = data.krk_id;
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
      if(data.status == 'success') {
        berhasil(data.status, data.pesan);
        krk_id = data.krk_id;
        $('a[href="#kt_tab_pane_4"]').click();
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
        reload(krk_id, 'reload-ktp', 'ktp');
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

  // UPLOAD FOTO
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
          reload(krk_id, 'reload-foto', 'pas_foto');
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
  // END UPLOAD FOTO

  // UPLOAD PBB
  $('#pbb').submit(function(e) {
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
        // document.getElementById('pbb').reset();
        if(data.status == 'success') {
          reload(krk_id, 'reload-pbb', 'pbb');
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
  // END UPLOAD PBB

  // UPLOAD SURAT TANAH
  $('#surat_tanah').submit(function(e) {
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
        // document.getElementById('surat_tanah').reset();
        if(data.status == 'success') {
          reload(krk_id, 'reload-surat_tanah', 'surat_tanah');
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
  // END UPLOAD SURAT TANAH

  // UPLOAD PETA
  $('#peta').submit(function(e) {
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
        // document.getElementById('peta').reset();
        if(data.status == 'success') {
          reload(krk_id, 'reload-peta', 'peta');
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
  // END UPLOAD PETA

  // UPLOAD GAMBAR
  $('#gambar').submit(function(e) {
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
        // document.getElementById('gambar').reset();
        if(data.status == 'success') {
          reload(krk_id, 'reload-gambar', 'gambar');
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
  // END UPLOAD GAMBAR

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
          reload(krk_id, 'reload-berkas_pendukung', 'berkas_pendukung');
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
      'url': '../krk-reload/' + id,
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

  // END TAB 4

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

  function jenis(jenis) {
    if(jenis == '') {
      $('#layout-kategori').attr("style", "display: none");
      $('#kategori').empty();
      return null;
    }
    $.ajax({
      'url': "../../cek-kategori/" + jenis,
      'dataType': 'json',
      success: function(data) {
        if(data[0].kategori != null) {
          $('#kategori').empty();
          $('#layout-kategori').attr("style", "");
          jQuery.each(data, function(i, val) {
            if(val.id == id_jenis_izin_old) {
              check = 'checked';
            } else {
              check = '';
            }
            $('#kategori').append('<div class="form-check"><input class="form-check-input" type="radio" name="jenis_izin" value="'+val.id+'" '+check+'><label class="form-check-label"">'+val.kategori+'</label></div>');
          });
        }else{
          $('#layout-kategori').attr("style", "display: none");
          $('#kategori').empty();
          $('#kategori').append('<input type="hidden" value="'+data[0].id+'" name="jenis_izin"');
        }
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

  function verifikasi() {   
    $('a[href="#kt_tab_pane_2"]').click();
  }

  function to_tab_5() {   
    $('a[href="#kt_tab_pane_5"]').click();
  }

  $(document).ready(function () {
    var kec1 = $('#kecamatan').val();
    if(kec1 != '') {
      show_kelurahan1(kec1);  
    }
    
  });

      // menampilkan kelurahan1 setelah memilih kecamatan1
      function show_kelurahan1(kec) {
        $("#kelurahan").empty();
        $("#kelurahan").append("<option value=''>--Pilih kelurahan--</option>");
        $.ajax({
          'url': "../../cek-kelurahan/" + kec,
          'dataType': 'json',
          success: function(data) {

            jQuery.each(data, function(i, val) {
              if(val.id == kel_id) {
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
  //end menampilkan kelurahan1 setelah memilih kecamatan1

// Handle File
$("#file-ktp").change(function(){
  $("#label-ktp").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-pbb").change(function(){
  $("#label-pbb").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-surat_tanah").change(function(){
  $("#label-surat_tanah").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-peta").change(function(){
  $("#label-peta").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-gambar").change(function(){
  $("#label-gambar").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-berkas_pendukung").change(function(){
  $("#label-berkas_pendukung").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});