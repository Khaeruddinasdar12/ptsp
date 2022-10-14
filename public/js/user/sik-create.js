// if(jenis_izin_old != null) {
//   jenis(jenis_izin_old);
// }
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
        sik_id = data.sik_id;
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
        sik_id = data.sik_id;
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
        sik_id = data.sik_id;
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
        reload(sik_id, 'reload-ktp', 'ktp');
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
        reload(sik_id, 'reload-foto', 'foto');
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

// UPLOAD IJAZAH
$('#ijazah').submit(function(e) {
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
      // document.getElementById('ijazah').reset();
      if(data.status == 'success') {
        reload(sik_id, 'reload-ijazah', 'ijazah');
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
// END UPLOAD IJAZAH

// UPLOAD STR
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
        reload(sik_id, 'reload-str', 'str');
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
        reload(sik_id, 'reload-rekomendasi_org', 'rekomendasi_org');
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
        reload(sik_id, 'reload-surat_keterangan', 'surat_keterangan');
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

// OPSIONAL
// UPLOAD SURAT KELUASAN
$('#surat_keluasan').submit(function(e) {
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
      // document.getElementById('surat_keluasan').reset();
      if(data.status == 'success') {
        reload(sik_id, 'reload-surat_keluasan', 'surat_keluasan');
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
// END UPLOAD SURAT KELUASAN

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
        reload(sik_id, 'reload-berkas_pendukung', 'berkas_pendukung');
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
    'url': '../sik-reload/' + id,
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


 function to_tab_5() {
  $('a[href="#kt_tab_pane_5"]').click();
}

// Handle File
$("#file-ktp").change(function(){
  $("#label-ktp").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-foto").change(function(){
  $("#label-foto").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-ijazah").change(function(){
  $("#label-ijazah").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-str").change(function(){
  $("#label-str").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-rekomendasi_org").change(function(){
  $("#label-rekomendasi_org").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-surat_keterangan").change(function(){
  $("#label-surat_keterangan").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-surat_keluasan").change(function(){
  $("#label-surat_keluasan").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-berkas_pendukung").change(function(){
  $("#label-berkas_pendukung").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});