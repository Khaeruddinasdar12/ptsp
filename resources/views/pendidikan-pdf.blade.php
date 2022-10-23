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
        <h3 id="judul">Izin Operasional</h3>
        <h3 id="judul">{{$jenis_izin}}</h3>
        <p align="center">Nomor: {{$no_surat}}</p>


        @if($jenis_izin == 'Program Pendidikan Kursus Dan Pelatihan')
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
      @elseif($jenis->izin == 'Program Pendidikan Dasar')
      <p class='descSurat'>Dasar:
        <ol type="1">
          <li>Undang-undang Nomor 20 Tahun 2003 tentang Sistem Pendidikan Nasional;</li>
          <li>Peraturan Pemerintah Nomor 19 Tahun 2005 tentang Standar Nasional Pendidikan;;</li>
          <li>Peraturan Pemerintah Rebuplik Indonesia Nomor 17 Tahun 2010 tentang Pengelolaan dan
            Penyelenggaraan Pendidikan;
          </li>
          <li>Peraturan Walikota Makassar Nomor 27 Tahun 2017 Tentang Penyelenggaraan Perizinan
            Terpadu Satu Pintu;
          </li>
          <li>Peraturan Walikota Makassar Nomor 59 Tahun 2021 Tentang Pendelegasian Kewenangan
            Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Kepala Dinas Penanaman Modal
            Dan Pelayanan Terpadu Satu Pintu Kota Makassar; ;
          </li>
          <li>Surat Rekomendasi Dari Tim Teknis Dinas Pendidikan Kota Makassar Nomor
            {{$no_rekomendasi}}
          </li>
        </ol>
      </p>
      <h3 id="judul">Izin Operasional</h3>
      @elseif($jenis->izin == 'PAUD')
      <p class="descSurat">Berdasarkan Peraturan Menteri Pendidikan Dan Kebudayaan Republik Indonesia Nomor 84 Tahun 2014 Tentang Pendirian Satuan Pendidikan Anak Usia Dini, dan Peraturan Walikota Makassar Nomor 59 Tahun 2021 Tentang Pendelegasian Kewenangan Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Kepala Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu Kota Makassar, serta memperhatikan Surat Rekomendasi dari Tim Teknis Dinas Pendidikan Kota Makassar Nomor: {{$no_rekomendasi}}; maka dengan ini Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Makassar, memberikan Izin Operasional :
      </p>
      @else  
      <p class="descSurat">Berdasarkan Permendikbud nomor 49 tahun 2007 tentang Standar pengelolaan Pendidikan oleh satuan pendidikan non formal, dan Peraturan Walikota Makassar Nomor 59 Tahun 2021 Tentang Pendelegasian Kewenangan Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Kepala Dinas Penanaman Modal Dan Pelayanan Terpadu Satu Pintu Kota Makassar serta memperhatikan Surat Rekomendasi dari Tim Teknis Dinas Pendidikan Nomor: {{$no_rekomendasi}}; maka dengan ini Kepala Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Makassar, memberikan Izin Operasional :</p>
      <h3 id="judul">Izin Penyelenggaraan</h3>
      @endif      



      KEPADA: 
      @if($jenis_izin == 'Program Pendidikan Kursus Dan Pelatihan')
      <table>
        <tr>
          <td style="width: 30%;">Nama Lembaga </td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_pendidikan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;"> </td>
          <td style="width: 5%;"></td>
          <td style="width: 65%;">{{$nama_yayasan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Alamat</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$jalan}}, kel. {{$kelurahan}}, kec. {{$kecamatan}}</td>
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
          <td style="width: 30%;">Jenis Program</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$jenis_program}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%;">Berlaku Sampai</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$berlaku_sampai->isoFormat('D MMMM Y')}}</td>
        </tr>
      </table>
      <p class="descSurat">Izin ini mulai berlaku sejak tanggal dikeluarkan, dengan ketentuan pemegang izin harus mematuhi dan bertanggungjawab segala aturan dan ketentuan yang berlaku dan jika terdapat kekeliruan didalamnya akan dilakukan perbaikan sebagaimana mestinya.</p> 


      @elseif($jenis->izin == 'Program Pendidikan Dasar')
      <table>
        <tr>
          <td style="width: 30%;">Nama Sekolah </td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_pendidikan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Nama Lembaga</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_yayasan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Alamat</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$jalan}}, kel. {{$kelurahan}}, kec. {{$kecamatan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Nama Kepala Sekolah</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$nama}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%; vertical-align: top;">No Telp</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 65%;">{{$nohp}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">No NPSN</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$no_npsn}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%;">Berlaku Sampai</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$berlaku_sampai->isoFormat('D MMMM Y')}}</td>
        </tr>
      </table>
      <p>Untuk menyelenggarakan dengan ketentuan sebagai berikut :</p>
      <ol type="1">
        <li>Mentaati peraturan Undang-undang yang berlaku;</li>
        <li>Mengajukan permohonan izin selambat-lambatnya <b>30 hari sebelum izin ini berakhir</b>;</li>
        <li>Izin ini mulai berlaku sejak tanggal ditetapkan.</li>
      </ol>
      @elseif($jenis->izin == 'PAUD')
      <table>
        <tr>
          <td style="width: 30%;">Nama PAUD </td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_pendidikan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Jenis Program</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$kategori}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Alamat</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$jalan}}, kel. {{$kelurahan}}, kec. {{$kecamatan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Nama Lembaga </td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_yayasan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Nama Kepala Sekolah</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$nama}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%; vertical-align: top;">No Telp</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 65%;">{{$nohp}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">No NPSN</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$no_npsn}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%;">Berlaku Sampai</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$berlaku_sampai->isoFormat('D MMMM Y')}}</td>
        </tr>
      </table>
      <p>Untuk menyelenggarakan dengan ketentuan sebagai berikut :</p>
      <ol type="1">
        <li>Mentaati peraturan Undang-undang yang berlaku;</li>
        <li>Mengajukan permohonan izin selambat-lambatnya <b>30 hari sebelum izin ini berakhir</b>;</li>
        <li>Izin ini mulai berlaku sejak tanggal ditetapkan.</li>
      </ol>
      @else
      <table>
        <tr>
          <td style="width: 30%;">Nama Lembaga </td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$nama_pendidikan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;"> </td>
          <td style="width: 5%;"></td>
          <td style="width: 65%;">{{$nama_yayasan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Alamat</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$jalan}}, kel. {{$kelurahan}}, kec. {{$kecamatan}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">Nama Ketua / Penyelenggara</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$nama}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%; vertical-align: top;">No Telp</td>
          <td style="width: 5%; vertical-align: top;">:</td>
          <td style="width: 65%;">{{$nohp}}</td>
        </tr>
        <tr>
          <td style="width: 30%;">No NPSN</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;"><b>{{$no_npsn}}</b></td>
        </tr>
        <tr>
          <td style="width: 30%;">Berlaku Sampai</td>
          <td style="width: 5%;">:</td>
          <td style="width: 65%;">{{$berlaku_sampai->isoFormat('D MMMM Y')}}</td>
        </tr>
      </table>
      <p>Untuk menyelenggarakan dengan ketentuan sebagai berikut :</p>
      <ol type="1">
        <li>Mentaati peraturan Undang-undang yang berlaku;</li>
        <li>Mengajukan permohonan izin selambat-lambatnya <b>30 hari sebelum izin ini berakhir</b>;</li>
        <li>Izin ini mulai berlaku sejak tanggal ditetapkan.</li>
      </ol>
      @endif


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
        <li>Dinas Pendidikan Kota Makassar</li>
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