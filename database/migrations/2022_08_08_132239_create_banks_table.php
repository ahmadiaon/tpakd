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
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('id_bank')->nullable();
            $table->integer('bank_name_id')->nullable();
            $table->integer('office_status_id')->nullable();
            $table->integer('bank_operational_id')->nullable();
            $table->integer('bank_owner_id')->nullable();
            $table->integer('dat_i_id')->nullable();
            $table->integer('dat_i_i_id')->nullable();
            $table->integer('kr_id')->nullable();
            $table->integer('job_desk_id')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->string('bank_maps')->nullable();
            $table->string('bank_pos_code')->nullable();
            $table->string('bank_no_phone')->nullable();
            $table->string('bank_no_permission')->nullable();
            $table->string('bank_close_permission')->nullable();
            $table->string('bank_date_permission')->nullable();
            $table->string('bank_status_permission')->nullable();
            $table->string('bank_date_operation')->nullable();
            $table->string('bank_date_change')->nullable();
            $table->string('bank_date_close')->nullable();
            $table->string('bank_no_close')->nullable();
            $table->string('bank_status')->nullable();
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
        Schema::dropIfExists('banks');
    }
};
