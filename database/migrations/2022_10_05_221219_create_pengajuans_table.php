<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pengajuan')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('no_telpon')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('bank_id')->nullable();
            $table->string('date_pending')->nullable();
            $table->string('date_proses')->nullable();
            $table->string('date_done')->nullable();
            $table->string('status')->nullable();
            $table->string('nama_usaha')->nullable();
            $table->string('alamat_usaha')->nullable();
            $table->string('jenis_usaha')->nullable();
            $table->string('nama_sekolah')->nullable();
            $table->string('alamat_sekolah')->nullable();
            $table->string('nama_guru_pic')->nullable();
            $table->string('no_telpon_guru_pic')->nullable();
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
        Schema::dropIfExists('pengajuans');
    }
};
