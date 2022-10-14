<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSikreasonTable extends Migration
{
    public function up()
    {
        Schema::create('sikreasons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sik_id');
            $table->string('nama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('no_str')->nullable();
            $table->string('rekomendasi_op')->nullable();
            $table->string('awal_str')->nullable();
            $table->string('akhir_str')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_praktek')->nullable();
            $table->string('jalan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->string('str')->nullable();
            $table->string('ijazah')->nullable();;
            $table->string('rekomendasi_org')->nullable();;
            $table->string('surat_keterangan')->nullable();;
            $table->string('surat_keluasan')->nullable();
            $table->string('berkas_pendukung')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sikreasons');
    }
}
