<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLichcoithi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lichcoithi', function (Blueprint $table) {
            $table->id();
            $table->string('tenmonthi');
            $table->string('cathi_id', 10);
            $table->time('giobatdau');
            $table->time('gioketthuc');
            $table->string('phongthi_id', 10);
            $table->date('ngaythi');
            $table->string('giangvien_id1', 10);
            $table->string('tengiangvien1', 100);
            $table->string('giangvien_id2', 10);
            $table->string('tengiangvien2', 100);
            $table->string('bomon_id', 10);
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
        Schema::dropIfExists('lichcoithi');
    }
}
