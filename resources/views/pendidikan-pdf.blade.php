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
                <h3 id=judul>DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</h3>
                <p>Jl. Jendral Ahmad Yani No. 2 Makasssar 90171 <br>
                Website: dpmptsp.makassarkota.go.id</p>
              </div></th>
              <th><img src="{{ public_path('storage/qr-code/'.$barcode) }}" alt="" class="qrCode"></th>
            </tr>
          </table>
        </div>
        <hr class="hr">
          <h3 id="judul">Izin Operasional</h3>
          <h3 id="judul">{{$jenis_izin}}</h3>
          <p align="center">Nomor: {{$no_surat}}</p>


        <p class='descSurat'>Dasar:
          <ol type="a">
            <li>Undang-undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional;</li>
            <li>Undang-undang Nomor 32 Tahun 2004 tentang Pemerintah Daerah;</li>
            <li>Keputusan Presiden Republik Indonesia Nomor 68 Tahun 1998 tentang Pembinaan
              Kursus dan Pelatihan Kerja ;
            </li>
            <li>Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan;
            </li>
            <li>Keputusan Menteri Pendidikan dan Kebudayaan Nomor 261/U/1999 tentang
              Penyelenggaraan Kursus ;
            </li>
            <li>Peraturan Pemerintahan Nomor 73 Tahun 1991 tentang Pendidikan Luar Sekolah;
            </li>
            <li>Peraturan Menteri Pendidikan Nasional Nomor 42 Tahun 2009 tentang Standar
             Pengelola Kursus;
           </li>
           <li>Peraturan Walikota Makassar Nomor 59 Tahun 2021 Tentang Pendelegasian
            Kewenangan Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Kepala Dinas
            Penanaman Modal Dan Pelayanan Terpadu Satu Pintu Kota Makassar;
          </li>
          <li>Surat Rekomendasi Dari Tim Teknis Dinas Pendidikan Kota Makassar Nomor
            {{$no_rekomendasi}} sdr {{$nama}}
          </li>
        </ol>
      </p>

      <h3 id="judul">Mengizinkan</h3>

      <table>
        <tr>
          <td style="width: 30%;">Nama Lembaga </td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_pendidikan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Alamat</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$alamat}} </td>
        </tr>
        <tr>
          <td style="width: 30%; vertical-align: top;">No Telp</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 65%;">{{$nohp}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Penanggung Jawab</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$nama}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%;">Berlaku Sampai</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$berlaku_sampai->isoFormat('D MMMM Y')}}</td>
        </tr>
      </table>

      <br>
      <table class="penetapan clearfix">
        <tr>
          <th>
            <p>Ditetapkan di Makassar</p>
            <p>Pada tanggal: {{$penetapan->isoFormat('D MMMM Y')}}</p>
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