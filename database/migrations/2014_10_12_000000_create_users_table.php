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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('level');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nik')->nullable();
            $table->enum('jenis_kelamin',['L','P'])->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->text('alamat')->nullable();
            $table->integer('kelurahan_id')->nullable();
            $table->integer('kecamatan_id')->nullable();
            $table->integer('kabupaten_id')->nullable();
            $table->integer('provinsi_id')->nullable();
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
