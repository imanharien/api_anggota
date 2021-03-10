<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DataAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_departemen');
            $table->string('nim', 15);
            $table->string('nama', 100);
            $table->date('tgl_lahir');
            $table->string('alamat', 100);
            $table->string('telepon', 15);
            $table->string('jurusan', 50);
            $table->string('fakultas', 50);
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
        Schema::dropIfExists('data_anggota');
    }
}
