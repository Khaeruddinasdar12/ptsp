<!DOCTYPE html>
<head>
  <title>Sertifikat Surat Izin Praktik</title>
  <meta charset="utf-8">
  <style>
  body {
    font-family: arial;
  }

  p {
    margin: .5rem;
  }

  h3 {
    margin: 0;
  }

  span {
    color: red;
  }

  .bg {
    /* display: flex; */
    /* justify-content: center; */
    position: absolute;
    width: 35rem;
    height: 37rem;
    z-index: -1;
    opacity: .5;
    /* top: 45%; */
    /* left: 25%; */
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
  }

  #judul {
    text-align: center;
    text-transform: uppercase;
  }

  #judul2 {
    text-align: center;
    text-transform: uppercase;
    font-size:.7rem;
  }

  .merah {
    color: red;
  }

  .clearfix:after {
    content: "";
    display: block;
    clear: both;
  }

  #halaman {
    position: relative;
    font-family: serif;
    width: auto;
    height: auto;
    /* position: absolute;  */
    border: 1px solid #EB8D56;
    padding-top: 30px;
    padding-left: 30px;
    padding-right: 30px;
    /* padding-bottom: 80px; */
  }

  .border1 {
    width: auto;
    height: auto;
    /* position: absolute;  */
    border: 3px solid #EB8D56;
    padding-top: 2px;
    padding-left: 5px;
    padding-right: 5px;
    padding-bottom: 2px;
  }

  .border2 {
    width: auto;
    height: auto;
    /* position: absolute;  */
    border: 1px solid #EB8D56;
    padding-top: 2px;
    padding-left: 5px;
    padding-right: 5px;
    padding-bottom: 2px;
  }

  .kop1 {
    /*border-bottom: 1px solid #EB8D56;*/
    margin-top: -30px;
  }

  .kop {

    display: -webkit-box;
    /*display: flex;*/
    /*justify-content: center;*/
    padding-bottom: 1rem;
    /*border-bottom: 3px solid #EB8D56;*/
    font-size:.8rem;
  }

  .kop img.logo{

    /*float: left;*/
    width: 6em;
    height: 7em;
    margin-right: 1rem;
    /* height: 6em; */
  }
  .kop img.qrCode{
    width: 6em;
    height: 6em;
    margin-left: 1rem;
    /*float: right;*/
  }

  .kop .text {
    text-align: center;
    /*display: flex;*/
    /*flex-direction: column;*/
    /*justify-content: center;*/
    width: 27rem;
    /*font-size: .5rem;*/
  }

  .kop h3 {
    margin: 0;
  }

  .kop p {
    /* font-size: .7rem; */
  }

  .suratIzin p {
    margin: -5px;
  }

  .suratIzin h3 {
    margin: 2px;
    text-decoration: underline;
  }

  .suratIzin {
    text-align: center;
  }

  .berdasarkan {}

  .data_nama {
    text-align: center;
    font-size: 18px;
  }

  .penetapan {
    margin-right: 0;
    margin-left: auto;
  }

  .asdarGeblek {
    width: 10rem;
    height: auto;
    margin-right:5rem;
  }
  .hr{
    border:0px; border-bottom: 1px solid #EB8D56; height:3px; border-top: 3px solid  #EB8D56;
    margin-top: -20px;
  }
  .descSurat{
    text-align: justify;
  }
</style>

</head>

