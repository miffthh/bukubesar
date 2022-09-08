<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->char('perkiraan');
            $table->char('reff');
            $table->unsignedBigInteger('kode_akun');
            $table->foreign('kode_akun')->references('kode_akun')->on('akuns');
            $table->integer('debit');
            $table->integer('kredit');
            $table->string('balance');
            $table->string('kode_proyek');
            $table->string('nama_perkiraan');
            $table->string('nama_group');
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
        Schema::dropIfExists('bks');
    }
}
