<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->char('kode_mk', 50)->unique();
            $table->char('nama_mk', 100);
            $table->char('kode_dosen', 100);
            $table->char('jenis_mk', 100);
            $table->char('sks', 3);
            $table->char('semester', 10);
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
        Schema::dropIfExists('tb_matakuliah');
    }
}
