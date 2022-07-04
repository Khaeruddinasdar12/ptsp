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
            $table->bigInteger('perizinan_id');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('no_str');
            $table->date('awal_str');
            $table->date('akhir_str');
            $table->string('no_rekomendasi')->nullable();
            $table->string('alamat');
            $table->string('jenis_izin');
            $table->string('jalan1');
            $table->string('kelurahan1');
            $table->string('kecamatan1');
            $table->string('jalan2')->nullable();
            $table->string('kelurahan2')->nullable();
            $table->string('kecamatan2')->nullable();
            $table->string('jalan3')->nullable();
            $table->string('kelurahan3')->nullable();
            $table->string('kecamatan3')->nullable();
            $table->string('ktp');
            $table->string('foto');
            $table->string('str');
            $table->string('rekomendasi_idi');
            $table->string('surat_keterangan');
            $table->string('surat_persetujuan')->nullable();
            $table->string('pelengkap')->nullable();
            // $table->varchar('')

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
        Schema::dropIfExists('sips');
    }
}
