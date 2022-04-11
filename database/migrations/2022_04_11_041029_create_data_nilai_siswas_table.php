<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataNilaiSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_nilai_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->foreignId("jenis_ujian_id");
            $table->foreignId("tahun_ujian_id");
            $table->string('pkn');
            $table->string('mtk');
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
        Schema::dropIfExists('data_nilai_siswas');
    }
}
