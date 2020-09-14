<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nama_siswa');
            $table->string('nomor_induk');
            $table->string('email');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kelas_id');
            $table->timestamps();
        });

        Schema::table('siswa', function($table){
            $table->foreign('kelas_id')->references('id')->on('kelas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}
