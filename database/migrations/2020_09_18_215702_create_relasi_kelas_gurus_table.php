<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasiKelasGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relasi_kelas_guru', function (Blueprint $table) {
            $table->string('kode_guru');
            $table->string('kode_kelas');
            $table->timestamps();
        });

        Schema::table('relasi_kelas_guru', function($table){
            $table->foreign('kode_guru')->references('id')->on('guru');
            $table->foreign('kode_kelas')->references('id')->on('kelas');
            $table->primary(['kode_guru', 'kode_kelas']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relasi_kelas_guru');
    }
}
