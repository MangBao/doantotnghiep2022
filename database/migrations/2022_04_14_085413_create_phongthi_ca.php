<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongthiCa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongthi_ca', function (Blueprint $table) {
            $table->id();
            $table->string('phongthi_id')->varChar(10);
            $table->string('cathi_id')->varChar(10);
            $table->date('ngaythi');
            $table->string('monthi_id')->varChar(10);
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
        Schema::dropIfExists('phongthi_ca');
    }
}
