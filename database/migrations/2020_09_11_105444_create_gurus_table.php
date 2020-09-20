<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->string('id', 32)->primary();
            $table->bigInteger('nip');
            $table->string('nama_guru');
            $table->string('email');
            $table->string('mata_pelajaran_id');
            $table->timestamps();
        });

        Schema::table('guru', function($table) {
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gurus');
    }
}
