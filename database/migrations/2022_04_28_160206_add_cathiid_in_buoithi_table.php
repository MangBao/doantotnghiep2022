<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCathiidInBuoithiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buoithi', function (Blueprint $table) {
            $table->string('cathi_id', 10);
            $table->foreign('cathi_id')->references('cathi_id')->on('cathi')->onDelete('cascade')->onUpdate('cascade');
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
