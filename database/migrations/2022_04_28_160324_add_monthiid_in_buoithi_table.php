<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMonthiidInBuoithiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buoithi', function (Blueprint $table) {
            $table->string('monthi_id', 10);
            $table->foreign('monthi_id')->references('monhoc_id')->on('monhoc')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buoithi', function (Blueprint $table) {
            //
        });
    }
}
