<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('data_kegiatan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kegiatan', 100);
            $table->timestamp('waktu');
            $table->text('deskripsi');
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
        Schema::dropIfExists('data_kegiatan');
    }
}
