<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perizinan_id');
            $table->string('no_rekomendasi')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('nohp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('luas')->nullable();
            $table->string('nama_surat')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('penggunaan')->nullable();
            $table->string('jenis')->nullable();
            $table->string('jml_lantai')->nullable();
            $table->string('jml_bangunan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('jalan')->nullable();
            $table->string('ktp')->nullable();
            $table->string('pbb')->nullable();
            $table->string('surat_tanah')->nullable();
            $table->string('peta')->nullable(); //peta lokasi kordinat x y
            $table->string('gambar')->nullable(); //gambar bangunan rencana
            $table->string('berkas_pendukung')->nullable(); // opsional
            // diisi oleh tim teknis
            $table->string('kdb')->nullable();
            $table->string('klb')->nullable();
            $table->string('kdh')->nullable();
            $table->string('jml_lantai_max')->nullable();
            $table->string('lebar_jalan')->nullable();
            $table->string('gsp')->nullable();
            $table->string('gsb')->nullable();
            $table->string('klasifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('krks');
    }
}
