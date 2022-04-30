<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKhoaidInBomonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bomon', function (Blueprint $table) {
            $table->string('khoa_id')->varChar(10);
            $table->foreign('khoa_id')->references('khoa_id')->on('khoa')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bomon', function (Blueprint $table) {
            //
        });
    }
}
