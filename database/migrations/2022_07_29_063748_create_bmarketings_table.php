<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBmarketingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bmarketings', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('kode_akun');
            $table->string('transaksi');
            $table->string('marketing_proyek');
            $table->integer('biaya');            
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
        Schema::dropIfExists('bmarketings');
    }
}
