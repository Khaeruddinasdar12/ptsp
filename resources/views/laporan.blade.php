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
    /*border: 1px solid #EB8D56;*/
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
  <div >
    <div >
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
              <th></th>
            </tr>
          </table>
        </div>
        <hr class="hr">

        <h4 class="data_nama">Data {{$jenis}}, {{$tanggal}}</h4>
        <h6> Jumlah : {{$jumlah}} Data</h6>
        <table border="1" width="100%">
          <tr>
            <th>No</th>
            <th>No Tiket</th>
            <th>Jenis Izin</th>
            <th>Nama</th>
          </tr>
          @php $no = 1; @endphp 
          @foreach($data as $dt)
          <tr>
            <td >{{$no++}}</td>
            <td>{{$dt->no_tiket}}</td>
            <td>{{$dt->jenis_izin}}</td>
            <td>{{$dt->user->name}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </body>

  </html>