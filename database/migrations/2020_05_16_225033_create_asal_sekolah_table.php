<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsalSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asal_sekolah', function (Blueprint $table) {
            $table->bigIncrements('id');
            // npsn asalnya bigIntger dirubah menjadi varchar
            $table->string('npsn')->unique();
            $table->string('nama_sekolah');
            $table->string('alamat');
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
        Schema::dropIfExists('asal_sekolah');
    }
}
