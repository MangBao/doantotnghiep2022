<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiangduongidInPhongthiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phongthi', function (Blueprint $table) {
            $table->string('giangduong_id')->varChar(10);
            $table->foreign('giangduong_id')->references('giangduong_id')->on('giangduong')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('phongthi', function (Blueprint $table) {
            //
        });
    }
}
