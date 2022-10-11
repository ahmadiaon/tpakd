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
        Schema::create('pengajuan_kurs', function (Blueprint $table) {
            $table->id();
            $table->text('kur_nama')->nullable();
            $table->text('kur_email')->nullable();
            $table->text('kur_nik')->nullable();
            $table->text('kur_gender')->nullable();
            $table->text('kur_no_telepon')->nullable();
            $table->text('kur_tanggal_lahir')->nullable();
            $table->text('bank_id')->nullable();
            $table->date('date_pending')->nullable();
            $table->date('date_proses')->nullable();
            $table->date('date_done')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pengajuan_kurs');
    }
};
