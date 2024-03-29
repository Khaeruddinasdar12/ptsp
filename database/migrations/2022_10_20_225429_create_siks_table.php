<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perizinan_id')->unsigned();
            $table->string('gelar_awal')->nullable();
            $table->string('nama')->nullable();
            $table->string('gelar_akhir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nohp')->nullable();
            $table->string('no_str')->nullable();
            $table->date('awal_str')->nullable();
            $table->date('akhir_str')->nullable();
            $table->string('no_rekomendasi')->nullable();
            $table->string('rekomendasi_op')->nullable();
            $table->string('alamat')->nullable();
            $table->bigInteger('subizin_id')->unsigned()->nullable();
            $table->string('nama_praktek')->nullable();
            $table->string('jalan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('ktp')->nullable();
            $table->string('foto')->nullable();
            $table->string('str')->nullable();
            $table->string('ijazah')->nullable();
            $table->string('rekomendasi_org')->nullable();
            $table->string('surat_keterangan')->nullable();
            $table->string('surat_keluasan')->nullable();
            $table->string('berkas_pendukung')->nullable();
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
        Schema::dropIfExists('siks');
    }
}
