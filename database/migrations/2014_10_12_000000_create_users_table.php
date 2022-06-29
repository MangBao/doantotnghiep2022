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
            $table->string('user_id', 10);
            $table->string('name', 50);
            $table->string('email')->unique();
            $table->tinyInteger('connho')->default(0);
            $table->date('ngaysinh')->default('2000-01-13');
            $table->string('diachi', 100)->nullable();
            $table->string('sodienthoai', 20)->nullable();
            $table->string('avatar');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('thongbaomail')->default(0);
            $table->tinyInteger('trangthaihoatdong')->default(0);
            $table->unsignedBigInteger('role_id');
            $table->string('bomon_id')->varChar(10)->nullable();
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
