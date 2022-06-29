<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichthisinhvienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichthisinhvien', function (Blueprint $table) {
            $table->unsignedBigInteger('lichthi_id');

            $table->unsignedBigInteger('sinhvien_id');

            $table->primary(['lichthi_id', 'sinhvien_id']);
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
        Schema::dropIfExists('lichthisinhvien');
    }
}
