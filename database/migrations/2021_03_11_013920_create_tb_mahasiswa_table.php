<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->char('nim', 20);
            $table->string('nama', 100);
            $table->char('jenis_kelamin');
            $table->string('jurusan', 100);
            $table->char('angkatan', 20);
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
        Schema::dropIfExists('tb_mahasiswa');
    }
}
