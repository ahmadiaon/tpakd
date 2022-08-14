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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('latar_belakang_description')->nullable();
            $table->string('latar_belakang_photo_path')->nullable();
            $table->text('dasar_pembentukan_description')->nullable();
            $table->string('dasar_pembentukan_photo_path')->nullable();
            $table->text('road_map_description')->nullable();
            $table->string('road_map_photo_path')->nullable();

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
        Schema::dropIfExists('profiles');
    }
};
