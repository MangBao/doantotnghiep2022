<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhongthiidInBuoithiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buoithi', function (Blueprint $table) {
            $table->string('phongthi_id', 10);
            $table->foreign('phongthi_id')->references('phongthi_id')->on('phongthi')->onDelete('cascade')->onUpdate('cascade');
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
