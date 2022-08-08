<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSipsTable extends Migration
{
    public function up()
    {
        Schema::create('sips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perizinan_id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_str');
            $table->date('awal_str');
            $table->date('akhir_str');
            $table->string('no_rekomendasi')->nullable();
            $table->string('alamat');
            $table->bigInteger('subizin_id');
            $table->string('nama_praktek1');
            $table->string('jalan1');
            $table->string('kelurahan1');
            $table->string('nama_praktek2')->nullable();
            $table->string('jalan2')->nullable();
            $table->string('kelurahan2')->nullable();
            $table->string('nama_praktek3')->nullable();
            $table->string('jalan3')->nullable();
            $table->string('kelurahan3')->nullable();
            $table->string('ktp');
            $table->string('foto');
            $table->string('str');
            $table->string('rekomendasi_org');
            $table->string('surat_keterangan');
            $table->string('surat_persetujuan')->nullable();
            $table->string('berkas_pendukung')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sips');
    }
}
