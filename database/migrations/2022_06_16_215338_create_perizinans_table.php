<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerizinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('no_tiket')->unique();
            $table->enum('jenis_izin',['sip','sik']);
            $table->enum('status', ['0','1','2']); //0=baru daftar ; 1=acc; 2=tolak
            $table->bigInteger('bidang_by')->nullable();
            $table->bigInteger('teknis_by')->nullable();
            $table->bigInteger('kadis_by')->nullable();
            $table->string('ket')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('no_surat')->unique()->nullable();
            $table->bigInteger('verif_by')->nullable();
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
        Schema::dropIfExists('perizinans');
    }
}
