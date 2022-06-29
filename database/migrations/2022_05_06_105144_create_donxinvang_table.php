<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonxinvangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donxinvang', function (Blueprint $table) {
            $table->id();
            $table->string('lydo');
            $table->string('cathi_id');
            $table->tinyInteger('trangthai')->default(0);
            $table->date('ngayxinvang');
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('donxinvang');
    }
}
