<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            //表属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //表字段属性
            $table->increments('id');
            $table->char('nickname',12)->nullable()->comment('管理员昵称');
            $table->char('realname',12)->comment('管理员姓名');
            $table->boolean('gender')->nullable()->comment('管理员性别');
            $table->string('thumbnail')->nullable()->comment('管理员缩略图');
            $table->char('phone',11)->comment('管理员联系方式，用于登录');
            $table->string('password')->comment('登录密码');
            $table->string('email')->nullable()->comment('管理员邮箱');
            $table->string('work_in')->nullable()->comment('工作区域地区码');
            $table->boolean('is_actived')->default(0)->comment('是否激活，0未激活，1已激活');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
