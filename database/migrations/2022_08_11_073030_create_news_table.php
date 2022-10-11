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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('little_description')->nullable();
            $table->string('photo_path')->nullable();
            
            $table->text('paragrafh_1')->nullable();
            $table->text('paragrafh_2')->nullable();
            $table->text('paragrafh_3')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable();
            $table->string('excerpt')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('news');
    }
};
