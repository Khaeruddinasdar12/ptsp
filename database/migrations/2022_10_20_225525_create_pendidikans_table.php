<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perizinan_id')->unsigned();
            $table->bigInteger('subizin_id')->unsigned()->nullable();
            $table->string('no_rekomendasi')->nullable();
            $table->string('no_npsn')->nullable();
            $table->string('gelar_awal')->nullable();
            $table->string('nama')->nullable();
            $table->string('gelar_akhir')->nullable();
            $table->string('nohp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_yayasan')->nullable();
            $table->string('nama_pendidikan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('jalan')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('jenis_program')->nullable();
            $table->string('surat_permohonan')->nullable();
            

            // 
            $table->string('no_berita_acara')->nullable();
            $table->string('berita_acara')->nullable();  
            $table->string('gambar1')->nullable();  
            $table->string('gambar2')->nullable();  
            $table->string('gambar3')->nullable();   
            // 


            $table->string('imb')->nullable();
            $table->string('ktp')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('akta')->nullable(); // akta pendirian
            $table->string('kurikulum')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('sk')->nullable();
            $table->string('sertifikat_tanah')->nullable();
            $table->string('nib')->nullable();
            $table->string('npsn')->nullable(); // opsional
            $table->string('izin_lama')->nullable(); // opsional
            $table->string('berkas_pendukung')->nullable(); // opsional
            $table->timestamps();

            $table->foreign('subizin_id')->references('id')->on('subizins');
            $table->foreign('perizinan_id')->references('id')->on('perizinans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendidikans');
    }
}
