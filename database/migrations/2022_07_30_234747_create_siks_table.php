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
            $table->string('nama_praktek');
            $table->string('jalan');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('ktp');
            $table->string('foto');
            $table->string('str');
            $table->string('ijazah');
            $table->string('rekomendasi_ifi');
            $table->string('surat_keterangan');
            $table->string('surat_keluasan')->nullable();
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
        Schema::dropIfExists('siks');
    }
}
