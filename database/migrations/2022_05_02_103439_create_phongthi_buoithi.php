<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhongthiBuoithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phongthi_buoithi', function (Blueprint $table) {

                $table->unsignedBigInteger('buoithi_id');

                $table->string('phongthi_id', 10);

                $table->primary(['buoithi_id', 'phongthi_id']);
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
        Schema::dropIfExists('phongthi_buoithi');
    }
}
