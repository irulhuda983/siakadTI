<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKurikulumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kurikulum', function (Blueprint $table) {
            $table->id();
            $table->char('kode_mk', 20);
            $table->char('nim', 20);
            $table->char('periode');
            $table->char('nama_kelas');
            $table->double('nilai_angka', 8, 1);
            $table->double('nilai_setara', 8, 1);
            $table->char('nilai_huruf');
            $table->char('dosen_pengampu', 50);
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
        Schema::dropIfExists('tb_kurikulum');
    }
}
