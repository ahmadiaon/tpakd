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
        Schema::create('financial_information', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('financial')->nullable();
            $table->string('title')->nullable();
            $table->text('litte_description')->nullable();
            $table->text('paragrafh_1')->nullable();
            $table->text('paragrafh_2')->nullable();
            $table->text('paragrafh_3')->nullable();
            $table->string('path_image')->nullable();
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
        Schema::dropIfExists('financial_information');
    }
};
