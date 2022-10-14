<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSipreasonsTable extends Migration
{
    public function up()
    {
        Schema::create('sipreasons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sip_id');
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_str')->nullable();
            $table->string('awal_str')->nullable();
            $table->string('akhir_str')->nullable();
            $table->string('alamat')->nullable();
            $table->string('rekomendasi_op')->nullable();

            $table->string('nama_praktek1')->nullable();
            $table->string('jalan1')->nullable();
            $table->string('kelurahan1')->nullable();
            $table->string('jadwal1')->nullable();

            $table->string('nama_praktek2')->nullable();
            $table->string('jalan2')->nullable();
            $table->string('kelurahan2')->nullable();
            $table->string('jadwal2')->nullable();

            $table->string('nama_praktek3')->nullable();
            $table->string('jalan3')->nullable();
            $table->string('kelurahan3')->nullable();
            $table->string('jadwal3')->nullable();

            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->string('str')->nullable();
            $table->string('rekomendasi_org')->nullable();
            $table->string('surat_keterangan')->nullable();
            $table->string('surat_persetujuan')->nullable();
            $table->string('berkas_pendukung')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sipreasons');
    }
}
