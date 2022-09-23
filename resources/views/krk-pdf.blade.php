<!DOCTYPE html>
<head>
  <title>Keterangan Rencana Kota</title>
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
        <h3 id="judul">KETERANGAN RENCANA KOTA</h3>
        <p align="center">Nomor: {{$no_surat}} </p>

       <table>
         <tr>
           <td>NAMA</td>
           <td> : </td>
           <td>{{$nama}}</td>
         </tr>
         <tr>
           <td>Alamat</td>
           <td> : </td>
           <td>{{$alamat}}</td>
         </tr>
         <tr>
           <td>No. Pendaftaran</td>
           <td> : </td>
           <td>{{$no_rekomendasi}}</td>
         </tr>
       </table>

        <p class='descSurat'>I. DASAR:
          <ol type="a">
            <li>Peraturan Daerah Kota Makassar Nomor 4 Tahun 2015 tentang Rencana Tata Ruang Wilayah Kota Makassar Tahun 2015-2034;</li>
            <li>Peraturan Walikota Makassar Nomor 59 Tahun 2021 tentang Pendelegasian Kewenangan Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu;</li>
            <li>Kajian Teknis Keterangan Rencana Kota Dinas Penataan Ruang Kota Makassar Nomor 008/1215/DISTARU/VII/2022 Tanggal 28 Juli 2022;
            </li>
          </ol>
        </p>

        <p class='descSurat'>II. KETERANGAN LOKASI:
          <table style="margin-left: 18px">
            <tr>
              <td>Luas Surat Tanah</td>
              <td> : </td>
              <td>{{$luas}} m<sup>2</sup></td>
            </tr>
            <tr>
              <td>Lokasi</td>
              <td> : </td>
              <td>{{$jalan}}</td>
            </tr>
            <tr>
              <td>Kelurahan</td>
              <td> : </td>
              <td>{{$kelurahan}}</td>
            </tr>
            <tr>
              <td>Kecamatan</td>
              <td> : </td>
              <td>{{$kecamatan}}</td>
            </tr>
            <tr>
              <td>Kota</td>
              <td> : </td>
              <td>Makassar</td>
            </tr>
          </table>
        </p>

        <p class='descSurat'>III. DATA RENCANA KOTA:
          <table style="margin-left: 18px">
            <tr>
              <td>Luas Lahan</td>
              <td> : </td>
              <td>{{$luas}}</td>
            </tr>
            <tr>
              <td>Zona Peruntukan</td>
              <td> : </td>
              <td>Permukiman Kepadatan Tinggi</td>
            </tr>
            <tr>
              <td>Fungsi Bangunan/Kegiatan Yang Dimohonkan</td>
              <td> : </td>
              <td>{{$penggunaan}}</td>
            </tr>
            <tr>
              <td>Jumlah Unit Dan Lantai Yang Dimohonkan</td>
              <td> : </td>
              <td>{{$jml_bangunan}} Unit / {{$jml_lantai}} Lantai</td>
            </tr>
            <tr>
              <td>Koefisien Dasar Bangunan (KDB) Maksimum</td>
              <td> : </td>
              <td>{{$kdb}}</td>
            </tr>
            <tr>
              <td>Koefisien Lantai Bangunan (KLB) Maksimum</td>
              <td> : </td>
              <td>{{$klb}}</td>
            </tr>
            <tr>
              <td>Koefisien Dasar Hijau (KDH) Minimum</td>
              <td> : </td>
              <td>{{$kdh}}</td>
            </tr>
            <tr>
              <td>Jumlah Lantai Maksimun</td>
              <td> : </td>
              <td>{{$jml_lantai_max}}</td>
            </tr>
            <tr>
              <td>Lebar Jalan</td>
              <td> : </td>
              <td>{{$lebar_jalan}}</td>
            </tr>
            <tr>
              <td>Garis Sempadan Pagar (GSP)  </td>
              <td> : </td>
              <td>{{$gsp}}</td>
            </tr>
            <tr>
              <td>Garis Sempadan Bangunan (GSB)</td>
              <td> : </td>
              <td>{{$gsb}}</td>
            </tr>
            <tr>
              <td>Klasifikasi Kegiatan</td>
              <td> : </td>
              <td>{{$klasifikasi}}</td>
            </tr>
            <tr>
              <td>Kelompok Kegiatan </td>
              <td> : </td>
              <td><b>DIPERBOLEHKAN</b></td>
            </tr>
          </table>
        </p>

        <p class='descSurat'>IV. KETENTUAN/KEWAJIBAN:
          <ol type="a">
            <li>Keterangan Rencana Kota (KRK) ini hanya menunjukkan peruntukan ruang yang diperbolehkan sesuai rencana kota</li>
            <li>Keterangan Rencana Kota (KRK) ini bukan merupakan bukti pemilikan hak dan bukan merupakan perizinan</li>
            <li>Keterangan Rencana Kota (KRK) ini dinyatakan BATAL apabila dikemudian hari :
              <ol type="a">
                <li>Terjadi sengketa atas tanah, bukti pemilikan, batas dan luas tanah, dan</li>
                <li>Keterangan atau lampiran persyaratan permohonan KRK yang diajukan tidak benar/palsu atau dipalsukan, baik sebagian maupun seleruhnya</li>
              </ol>
            </li>
            <li>Keterangan Rencana Kota (KRK) ini berlaku 6 (Enam) bulan sejak tanggal ditetapkan dengan ketentuan apabila dikemudian hari terdapat kekeliruan didalamnya akan dilakukan perbaikan sebagaimana mestinya.</li>
          </ol>
        </p>

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
       <!--  <p><strong>Tembusan :</strong></p>
        <ol>
          <li>Dinas Kesehatan Kota Makassar</li>
          <li>Pertinggal,-</li>
        </ol> -->

        <!-- <hr style="border: 2px solid "> -->

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