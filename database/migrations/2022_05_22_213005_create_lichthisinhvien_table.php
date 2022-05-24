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
            $table->foreign('lichthi_id')->references('id')->on('lichcoithi')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('sinhvien_id');
            $table->foreign('sinhvien_id')->references('id')->on('sinhvien')->onDelete('cascade')->onUpdate('cascade');

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
