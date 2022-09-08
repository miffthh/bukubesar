<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBbbadm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bbbadm', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->char('nama_perkiraan');
            $table->char('reff');
            $table->unsignedBigInteger('kode_akun');
            $table->foreign('kode_akun')->references('kode_akun')->on('akuns');
            $table->integer('debit');
            $table->integer('kredit');
            $table->integer('balance');                        
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
        Schema::dropIfExists('bbbadm');
    }
}
