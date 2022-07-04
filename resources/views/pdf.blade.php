<!DOCTYPE html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
    <style>
        *{
            box-sizing: border-box;
        }
        body{
            font-family: arial;
            background-image: url( {{asset('cert/bg.png')}} );
            background-size: 500px 600px;
            background-position: center;
            background-repeat: no-repeat;
        }
        p{
            margin: .5rem;
        }
        h3{
            margin: 0;
        }
        span{
            color: red;
        }

        /*.bg{
                position: absolute;
                width: 35rem;
                height: 37rem;
                z-index: -1;
                opacity: .5;
                top: 45%;
                left: 25%;
        }*/

        #judul{
            text-align:center;
            text-transform: uppercase;
        }
        .merah{
            color: red;
        }

        #halaman{
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
         .border1{
            width: auto; 
            height: auto; 
            /* position: absolute;  */
            border: 3px solid #EB8D56; 
            padding-top: 5px; 
            padding-left: 5px; 
            padding-right: 5px; 
            padding-bottom: 5px;
        }
         .border2{
            width: auto; 
            height: auto; 
            /* position: absolute;  */
            border: 1px solid #EB8D56; 
            padding-top: 5px; 
            padding-left: 5px; 
            padding-right: 5px; 
            padding-bottom: 5px;
        }
        .kop1{
            border-bottom: 1px solid #EB8D56;
            padding-bottom: .2rem;
        }
        .kop{
            display: flex;
            justify-content: center;
            padding-bottom: 1rem;
            border-bottom: 3px solid #EB8D56;
        }
        .kop img{
            width: 8em;
            margin-right: 3rem;
            /* height: 6em; */
        }
        .kop .text{
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .kop h3 {
            margin: 0;
        }
        .kop p {
            /* font-size: .7rem; */
        }
        .suratIzin p{
            margin:0%;
        }
        .suratIzin h3{
            margin: 0;
            text-decoration: underline;
        }
        .suratIzin{
            text-align: center;
        }
        .berdasarkan{
        }
        .data_nama{
            text-align: center;
        }
        .penetapan{
            display: flex;
        }
        .penetapan .penetapan1{
            display: flex;
            align-items: center;
            width: 50%;
        }

        .footer .text {
            width: 90%;
            float: left;
        }

        .footer .text p{
            font-size: smaller;
        }

        .footer .image {
            width: 10%;
            float: left;
        }

        .footer .image img {
            width: 50px;
            float: right;
        }
    </style>

</head>

<body>
    <div class="border2">
    <div class="border1">
    <div id=halaman>
        <div class="kop1">
        <div class="kop">
            <img src="{{asset('cert/logo.jpg') }}" alt="" srcset="">
            <div class="text">
                <h3 id=judul>PEMERINTAH KOTA MAKASSAR</h3>
                <h3 id=judul>DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU</h3>
                <p>Jl. Jendral Ahmad Yani No. 2 Makasssar 90171 <br>
                Website: dpmptsp.makassarkota.go.id</p>
            </div>
        </div>
        </div>
        <br>
        <br>
        <div class="suratIzin">
            <h3 id="judul">SURAT IZIN KERJA (SIK)</h3>
            <p>Nomor: data_no_izin</p>
        </div>
        
        <p >Berdasarkan  dan
        <span>Peraturan Menteri Kesehatan Republik Indonesia Nomor
        2052/MENKES/PER/X/2011 tentang Izin Pelaksanaan Praktik Kedokteran</span>
        Peraturan Walikota Makassar Nomor 59 Tahun 2021 Tentang Pendelegasian
        Kewenangan Penyelenggaraan Pelayanan Perizinan Berusaha Kepada Kepala Dinas
        Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kota Makassar, maka yang
        bertanda tangan di bawah ini, Kepala Dinas Penanaman Modal dan Pelayanan Terpadu
        Satu Pintu Kota Makassar memberikan Surat Izin Kerja, Kepada :</p>
        
        <u><h4 class="data_nama">{{ $nama }}</h4></u>

        <table>
            <tr>
                <td style="width: 30%;">Jenis Praktek : </td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_keterangan data_perihal_rekomendasi</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat, tanggal lahir</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_tempat_lahir / data_tgl_lahir</td>
            </tr>
            <tr>
                <td style="width: 30%; vertical-align: top;">Alamat</td>
                <td style="width: 5%; vertical-align: top;">:</td>
                <td style="width: 65%;">data_alamat</td>
            </tr>
            <tr>
                <td style="width: 30%;">Tempat Praktik yang ke-data_izin_praktik_ke</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_nama_sarana_praktik,</td>
            </tr>
            <tr>
                <td style="width: 30%;">Kelurahan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_kelurahan</td>
            </tr>
            <tr>
                <td style="width: 30%;">Kecamatan</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_kecamatan</td>
            </tr>
            <tr>
                <td style="width: 30%;">No. STR</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_no_str</td>
            </tr>
            <tr>
                <td style="width: 30%;">SIP berlaku sampai</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_tgl_masa_berlaku</td>
            </tr>
            <tr>
                <td style="width: 30%;">No. Rekomendasi OP</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_no_rekomendasi_op</td>
            </tr>
            <tr>
                <td style="width: 30%;">No. Rekomendasi Dinkes</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_no_rekom_dinkes</td>
            </tr>
            <tr class="merah">
                <td style="width: 30%;">Untuk Praktik sebagai</td>
                <td style="width: 5%;">:</td>
                <td style="width: 65%;">data_keterangan} data_perihal_rekomendasi</td>
            </tr>
        </table>

        <br>
        <br>
        <div class="penetapan">
            <div class="penetapan1">
                <p>qr_info_qrcode ${foto_photo_img</p>
            </div>
            <div class="penetapan2">
                <p>Ditetapkan di Makassar</p>
                <p>Pada tanggal: data_tgl_selesai</p>
                <img src="{{ asset('cert/foto2.jpg') }}" alt="">
            </div>
           
        </div>

        

        <!-- <div style="width: 50%; text-align: left; float: right;">Ditetapkan di Makassar</div><br>
        <div style="width: 50%; text-align: left; float: right;">Pada tanggal: ${data_tgl_selesai}</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: right;">Arbrian Abdul Jamal</div>
        <div style="float:right; width:50%;">
            <img src="./foto2.jpg" alt="">
            <!-- <p>Ditandatangani secara elektronik oleh</p>
            <h4>KEPALA DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU KOTA MAKASSAR</h4>
            <br>
            <h4>A. ZULKIFLY</h4> 
        </div> -->

        <div>
            <p><strong>Tembusan :</strong></p>
            <ol>
                <li>Dinas Kesehatan Kota Makassar</li>
                <li>Pertinggal,-</li>
            </ol>
        </div>

        <br>
        <br>
        <br>

        <hr style="border: 2px solid ">



        <div class="footer" style="display: flex;">
            <div class="text">
                <p>Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh Balai
                Sertifikasi Elektronik (BSrE) Badan Siber dan Sandi Negara. Untuk memastikan keaslian tanda tangan elektronik,
                silakan unggah dokumen pada laman https://tte.kominfo.go.id/verifyPDF
                </p>
            </div>
            <div class="image">
                <img src="{{asset('cert/kunci.png') }}" alt="">
            </div>
        </div>

    </div>
    </div>
    </div>
</body>

</html>