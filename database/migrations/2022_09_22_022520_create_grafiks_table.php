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
        Schema::create('grafiks', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            
            $table->string('name_value_1')->nullable();
            $table->string('name_value_2')->nullable();
            $table->string('name_value_3')->nullable();
            $table->string('name_value_4')->nullable();
            $table->string('value_1')->nullable();
            $table->string('value_2')->nullable();
            $table->string('value_3')->nullable();
            $table->string('value_4')->nullable();
            $table->string('is_aktif')->nullable();
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
        Schema::dropIfExists('grafiks');
    }
};
