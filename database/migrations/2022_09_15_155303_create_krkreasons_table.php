<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrkreasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('krkreasons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('krk_id');
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
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
            $table->string('peta')->nullable();
            $table->string('gambar')->nullable();
            $table->string('berkas_pendukung')->nullable();
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
        Schema::dropIfExists('krkreasons');
    }
}
