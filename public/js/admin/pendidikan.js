// UPLOAD NOMOR BERITA ACARA
$('#no_berita_acara').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= bastore;
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

// UPLOAD BERITA ACARA
$('#berita_acara').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= bastore;
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
          reload(pendidikan_id, 'reload-berita_acara', 'berita_acara');
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

// UPLOAD LAMPIRAN GAMBAR 1
$('#gambar1').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= bastore;
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
          reload(pendidikan_id, 'reload-gambar1', 'gambar1');
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
// END UPLOAD LAMPIRAN GAMBAR 1

// UPLOAD LAMPIRAN GAMBAR 2
$('#gambar2').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= bastore;
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
          reload(pendidikan_id, 'reload-gambar2', 'gambar2');
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
// END UPLOAD LAMPIRAN GAMBAR 2

// UPLOAD LAMPIRAN GAMBAR 3
$('#gambar3').submit(function(e) {
  e.preventDefault();
  var request = new FormData(this);
  var endpoint= bastore;
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
          reload(pendidikan_id, 'reload-gambar3', 'gambar3');
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
// END UPLOAD LAMPIRAN GAMBAR 3




   // mereload tombol preview upload file
  function reload(id, load, field) {
    $('#'+load).empty();
    $.ajax({
      'url': 'pendidikan-reload/' + id,
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

// Handle File
$("#file-berita_acara").change(function(){
  $("#label-berita_acara").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-gambar1").change(function(){
  $("#label-gambar1").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-gambar2").change(function(){
  $("#label-gambar2").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});

$("#file-gambar3").change(function(){
  $("#label-gambar3").html($(this).val().split("\\").splice(-1,1)[0] || "Choose File");     
});
