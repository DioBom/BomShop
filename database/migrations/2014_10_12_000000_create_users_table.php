<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name')->unique(); // 姓名
            $table->string('email')->unique(); // 邮箱
            $table->string('password', 60); // 密码
            $table->unsignedInteger('avatar_id')->default(0); // 头像
            $table->tinyInteger('sex')->default(0); // 性别
            $table->tinyInteger('status')->default(0); // 状态:禁用|活动的
            $table->tinyInteger('confirmed')->default(0); // 邮箱确认状态
            $table->string('confirmation_code')->nullable(); // 邮箱验证码
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
