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
      pendidikan_id = data.pendidikan_id;
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
        pendidikan_id = data.pendidikan_id;
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
        pendidikan_id = data.pendidikan_id;
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
        reload(pendidikan_id, 'reload-ktp', 'ktp');
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
          reload(pendidikan_id, 'reload-foto', 'pas_foto');
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

    // UPLOAD IMB
  $('#imb').submit(function(e) {
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
        // document.getElementById('akta').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-imb', 'imb');
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
  // END UPLOAD IMB

  // UPLOAD AKTA
  $('#akta').submit(function(e) {
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
        // document.getElementById('akta').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-akta', 'akta');
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
  // END UPLOAD AKTA

  // UPLOAD KURIKULUM
  $('#kurikulum').submit(function(e) {
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
        // document.getElementById('kurikulum').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-kurikulum', 'kurikulum');
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
  // END UPLOAD KURIKULUM

  // UPLOAD STRUKTUR ORGANISASI
  $('#struktur-organisasi').submit(function(e) {
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
        // document.getElementById('struktur-organisasi').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-struktur-organisasi', 'struktur_organisasi');
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
  // END UPLOAD STRUKTUR ORGANISASI

  // UPLOAD SK
  $('#sk').submit(function(e) {
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
        // document.getElementById('sk').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-sk', 'sk');
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
  // END UPLOAD SK

  // UPLOAD SERTIFIKAT TANAH
  $('#sertifikat-tanah').submit(function(e) {
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
        // document.getElementById('sertifikat-tanah').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-sertifikat-tanah', 'sertifikat_tanah');
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
  // END UPLOAD SERTIFIKAT TANAH

  // UPLOAD NIB
  $('#nib').submit(function(e) {
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
        // document.getElementById('nib').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-nib', 'nib');
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
  // END UPLOAD NIB

  // UPLOAD NPSN
  $('#npsn').submit(function(e) {
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
        // document.getElementById('npsn').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-npsn', 'npsn');
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
  // END UPLOAD NPSN

  // UPLOAD IZIN LAMA
  $('#izin_lama').submit(function(e) {
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
        // document.getElementById('izin_lama').reset();
        if(data.status == 'success') {
          reload(pendidikan_id, 'reload-izin_lama', 'izin_lama');
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
  // END UPLOAD IZIN LAMA

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
          reload(pendidikan_id, 'reload-berkas_pendukung', 'berkas_pendukung');
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
      'url': '../pendidikan-reload/' + id,
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
  }); //END TAB 5



  function jenis(jenis) {
    if(jenis == '') {
      $('#layout-kategori').attr("style", "display: none");
      $('#kategori').empty();
      return null;
    }
    if(jenis == 'Program Pendidikan Kursus Dan Pelatihan' || jenis == '66') {
      $('#kategori').empty();
      $('#layout-kategori').attr("style", "");
      $('#label-kategori').empty();
      $('#label-kategori').append('Jenis Program: max 8 program*');
      $('#kategori').append('<input type="text" class="form-control" name="jenis_program"><div>jika lebih dari 1 pisahkan dengan koma (misal : Menjahit, Menyulam)</div>');
    } else {
      // start ajax
      $.ajax({
        'url': "../../cek-kategori/" + jenis,
        'dataType': 'json',
        success: function(data) {
          if(data[0].kategori != null) {
            $('#kategori').empty();
            $('#layout-kategori').attr("style", "");
            $('#label-kategori').empty();
            $('#label-kategori').append('Kategori:*');
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
            $('#hide').empty();
            $('#hide').append('<div><input type="hidden" value="'+data[0].id+'" name="jenis_izin"</div>');
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
      // End ajax
    }
    
  }

  function verifikasi() {   
    $('a[href="#kt_tab_pane_2"]').click();
  }

  function to_tab_5() {   
    $('a[href="#kt_tab_pane_5"]').click();
  }

  $(document).ready(function () {
    var kec1 = $('#kecamatan').val();
    show_kelurahan1(kec1);
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

$("#file-foto").change(function(){
  $("#label-foto").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-imb").change(function(){
  $("#label-imb").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-akta").change(function(){
  $("#label-akta").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-kurikulum").change(function(){
  $("#label-kurikulum").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-struktur_organisasi").change(function(){
  $("#label-struktur_organisasi").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-sk").change(function(){
  $("#label-sk").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-sertifikat_tanah").change(function(){
  $("#label-sertifikat_tanah").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-nib").change(function(){
  $("#label-nib").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-npsn").change(function(){
  $("#label-npsn").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-izin_lama").change(function(){
  $("#label-izin_lama").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-berkas_pendukung").change(function(){
  $("#label-berkas_pendukung").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});