<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perizinan_id')->unsigned();
            $table->string('gelar_awal')->nullable();
            $table->string('nama')->nullable();
            $table->string('gelar_akhir')->nullable();
            $table->string('nohp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_str')->nullable();
            $table->date('awal_str')->nullable();
            $table->date('akhir_str')->nullable();
            $table->string('no_rekomendasi')->nullable();
            $table->string('rekomendasi_op')->nullable();
            $table->string('konsultan')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('subizin_id')->unsigned()->nullable();

            $table->string('nama_praktek1')->nullable();
            $table->string('jejaring1')->nullable();
            $table->string('jalan1')->nullable();
            $table->string('kelurahan1')->nullable();
            $table->string('hari_buka1')->nullable();
            $table->string('hari_tutup1')->nullable();
            $table->string('jam_buka1')->nullable();
            $table->string('jam_tutup1')->nullable();

            $table->string('nama_praktek2')->nullable();
            $table->string('jalan2')->nullable();
            $table->string('kelurahan2')->nullable();
            $table->string('hari_buka2')->nullable();
            $table->string('hari_tutup2')->nullable();
            $table->string('jam_buka2')->nullable();
            $table->string('jam_tutup2')->nullable();

            $table->string('nama_praktek3')->nullable();
            $table->string('jalan3')->nullable();
            $table->string('kelurahan3')->nullable();
            $table->string('hari_buka3')->nullable();
            $table->string('hari_tutup3')->nullable();
            $table->string('jam_buka3')->nullable();
            $table->string('jam_tutup3')->nullable();

            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->string('str')->nullable();
            $table->string('rekomendasi_org')->nullable();
            $table->string('surat_keterangan')->nullable();
            
            // Opsional
            $table->string('berkas_jejaring1')->nullable(); 
            $table->string('surat_persetujuan')->nullable(); 
            $table->string('berkas_pendukung')->nullable();

            $table->timestamps();


            $table->foreign('subizin_id')->references('id')->on('subizins');
            // $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('sips');
    }
}
