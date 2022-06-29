<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('heading1');
            $table->string('content1');
            $table->string('image1');
            $table->string('heading2')->nullable();
            $table->string('content2')->nullable();
            $table->string('image2')->nullable();
            $table->string('heading3')->nullable();
            $table->string('content3')->nullable();
            $table->string('image3')->nullable();
            $table->string('files')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('tintuc');
    }
}
