<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_project');
            $table->string('tumbnail');
            $table->text('konten');
            $table->double('target');
            $table->double('terkumpul');
            $table->date('tanggal_dibuka');
            $table->date('tanggal_ditutup');
            $table->integer('status');
            $table->integer('kategori_project');
            $table->integer('owner_id')->nullable();
            $table->text('gallery')->nullable();
            $table->text('alasan')->nullable();
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
        Schema::dropIfExists('m_project');
    }
}
