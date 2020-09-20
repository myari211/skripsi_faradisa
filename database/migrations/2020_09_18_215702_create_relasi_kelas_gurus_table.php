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
        Schema::create('guru_kelas', function (Blueprint $table) {
            $table->string('guru_id');
            $table->string('kelas_id');
            $table->timestamps();
        });

        Schema::table('guru_kelas', function($table){
            $table->foreign('guru_id')->references('id')->on('guru');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->primary(['guru_id', 'kelas_id']);
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
