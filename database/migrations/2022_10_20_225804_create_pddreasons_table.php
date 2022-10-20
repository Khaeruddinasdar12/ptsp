<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePddreasonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pddreasons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pendidikan_id')->unsigned();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_yayasan')->nullable();
            $table->string('nama_pendidikan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('jalan')->nullable();
            $table->string('no_npsn')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('ktp')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('imb')->nullable();
            $table->string('akta')->nullable();
            $table->string('kurikulum')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('sk')->nullable();
            $table->string('sertifikat_tanah')->nullable();
            $table->string('nib')->nullable();
            $table->string('npsn')->nullable();
            $table->string('izin_lama')->nullable();
            $table->string('berkas_pendukung')->nullable();
            $table->timestamps();

            $table->foreign('pendidikan_id')->references('id')->on('pendidikans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pddreasons');
    }
}
