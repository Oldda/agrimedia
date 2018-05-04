<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siters', function (Blueprint $table) {
            //表属性
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //字段属性
            $table->increments('id');
            $table->string('realname')->comment('点位主真实姓名');
            $table->string('nickname')->nullable()->comment('昵称');
            $table->string('phone',11)->unique()->comment('电话');
            $table->string('openid')->comment('微信openid');
            $table->string('thumbnail')->nullable()->comment('头像');
            $table->integer('admin_id')->nullable()->comment('推荐业务员的id');
            $table->boolean('status')->default(0)->comment('状态,0未激活，1激活状态');
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
        Schema::dropIfExists('siters');
    }
}