<body>
  <div class="border2">
    <div class="border1">
      <div id=halaman>
        <img class="bg" src="{{ public_path('cert/bg.png') }}" alt="">
        <div class="kop1">
          <table class="kop">
            <tr>
              <th><img src="{{ public_path('cert/logo.jpg') }}" alt="" srcset="" class="logo"></th>
              <th><div class="text">
                <h3 id=judul>PEMERINTAH KOTA MAKASSAR</h3>
                <h3 id=judul2>DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</h3>
                <p>Jl. Jendral Ahmad Yani No. 2 Makasssar 90171 <br>
                Website: dpmptsp.makassarkota.go.id</p>
              </div></th>
              <th><img src="{{ public_path('storage/qr-code/'.$barcode) }}" alt="" class="qrCode"></th>
            </tr>
          </table>
        </div>
        <hr class="hr">
        <div class="suratIzin"> 
          <h3 id="judul">{{$jenis_izin}}</h3>
          <p>Nomor: {{$no_surat}}</p>
        </div>

        <p class='descSurat'>Berdasarkan  dan
          <span>{{$dasar_hukum}}</span>
          Peraturan Walikota Makassar Nomor 59 Tahun 2021 Tentang Pendelegasian
          Kewenangan Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Kepala Dinas
          Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Makassar, maka yang
          bertanda tangan di bawah ini, Kepala Dinas Penanaman Modal dan Pelayanan Terpadu
        Satu Pintu Kota Makassar memberikan {{$jenis_izin}}, Kepada:</p>

        <h4 class="data_nama"><u>{{$nama}}</u></h4>

        <table>
          <tr>
            <td style="width: 30%;">Jenis Praktek : </td>
            <td style="width: 5%;"></td>
            <td style="width: 65%;">{{$jenis_izin}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Tempat, tanggal lahir</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$tempat_lahir}}, {{$tanggal_lahir}}</td>
          </tr>
          <tr>
            <td style="width: 30%; vertical-align: top;">Alamat</td>
            <td style="width: 5%; vertical-align: top;">:</td>
            <td style="width: 65%;">{{$alamat}}</td>
          </tr>
          <!-- Praktek 1 -->
          <tr>
            <td style="width: 30%;">Tempat Praktik yang ke-1</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$praktek1}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Kelurahan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kelurahan1}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Kecamatan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kecamatan1}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Jalan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$jalan1}}</td>
          </tr>
          @if($subizin == 'Apoteker')
          <tr>
            <td style="width: 30%;">Jadwal Praktek 1</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$jadwal1}}</td>
          </tr>
          @endif
          <!-- Praktek 2 -->
          @if($praktek2 != '' && $kelurahan2 != '' && $kecamatan2 != '')
          <tr>
            <td style="width: 30%;">Tempat Praktik yang ke-2</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$praktek2}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Kelurahan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kelurahan2}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Kecamatan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kecamatan2}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Jalan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$jalan2}}</td>
          </tr>
          @if($subizin == 'Apoteker')
          <tr>
            <td style="width: 30%;">Jadwal Praktek 2</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$jadwal2}}</td>
          </tr>
          @endif
          @endif
          <!-- Praktek 3 -->
          @if($praktek3 != '' && $kelurahan3 != '' && $kecamatan3 != '')
          <tr>
            <td style="width: 30%;">Tempat Praktik yang ke-3</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$praktek3}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Kelurahan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kelurahan3}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Kecamatan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kecamatan3}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">Jalan</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$jalan2}}</td>
          </tr>
          @if($subizin == 'Apoteker')
          <tr>
            <td style="width: 30%;">Jadwal Praktek 3</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$jadwal3}}</td>
          </tr>
          @endif
          @endif
          <tr>
            <td style="width: 30%;">No. STR</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$no_str}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">SIP berlaku sampai</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$akhir_str}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">No. Rekomendasi OP</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$rekomendasi_op}}</td>
          </tr>
          <tr>
            <td style="width: 30%;">No. Rekomendasi Dinkes</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$no_rekomendasi}}</td>
          </tr>
          <tr class="merah">
            <td style="width: 30%;">Untuk Praktik sebagai</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$subizin}}</td>
          </tr>
          @if($kategori)
          <tr class="merah">
            <td style="width: 30%;">Spesialis</td>
            <td style="width: 5%;">:</td>
            <td style="width: 65%;">{{$kategori}}</td>
          </tr>
          @endif
        </table>

        <br>
        <table class="penetapan clearfix">
          <tr>
            <th><img src="{{ public_path('storage/'.$pas_foto) }}" alt="" class="asdarGeblek"></th>
            <th>
              <p>Ditetapkan di Makassar</p>
              <p>Pada tanggal: {{$penetapan}}</p>
              <img src="{{ public_path('cert/foto2.jpg') }}" alt="">
            </th>
          </tr>
        </table>
        <!-- <br> -->
        <p><strong>Tembusan :</strong></p>
        <ol>
          <li>Dinas Kesehatan Kota Makassar</li>
          <li>Pertinggal,-</li>
        </ol>

        <hr style="border: 2px solid ">

        <div style="display: block" class="clearfix">
          <p style="    width: 85%; float: left; font-size: 12px;">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh Balai
            Sertifikasi Elektronik (BSrE) Badan Siber dan Sandi Negara. Untuk memastikan keaslian tanda tangan elektronik,
          silakan unggah dokumen pada laman https://tte.kominfo.go.id/verifyPDF</p>
          <img src="{{ public_path('cert/kunci.png') }}" alt="" width="80rem" height="40rem" style=" float: right; width: 30px;
          margin: 1rem;;
          height: 30px;" />

        </div>
      </div>
    </div>
  </body>

  </html>