<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKrksTable extends Migration
{
    public function up()
    {
        Schema::create('krks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('perizinan_id');
            $table->bigInteger('subizin_id');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('krks');
    }
}