<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthiBuoithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthi_buoithi', function (Blueprint $table) {

            $table->unsignedBigInteger('buoithi_id');
            $table->foreign('buoithi_id')->references('id')->on('buoithi')->onDelete('cascade')->onUpdate('cascade');

            $table->string('monthi_id', 10);
            $table->foreign('monthi_id')->references('monhoc_id')->on('monhoc')->onDelete('cascade')->onUpdate('cascade');

            $table->primary(['buoithi_id', 'monthi_id']);
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
        Schema::dropIfExists('monhoc_buoithi');
    }
}
