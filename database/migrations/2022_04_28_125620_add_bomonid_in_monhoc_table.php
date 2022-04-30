<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBomonidInMonhocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monhoc', function (Blueprint $table) {
            $table->string('bomon_id')->varChar(10);
            $table->foreign('bomon_id')->references('bomon_id')->on('bomon')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monhoc', function (Blueprint $table) {
            //
        });
    }
}
