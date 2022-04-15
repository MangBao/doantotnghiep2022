<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('giangvien_id')->varChar(10);
            $table->string('name')->varChar(50);
            $table->string('email')->unique();
            $table->tinyInteger('connho')->default(0);
            $table->date('ngaysinh');
            $table->string('diachi')->varChar(100);
            $table->string('sodienthoai')->varChar(20);
            $table->string('avatar')->varChar(250);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('bomon_id')->varChar(10);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
