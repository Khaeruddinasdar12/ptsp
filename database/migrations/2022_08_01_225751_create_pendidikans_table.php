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
            $table->bigInteger('perizinan_id');
            $table->bigInteger('subizin_id')->nullable();
            $table->string('no_rekomendasi')->nullable();
            $table->string('nama')->nullable();
            $table->string('nohp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nama_pendidikan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('jalan')->nullable();
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
