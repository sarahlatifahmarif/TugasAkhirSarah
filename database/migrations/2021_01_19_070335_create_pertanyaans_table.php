<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertanyaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pertanyaans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_prodi')->unsigned();
            $table->bigInteger('id_kriteria')->unsigned();
            $table->string('pertanyaan');
            $table->timestamps();

            $table->foreign('id_prodi')->references('id')->on('prodis')->onDelete('CASCADE');
            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pertanyaans');
    }
}
