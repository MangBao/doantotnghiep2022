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

            $table->string('monthi_id', 10);

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
