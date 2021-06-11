<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelPilihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_pilihans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jurusan_sekolah')->unsigned();
            $table->bigInteger('prodi_id')->unsigned();
            $table->timestamps();

            $table->foreign('id_jurusan_sekolah')->references('id')->on('jurusan_sekolahs')->onDelete('CASCADE');
            $table->foreign('prodi_id')->references('id')->on('prodis')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_pilihans');
    }
}
