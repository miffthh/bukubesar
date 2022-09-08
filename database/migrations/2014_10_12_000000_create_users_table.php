<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nidn');            
            $table->string('name');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->string('email')->unique();            
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role',['Admin','Operator']);
            
            
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
